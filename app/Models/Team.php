<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'creator_id',
        'logo',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function getLogoAttribute($value)
    {  
        if($value)
        {
            return Storage::url($value);
        }else
        {
            return $value;
        }
    }
}
