<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    // Specify the fillable fields
    protected $fillable = ['name', 'code', 'rate', 'quantity'];
}
