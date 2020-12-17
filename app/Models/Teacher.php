<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    protected $fillable = [
        'name',
        'subject',
        'medium',
        'grade',
        'type',
       
    ];

    public function user(){
        return $this->morphOne(\App\Models\User::class,'userable');
      }

}
