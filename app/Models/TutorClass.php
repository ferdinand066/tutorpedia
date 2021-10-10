<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorClass extends Model
{
    use HasFactory, HasUuid;

    public $incrementing = false;

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tutor_class_details(){
        return $this->hasMany(TutorClassDetail::class);
    }
}
