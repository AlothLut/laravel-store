<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public static function getTableName()
    {
        return with(new static )->getTable();
    }

    public function images()
    {
        return $this->hasMany(ProdictsImages::class);
    }
}
