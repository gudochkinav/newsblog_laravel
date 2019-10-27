<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model {
    protected $fillable = ['name', 'description', 'image_url', 'created_at', 'updated_at'];
    
    public function getDescription() 
    {
        return html_entity_decode($this->description);
    }
}
