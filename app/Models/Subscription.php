<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model{
    protected $fillable = ['name', 'email', 'status', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';
}