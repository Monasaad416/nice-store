<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Store extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;


    protected $table = 'stores';
    public $timestamps = true;



    const ACTIVE = 1;
    const INACTIVE = 2;
    const ARCHIVED = 3;

    public function label()
    {
        return match ($this->status) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::ARCHIVED => 'Archived',
            default => 'unknown',
        };
    }


    //Mutator
    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn ($value) => Hash::make($value),
    //     );
    // }


    public static function selectStatus()
    {
        return [self::ACTIVE, self::INACTIVE, self::ARCHIVED];
    }
    protected $fillable = array('name', 'slug','email','password', 'category_id','phone','address', 'description', 'image', 'cover_image', 'status');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }


    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

}
