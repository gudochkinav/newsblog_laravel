<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model {
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];
    
    public function getShortList(int $count = 4) : array {
        return Services::orderBy('created_at', 'desc')->limit($count)->get()->toArray();
    }
}
