<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Product;
use Carbon\Carbon;

class Category extends Model
{
    use Sluggable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();

        static::deleted(function ($category) {
            $category->products()->delete();
        });

        static::restoring(function($category) {
            $category->products()->withTrashed()->where('category_id', '=', $category->id)->restore();
            //$category->products()->withTrashed()->where('deleted_at', '>=', Carbon::now()->setTime(0, 0, 0)->subWeek())->restore();
        });  
    }

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

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'picture',
        'order',
        'status',
        'description'
    ];

    /**
     * One-to-Many relations with Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
