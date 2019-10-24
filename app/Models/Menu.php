<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model 
{
    protected $table = 'menu';
    protected $fillable = ['name', 'link', 'sort'];


    public $timestamps = false;
    
    public function get() : array
    {
        $menu = Menu::orderBy('sort', 'desc')->get()->toArray();
        if (empty($menu)) {
            return [];
        }

        $uri = request()->path();
        if ($uri == 'index.php') {
            $uri = '/';
        }

        foreach ($menu as &$item) {
            if ($item['link'] == $uri) {
                $item['active'] = true;
            }
        }

        return $menu;
    }
}
