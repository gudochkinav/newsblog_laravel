<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {
    protected $fillable = ['name', 'slug', 'preview_image_url', 'text', 'created_at', 'updated_at'];

    public function get(int $count = 6, int $offset = 0) : array {
        return Articles::orderBy('created_at', 'desc')->limit($count)->offset($offset)->get()->toArray();
    }
}