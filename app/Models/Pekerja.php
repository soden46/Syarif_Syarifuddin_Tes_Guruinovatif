<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;
    public $table = "pekerja";
    protected $guarded = [];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];
}
