<?php

namespace App\Exports;

use App\Models\RegistryDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistryDetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RegistryDetail::all();
    }
}
