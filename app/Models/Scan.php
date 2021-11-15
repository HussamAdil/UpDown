<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_id',
        'team_id',
        'http_status_code',
        'scaned_at',
    ];

    public function getHttpStatusColorAttribute()
    {
        $redHttpStatusCode = [404,500];
        
        if(in_array($this->attributes['http_status_code'], $redHttpStatusCode))
        {
            return 'text-c-red';
        }else 
        {
            return 'text-c-green';
        } 
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }
    
    public function link()
    {
        return $this->belongsTo(Link::class,'link_id');
    }

}
