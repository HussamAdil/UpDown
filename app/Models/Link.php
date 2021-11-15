<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'link_type_id',
        'added_by',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function linkType()
    {
        return $this->belongsTo(LinkType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'added_by');
    }

}
