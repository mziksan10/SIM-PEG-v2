<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardPunishment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Status
    private static $status = ['REWARD', 'PUNISHMENT'];
    public static function status()
    {
        return self::$status;
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
