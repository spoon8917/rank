<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use HasFactory;
    use SoftDeletes;
    
     public function members()
    {
        return $this->belongsToMany(Member::class);
    }
    
    protected $fillable = [
        'name',
        'point_setting',
    ];
}
