<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class day_hour extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "choosed_day",
        "start_hour",
        "end_hour",
        "selected_number"
    ];
}
