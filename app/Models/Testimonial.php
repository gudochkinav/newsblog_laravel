<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model 
{
    const IMAGES_FOLDER = 'public/images/testimonials';

    protected $fillable = ['author_name', 'image', 'description', 'active', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';
    
    public function setDescription(string $description = '') : void
    {
        $this->description = $description;
    }
    
    public function getDescription() : string
    {
        return html_entity_decode($this->description);
    }
    
    public function getImageURL() : string
    {
        if (!$this->image)
        {
            return '';
        }

        return Storage::url($this->image);
    }
    
    public function setImage($file) 
    {
        if (!$file)
        {
            return;
        }
        
        Storage::delete($this->image);
        $this->image = Storage::putFile(Testimonial::IMAGES_FOLDER, $file);
    }
    
    public function getActiveStatusesList() : array
    {
        return ['Off', 'On'];
    }
}
