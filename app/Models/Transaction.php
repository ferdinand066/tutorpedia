<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = [];

    public $incrementing = false;

    public function getTitleAttribute(){
        if (in_array($this->description, ['Deposit', 'Withdraw'])){
            return $this->description;
        }

        return $this->detail->name;
    }

    public function detail(){
        return $this->belongsTo(TutorClass::class, 'detail_id', 'id');
    }
}
