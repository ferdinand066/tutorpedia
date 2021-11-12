<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorClass extends Model
{
    use HasFactory, HasUuid;

    public $incrementing = false;

    protected $guarded = [];  

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tutor_class_details(){
        return $this->hasMany(TutorClassDetail::class);
    }

    public function class_reject_reasons(){
        return $this->hasMany(ClassRejectReason::class)->orderBy('created_at');
    }

    public function last_reject(){
        return $this->hasMany(ClassRejectReason::class)->latest('created_at');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'detail_id', 'id');
    }
}
