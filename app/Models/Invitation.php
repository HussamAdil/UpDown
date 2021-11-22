<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'send_by',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'send_by');
    }

    public function  scopePendding()
    {
        return Invitation::where('email' , auth()->user()->email)->
        where('accepted_at',null)->where('rejected_at'.null);
    }
}
