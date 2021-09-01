<?php

namespace App\Exports;

use App\Models\StudentModel;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($flag = false)
    {
        //Neu flag = true tai xuong sample.xlsx
        $this->flag = $flag;
    }

    public function collection()
    {
        if ($this->flag) return new Collection([]);
        return StudentModel::all();
    }

    public function headings(): array
    {
        if ($this->flag) return ['Họ tên', 'Giới tính', 'Ngày sinh', 'Lớp', 'Email', 'Password'];
        return [
            'Họ tên', 'Giới tính', 'Ngày sinh', 'Lớp', 'Email', 'Password'
        ];
    }
}
