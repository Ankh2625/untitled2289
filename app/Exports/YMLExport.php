<?php

namespace App\Exports;



use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use YMLParser\YMLParser;
use YMLParser\Driver\XMLReader;
use App\Models\Quarta;

class YMLExport implements FromCollection
{

    

    public function collection()
    {

        return Quarta::all();
        
    }
}