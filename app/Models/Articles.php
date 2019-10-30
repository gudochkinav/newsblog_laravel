<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {
    protected $fillable = ['name', 'slug', 'preview_image_url', 'text', 'created_at', 'updated_at'];
}