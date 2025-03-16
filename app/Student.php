<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'group_id'];
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
