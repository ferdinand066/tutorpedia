<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function tutor(){
        return $this->belongsTo(User::class, 'tutor_id', 'id');
    }

    public function student(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
