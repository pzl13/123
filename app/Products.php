<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Products extends Model
{
    use Sortable;

    public $sortable = ['id','name_products','name_descriptions','created_at'];

    protected $table = 'products';
    protected $fillable = ['id','name_products','name_descriptions','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */


    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
    public function images()
    {
        return $this->hasMany('App\ImagesProducts', 'product_id');
    }




}
