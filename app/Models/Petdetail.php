<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petdetail extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_pet','name','weight'];
    protected $table = "pet_detail";
    public $timestamps = false;
}
