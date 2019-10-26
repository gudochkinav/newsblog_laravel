<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    protected $table = 'portfolio';
    protected $fillable = ['name', 'image_name', 'created_at', 'updated_at'];

    private $imageStorePrefix = 'portfolio';
    
    public function getShortList(int $count = 3) : array {
        return Portfolio::orderBy('created_at', 'desc')->limit($count)->get()->toArray();
    }

}
