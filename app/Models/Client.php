<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Client extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'address', 'phone', 'status');


    //Accessors 
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
