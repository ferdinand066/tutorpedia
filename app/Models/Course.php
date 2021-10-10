<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, HasUuid;

    public $incrementing = false;

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function tutor_classes(){
        return $this->hasMany(TutorClass::class);
    }
}
