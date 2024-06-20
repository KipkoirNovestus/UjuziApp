<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caregiver extends Model
{
    protected $table = 'caregiver';
    protected $primaryKey = 'id';
     protected $fillable = [
          'name',
          'address',
          'email',
          'phone',
      ];
      
    use HasFactory;
}
