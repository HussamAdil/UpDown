<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;

    private $negtiveHttpStatuesCode = [404,500,502,503,522];

    protected $fillable = [
        'link_id',
        'team_id',
        'http_status_code',
        'response_time',
        'scaned_at',
    ];

    public function getHttpStatusColorAttribute()
    {        
        if(in_array($this->attributes['http_status_code'], $this->negtiveHttpStatuesCode))
        {
            return 'text-c-red';
        }else 
        {
            return 'text-c-green';
        } 
    }

    public function getisDownAttribute()
    {        
        return in_array($this->attributes['http_status_code'], $this->negtiveHttpStatuesCode);
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
