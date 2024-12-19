<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';

  protected $fillable = ['name', 'username', 'email', 'cell', 'education'];
  protected $hidden = ['email', 'cell'];
}
