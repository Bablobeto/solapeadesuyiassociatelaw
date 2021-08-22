<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $fillable = ['name', 'email', 'address', 'quantity', 'location', 'amount', 'status', 'item', 'shipping', 'cost'];
}
