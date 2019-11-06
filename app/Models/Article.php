<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{
    const IMAGES_FOLDER = 'public/images/blog';

    protected $fillable = ['name', 'slug', 'active', 'preview_image', 'text', 'related_articles', 'category_id', 'author', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';

    public function getDate(string $format, int $timestamp = 0) : string
    {
        if (!$timestamp)
        {
            $timestamp = time();
        }

        return date($format, $timestamp);
    }
    
    public function getShortText(int $length = 200) 
    {
        return substr(html_entity_decode($this->text), 0, $length);
    }
    
    public function setSlug(string $string, string $separator = '-') 
    {
        $this->slug = Str::slug($string, $separator);
    }
    
    public function getText() : string 
    {
        return html_entity_decode($this->text);
    }

    public function hasRelated() :bool 
    {
        if (!Article::where('active', 'On')->whereIn('id', explode(',', $this->related_articles))->count())
        {
            return false;
        }
        
        return true;
    }

    public function related(int $count = 3)
    {
        return Article::where('active', 'On')->whereIn('id', explode(',', $this->related_articles))->get();
    }
    
    public function category() 
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    
    public function setImage($file) 
    {
        if (!$file)
        {
            return;
        }

        Storage::delete($this->preview_image);
        $this->preview_image = Storage::putFile(Article::IMAGES_FOLDER, $file);
    }
    
    public function getImageURL() : string
    {
        if (!$this->preview_image)
        {
            return '';
        }

        return Storage::url($this->preview_image);
    }
    
    public function getActiveStatusesList() : array
    {
        return ['Off', 'On'];
    }
}
