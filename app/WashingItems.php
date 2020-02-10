<?php

namespace App;

use App\Color;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class WashingItems extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'washing_id', 'color_id', 'size_id', 'design_id', 'quantity'
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


    public function washing(){
        return $this->hasOne('App\Washing', 'id', 'washing_id');
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
