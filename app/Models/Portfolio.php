<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {
    const IMAGES_FOLDER = 'public/images/portfolio';

    protected $table = 'portfolio';
    protected $fillable = ['name', 'image', 'active', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';

    public function getShortList(int $count = 3) : array 
    {
        return Portfolio::orderBy('created_at', 'desc')->limit($count)->get()->toArray();
    }
    
    public function setImage($file) 
    {
        if (!$file) 
        {
            return;
        }
        
        Storage::delete($this->image);
        $this->image = Storage::putFile(Portfolio::IMAGES_FOLDER, $file);
    }

    public function getImageURL() : string
    {
        if (!$this->image) 
        {
            return '';
        }

        return Storage::url($this->image);
    }
    
    public function getActiveStatusesList() : array
    {
        return ['Off', 'On'];
    }
}
