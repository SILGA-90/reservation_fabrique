<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class param_day extends Model
{
    use HasFactory;
    protected $fillable = [
        "jour_d",
        "jour_f"
    ];


}
