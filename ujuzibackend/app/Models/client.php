<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id';
     protected $fillable = [
          'name',
          'address',
          'email',
          'phone',
      ];
      
    use HasFactory;
}