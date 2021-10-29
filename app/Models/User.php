<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuid;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'university_id',
        'google_id',
        'phone_number',
        'social_media',
        'about',
        'photo_url',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tutor_classes(){
        return $this->hasMany(TutorClass::class)->orderBy('date');
    }

    public function active_classes(){
        return $this->hasMany(TutorClass::class)->where([['status', 1], ['date', '>=', date('Y-m-d')]])->orderBy('date');
    }

    public function university(){
        return $this->belongsTo(University::class);
    }

    public function tutor_class_details(){
        return $this->hasMany(TutorClassDetail::class);
    }

    public function students(){
        return $this->hasMany(Follower::class, 'student_id', 'id');
    }

    public function tutors(){
        return $this->hasMany(Follower::class, 'tutor_id', 'id');
    }

    public function class_reject_reasons(){
        return $this->hasMany(ClassRejectReason::class);
    }

    public function deposit(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function accepted_deposit(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
