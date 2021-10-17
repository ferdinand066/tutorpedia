<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRejectReason extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public function tutor_class(){
        return $this->belongsTo(TutorClass::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
