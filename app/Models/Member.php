<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'name',
    'user_id',
    'img_path',
    'comment',
    'rank',
    ];
    
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class)
        ->withPivot(['tournament_rank'])
        ->withPivot(['created_at']) 
        ->withPivot(['updated_at'])
        ->withPivot(['deleted_at']);
    }
}
