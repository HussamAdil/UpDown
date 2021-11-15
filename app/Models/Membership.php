<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descrption',
        'price',
        'offer',
        'number_of_link',
        'number_of_team',
    ];
   
}
