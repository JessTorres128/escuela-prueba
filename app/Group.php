<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['semester', 'group', 'session'];
    public function students(){
        return $this->hasMany(Student::class);
    }
}
