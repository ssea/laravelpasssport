<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Model\Category;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'=>true
            ]
        ];
    }

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'picture',
        'amount',
        'unit_price',
        'order',
        'is_home',
        'status',
        'description'
    ];

    /**
     * Many-to-One relations with Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
