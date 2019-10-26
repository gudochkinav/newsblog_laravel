<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {
    protected $fillable = ['author_name', 'image_url', 'description', 'created_at', 'updated_at'];

    public function get(int $count = 3) : array {
        return Testimonials::orderBy('created_at', 'desc')->limit($count)->get()->toArray();
    }
}
