<?php

namespace App\Imports;

use App\Models\ClassModels;
use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = str_replace("/","-", $row["ngay_sinh"]);
        $data = [
            "name" => $row["ho_ten"],
            "email" => $row["email"],
            "password" => $row["password"],
            "gender" => $row["gioi_tinh"] == "Nam" ? 0 : 1,
            "dob" => date("Y-m-d",strtotime($date)),
            "idClass" => ClassModels::where("nameClass",$row["lop"])->value("idClass"),
        ];
        return new StudentModel($data);
    }
}
