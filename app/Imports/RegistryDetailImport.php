<?php

namespace App\Imports;
use App\Models\Registry;
use App\Models\RegistryDetail;
use App\Models\User;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RegistryDetailImport implements ToModel, WithHeadingRow
{
    protected  $registry_id;
    function __construct($registry_id) {
             $this->registry_id = $registry_id;        
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

    $existingStudent = User::where('email', $row['email'])->first();

        if (!$existingStudent) {
            return null;
        }
  $student_m   =    $existingStudent->roles_[0]["pivot"]->model_id;

  $registryDetailExisting = RegistryDetail::where('student_m',$student_m)->where('registry_id',$this->registry_id)->first();

    if($registryDetailExisting) {
    return null;
    }




    $count_registry_detail= RegistryDetail::where("student_m","=",$student_m)->where("registry_id","=",$this->registry_id)->count();
    $count = RegistryDetail::where('registry_id',$this->registry_id)->count();
    $count = $count + 1;

    if ($count_registry_detail>0) {
                return "Error";
    }
    else if ($count_registry_detail==0){
        if ($count > 9 && $count < 100) {
            $count = '0' . $count;
        } elseif ($count < 10) {
            $count = '00' . $count;
        }
    }
    $registry = Registry::find($this->registry_id);
                                            $fecha = $registry->fec_end;
                                            // Crear una instancia de Carbon con la fecha dada
                                            $carbonDate = Carbon::parse($fecha);
                                    
                                            // Obtener el año, mes y día por separado
                                            $year = $carbonDate->year;
                                            $month = $carbonDate->month;
                                            $day = $carbonDate->day;
     if ($day <= 9) {
        $day = "0". $day;
     }
     if ($month <= 9) {
        $month = "0". $month;
     }
        $code_certification = $registry->description.'-'.$day.$month.$year.'-'.$count;
          // Usando dd para depurar
          
          $registryDetail = new RegistryDetail([
              'registry_id'       => $this->registry_id,
              'student_t'     => 'App\Models\User',
              'student_m'     => $student_m,
              'student_r'     => '5',
              'code_certification' => $code_certification,
              'n1' => $row['n1'],
              'pay' => $row['matriculado'],
            ]);
            
          //IMPORTANTE, SI LOS ATRIBUTOS NO ESTAN DECLARADOS EN EL FILELABLE DEL MODELO, LOS CAMPOS NO SE INSERTARÁN

return $registryDetail;
        
       
   }
}
