<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model{
    protected $fillable = ['name', 'email', 'status', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';
    
    public function subscribe() : ?Subscriber
    {
        if ($this->isSubscriber($this->email)) {
            return $this;
        }

        $this->status = 'On';
        $this->save;

        return $this;
    }

    public function isSubscriber() : bool
    {
        if ($this->status != 'On')
        {
            return false;
        }

        return true;
    }

    public function unsubscribe() : ?Subscriber
    {
        if (!$this->isSubscriber()) {
            return $this;
        }

        $this->status = 'Off';
        $this->save();
        
        return $this;
    }

    public function getStatusList() 
    {
        return ['Off', 'On'];
    }
}
