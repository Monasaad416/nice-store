<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'slug', 'description', 'parent_id', 'status', 'image');

    
    const ACTIVE = 1;
    const INACTIVE = 2; 

    public function label()
    {
        return match($this->status)
        {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            default => 'unknown',
        };
    }

    public static function selectStatus(){
        return [self::ACTIVE,self::INACTIVE];
    }

    // public function scopeStatus(Builder $builder,$status)
    // {
    //     $builder->where('status', self::ACTIVE);
    // }

    public function scopeSearch(Builder $builder,$filters)
    {

        $builder->when($filters['name'] ?? false, function($builder,$value){
            $builder->where("name","LIKE", "%{$value}%");
        });
    
        $builder->when($filters['status'] ?? false , function($builder,$value){
            $builder->where("status",$value);
        });
    }
     public function scopeActive(Builder $builder)
    {
        $builder->where('status','active');
    }


    //Accessors 
    public function getImageAttribute($value){
        return asset('uploads/' . $value);
    }


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
        );
    }



    public static function booted()
    {
        static::creating(function(Category $category){
                return $category->slug = Str::slug($category->name);
        });
        
        static::updating(function(Category $category){
                return $category->slug = Str::slug($product->name);
        });
    }




    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function stores()
    {
        return $this->hasMany('App\Models\Store');
    }

}