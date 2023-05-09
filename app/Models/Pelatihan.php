<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Status pernikahan
    private static $sifatPelatihan = ['INTERNAL', 'EKSTERNAL'];
    public static function sifatPelatihan()
    {
        return self::$sifatPelatihan;
    }


    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
