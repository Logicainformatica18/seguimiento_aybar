<?php
namespace App\Http\Controllers;

use App\Services\GoogleSheetService;
use Illuminate\Http\Request;
use Carbon\Carbon;
USE App\Models\User;
use Illuminate\Support\Facades\Hash;
class GoogleSheetController extends Controller
{
    protected $googleSheetService;

    
    public function __construct(GoogleSheetService $googleSheetService)
    {
        $this->googleSheetService = $googleSheetService;
    }

    public function index($spreadsheetId, $range)
    {
        $spreadsheetId = '1ShgVLdsBMDAW2v0Xzk3JL8xls0KlKUEUMzY5mlTvwds'; // Solo el ID de la hoja de cálculo
        $range = 'hoja!A1:C1000'; // Ajusta el rango según tu hoja de cálculo

        try {
            $data = $this->googleSheetService->getSheetDataWithHeaders($spreadsheetId, $range);
     
//             return $data;
            $object = json_decode(json_encode($data));

            foreach ($object as $row) {
                $existingStudent = User::where('email', $row['email'])->first();

                if (!$existingStudent) {
                    return null;
                }
                
                $user = new User([
                    'dni'       => $row['dni'],
                    'names'     => $row['nombres'],
                    'firstname' => $row['paterno'],
                    'lastname'  => $row['materno'],
                    'email'     => $row['email'],
                    'password'  => Hash::make($row['password']),
                    'sex'       => substr($row['sexo'], 0, 1),
                    'cellphone' => $row['celular'],
                ]);
                $user->assignRole('Socio Comercial');
            }
            return view('index', compact('object'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
