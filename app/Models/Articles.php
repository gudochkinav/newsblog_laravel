<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model {
    protected $fillable = ['name', 'slug', 'preview_image_url', 'text', 'related_articles', 'category_id', 'created_at', 'updated_at'];
    
    public function getText() : string 
    {
        return html_entity_decode($this->text);
    }
    
    public function hasRelated() :bool 
    {
        if (!$this->related_articles)
        {
            return false;
        }
        
        return true;
    }

    public function related(int $count = 3)
    {
        return Articles::whereIn('id', explode(',', $this->related_articles))->get();
    }
    
    public function category() 
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
