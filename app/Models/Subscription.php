<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model{
    protected $fillable = ['name', 'email', 'status', 'created_at', 'updated_at'];
    protected $dateFormat = 'U';
    
    public function subscribe() : ?Subscription
    {
        if ($this->isSubscriber($this->email)) {
            return $this;
        }

        $this->status = '1';
        $this->save;

        return $this;
    }

    public function isSubscriber() : bool
    {
        if (!$this->status != '1')
        {
            return false;
        }

        return true;
    }

    public function unsubscribe() : ?Subscription
    {
        if (!$this->isSubscriber()) {
            return $this;
        }

        $this->status = '0';
        $this->save();
        
        return $this;
    }
}
