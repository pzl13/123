<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Kyslik\ColumnSortable\Sortable;

class Users extends Authenticatable
{
    use Sortable;

    public $sortable = ['id','name','email','age', 'created_at',];

    protected $table = 'users';
    protected $fillable = ['id','name','email','password','age', 'image','user_id'];

    public function setImageAttribute($image)
    {
        $name = uniqid() . '.' . $image->getClientOriginalExtension();

        Storage::disk('user_images')->put($name, File::get($image));

        $this->attributes['image'] = $name;

    }
//    protected function getImageDefAttribute($value) {
//        return $this->attributes['image'];
//    }
//    protected function setImageDefAttribute($value) {
//        $this->attributes['image'] = (is_null($value) ? '' : $value);
//    }
    public function getImagesAttribute()
    {
        if ($this->attributes['image']) {
            return '/storage/user_images/'. $this->attributes['image'];
        }

        return '/storage/user_images/default.jpg';
    }
    public function getImageAttribute()
    {
        if ($this->attributes['image']) {
            return $this->attributes['image'];
        }

        return 'default.jpg';
    }
// if ($value) {
//            return asset('images/profile/' . $value);
//        } else {
//            return asset('images/profile/no-image.png');
//        }



}
