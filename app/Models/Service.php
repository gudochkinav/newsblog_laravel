<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Service extends Model 
{
    const IMAGES_FOLDER = 'public/images/services';

    protected $fillable = ['name', 'icon', 'active', 'image', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';

    public function setDescription(string $description = '') : void
    {
        $this->description = htmlentities($description);
    }

    public function getDescription() : string
    {
        return html_entity_decode($this->description);
    }
    
    public function setImage($file)
    {
        if (!$file)
        {
            return;
        }

        Storage::delete($this->image);
        $this->image = Storage::putFile(Service::IMAGES_FOLDER, $file);
    }

    public function getShortDescription(int $length = 100) : string
    {
        return substr(html_entity_decode($this->description), 0, $length);
    }

    public function isActive() : bool
    {
        if ($this->active != 'On') 
        {
            return false;
        }
        
        return true;
    }

    public function getActiveStatusList() : array
    {
        return ['On', 'Off'];
    }
    
    public function getImageURL() : string
    {
        if (!$this->image)
        {
            return '';
        }

        return Storage::url($this->image);
    }
}
