<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //
    protected $guarded =[];

    // buat method statuspending
    public function setStatusPending(){
        $this->attributes['status']='pending';
        self::save();
    }
    // buat method statusSucces
    public function setStatusSuccess(){
        $this->attributes['status']='sucess';
        self::save();
    }
    // buat method untik setStatusFailed
    public function setStatusFailed(){
        $this->attributes['status']='failed';
        self::save();
    }
    // buat method untuk setStatusExpired
    public function setStatusExpired(){
        $this->attributes['status']='expired';
        self::save();
    }
}
