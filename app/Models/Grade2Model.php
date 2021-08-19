<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade2Model extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $primaryKey = 'idStudent';
    public $timestamps = false;
}
