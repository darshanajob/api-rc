<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = [
        'name',
        'school',
        'grade',
        'subject',
      //  'username',
      //  'password',
        'type',
       
    ];

    public function user(){
      return $this->morphOne(\App\Models\User::class,'userable');
    }
}
