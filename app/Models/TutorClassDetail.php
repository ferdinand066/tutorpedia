<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorClassDetail extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function tutor_class(){
        return $this->belongsTo(TutorClass::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
