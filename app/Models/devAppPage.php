<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevPage extends Model
{
    use HasFactory;
    protected $fillable = [
        "choosed_day"   
    ];
}
