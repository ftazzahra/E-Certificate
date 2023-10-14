<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $primarykey = "id";
    protected $fillable = [
        'nipd', 'nama', 'email', 'alamat', 'kelas', 'kejuruan', 'event_id', 'dudi', 'status'
    ];

    function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }
}
