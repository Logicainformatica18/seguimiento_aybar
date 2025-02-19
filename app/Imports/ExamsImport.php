<?php

namespace App\Imports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
class ExamsImport implements ToModel, WithHeadingRow
{
    protected  $certification_id;
    function __construct($certification_id) {
             $this->certification_id = $certification_id;        
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
     $exam = new Exam([

        
        'certification_id'       => $this->certification_id,
            'ask'       => $row['ask'],
            'alternative1'     => $row['alternative1'],
            'alternative2'     => $row['alternative2'],
            'alternative3'     => $row['alternative3'],
            'alternative4'     => $row['alternative4'],
            'answer'     => $row['answer']
        ]);
        
    return $exam;
    }
}
