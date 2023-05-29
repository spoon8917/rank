<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberTournament extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'member_id',
    'tournament_id',
    'tournament_rank',
    ];
}
