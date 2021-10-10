<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class University extends Model
{
    use HasFactory, HasUuid;

    public $incrementing = false;

    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany(User::class);
    }

}
