<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = "template";
    protected $primaryKey = "id";
    protected $fillable = [
       'tanggal', 'image', 'status', 'namatplt'
    ];
}
