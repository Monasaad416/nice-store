<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'slug', 'category_id', 'store_id', 'price', 'image', 'description','available_qty','status');
    // protected $appends = [
    //     'image',
    // ];

    const ACTIVE = 1;
    const INACTIVE = 2;
    const ARCHIVED = 3;
    public function label()
    {
        return match($this->status)
        {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::ARCHIVED => 'Archived',
            default => 'unknown',
        };
    }

    public static function selectStatus()
    {
        return [self::ACTIVE,self::INACTIVE,self::ARCHIVED];
    }


    public static function booted()
    {
        static::addGlobalScope('store', function(Builder $builder) {
            if(Auth::guard('store')->check()) {
                $store = Auth::user();
                $builder->where( 'store_id' , $store->id );
            }

        });

        static::creating(function(Product $product){
                return $product->slug = Str::slug($product->name);
        });

        static::updating(function(Product $product){
                return $product->slug = Str::slug($product->name);
        });
    }

    public function scopeFilter(Builder $builder,$filters){
        $options = array_merge([
            'store_id' => null,
            'category_id' => null,
            'tag_id' => null,
            'status' => null,
        ],$filters);


        $builder->when($options['store_id'],function($builder,$value){
            $builder->where('store_id',$value);
        });

        $builder->when($options['category_id'],function($builder,$value){
            $builder->where('category_id',$value);
        });

        $builder->when($options['tag_id'],function($builder,$value){
            $builder->whereHas('tags',function($builder,$value){
                $builder->where('tags.id' , $value);
            });
        });

        // $builder->when($options['tag_id'],function($builder,$value){
        //     $builder->whereRaw('id IN(SELECT product_id FROM product_tag WHERE tag_id = ?',[$value]);
        // });

        $builder->when($options['status'],function($builder,$value){
            $builder->where('status',$value);
        });
    }


    //Accessors
    public function getImageAttribute($value){
        return asset('uploads/' . $value);
    }


    public function getSalePercentageAttribute($value){
        return asset('uploads/' . $value);
        if(!$this->discount_price){
            return 0;
        }
        $prcentage = (($this->price - $this->discount_price) / $this->price) * 100;
        return round($prcentage,2);
    }


    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
        );
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function orders()
    {
        return $this->belongsToMany('Order', 'order_details')
                ->with('timestamps')
                ->withPivot('product_name','product_price','options','qty');
    }

}
