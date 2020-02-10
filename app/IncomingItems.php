<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class IncomingItems extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incoming_id', 'color_id', 'size_id', 'design_id', 'quantity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    public function incomings(){
        return $this->hasOne('App\Incoming', 'id', 'incoming_id');
    }

    public function colors(){
        return $this->hasOne('App\Color', 'id', 'color_id');
    }

    public function size(){
        return $this->hasOne('App\Size', 'id', 'size_id');
    }

    public function designs(){
        return $this->hasOne('App\Design', 'id', 'design_id');
    }
}
