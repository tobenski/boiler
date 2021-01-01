<?php

namespace App\Models;

use App\Traits\SelfReferenceTrait;
use Flyhjaelp\LaravelEloquentOrderable\Interfaces\OrderableInterface;
use Flyhjaelp\LaravelEloquentOrderable\Traits\Orderable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia, OrderableInterface
{
    use HasFactory;
    use SelfReferenceTrait;
    use SoftDeletes;
    use Orderable;
    use HasSlug;
    use InteractsWithMedia;

    protected $table = 'pages';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'header_1',
        'header_2',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'notes',
        'online',
        'order',
        'parent_id',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('page')
            ->useDisk('s3')
            ->singleFile()
            ->withResponsiveImages();

        $this->addMediaCollection('album')
            ->useDisk('s3')
            ->onlyKeepLatest(5)
            ->withResponsiveImages();

        $this->addMediaCollection('video-xs')
            ->useDisk('s3')
            ->singleFile();

        $this->addMediaCollection('video-sm')
            ->useDisk('s3')
            ->singleFile();

        $this->addMediaCollection('video-md')
            ->useDisk('s3')
            ->singleFile();

        $this->addMediaCollection('video-lg')
            ->useDisk('s3')
            ->singleFile();

        $this->addMediaCollection('video-xl')
            ->useDisk('s3')
            ->singleFile();
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->doNotGenerateSlugsOnUpdate();
    }

     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
