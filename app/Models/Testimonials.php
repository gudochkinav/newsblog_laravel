<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {
    protected $fillable = ['author_name', 'image_url', 'description', 'created_at', 'updated_at'];
}
