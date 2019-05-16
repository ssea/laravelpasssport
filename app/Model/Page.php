<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
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
                'source' => 'title',
                'onUpdate'=>true
            ]
        ];
    }

    protected $table = 'pages';
    protected $fillable = [
        'page_id',
        'title',
        'slug',
        'picture',
        'order',
        'url',
        'status',
        'description'
    ];

    /**
     * Many-to-One relations with Subpage.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function subpage()
    {
        return $this->hasMany(Page::class, 'page_id');
    }
}
