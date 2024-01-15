<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  // app\Models\Role.php
  protected $table = 'roles'; 

    protected $fillable = [
      
      'name', 
      'guard_name',
      'created_at',
      
      
      ];
}

