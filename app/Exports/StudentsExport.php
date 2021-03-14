<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection,WithHeadings
{
    public function headings():array
    {
        return [
            'CODE MASSAR','Nom','Prénom','Date de Naissance','Classe','Groupe'
        ];

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::getstudent();
    }
}
