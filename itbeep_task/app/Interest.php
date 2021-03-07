<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    protected $table = "interests";
    public $primaryKey = 'interest_id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
