<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagesProducts extends Model
{
    protected $table = 'images_products';
    protected $fillable = ['id','name', 'product_id','main'];

    public function products()
    {
        return $this->belongsTo('App\Products');
    }


    public function setNameAttribute($image)
    {

        $name = uniqid() . '.' . $image->getClientOriginalExtension();

        Storage::disk('product_images')->put($name, File::get($image));

        $this->attributes['name'] = $name;

    }
    public function getNameAttribute()
    {
        if ($this->attributes['name']) {
            return '/storage/product_images/'. $this->attributes['name'];
        }

        return '/storage/product_images/default.jpg';
    }


}
