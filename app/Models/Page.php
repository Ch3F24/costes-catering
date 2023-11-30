<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use App\Repositories\PageRepository;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Page extends Model implements LocalizedUrlRoutable
{
    use HasBlocks, HasTranslation, HasSlug, HasMedias, HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
        'transparent_nav',
        'youtube'
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'seo_description',
        'seo_keywords',
        'active',
    ];

    public $slugAttributes = [
        'title',
    ];

    public function resolveRouteBinding($slug, $field = null)
    {
        $page = app(PageRepository::class)->forSlug($slug);

        abort_if(!$page,404);

        return $page;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->getSlug($locale);
    }

}
