<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event";
    protected $primarykey = "id";
    protected $fillable = [
        'tanggalEv', 'namaEv', 'statusEv'
    ];

    function siswas(){
        return $this->hasMany(Siswa::class, 'event_id');
    }
}
