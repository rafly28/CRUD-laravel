<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];
    protected $table = 'divisi';

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'divisi_id');
    }
}
