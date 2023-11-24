<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class Page extends Model
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

}
