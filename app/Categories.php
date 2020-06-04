<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    use Sortable;

    public $sortable = ['id','name_category','description','created_at'];

    protected $table = 'categories';
    protected $fillable = ['id','name_category','description','image','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
    public function setImageAttribute($image)
    {
        $name = uniqid() . '.' . $image->getClientOriginalExtension();

        Storage::disk('category_images')->put($name, File::get($image));

        $this->attributes['image'] = $name;

    }
    public function getImagesAttribute()
    {
        if ($this->attributes['image']) {
            return '/storage/category_images/'. $this->attributes['image'];
        }

        return '/storage/category_images/default.jpg';
    }
    public function getImageAttribute()
    {
        if ($this->attributes['image']) {
            return $this->attributes['image'];
        }

        return 'default.jpg';
    }
//    public function products(){
//        return $this->hasMany('App\Products', 'id');
//    }
}
