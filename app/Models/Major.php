<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory, HasUuid;

    public $incrementing = false;

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
