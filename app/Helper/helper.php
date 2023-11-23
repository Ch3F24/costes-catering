<?php

use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

const pageType = [
    'PAGE' => 'page',
    'URL' => 'url',
];

if (! function_exists('navLink')) {
    function navLink($active, $default = 'nav-link')
    {
        return Route::currentRouteName() === $active ? $default . ' active' : $default;
    }
}

if (! function_exists('isActive')) {
    function isActive($active,$parent = false): bool
    {
        $slug = Route::current()->parameter('slug');

        if ($parent) {
            foreach ($active->children as $children) {
                foreach ($children->getRelated('page') as $page) {
                    if ($slug == $page->slug) {
                        return true;
                    }
                }
            }
        } else {
            $page = $active->getRelated('page')->first();

            if ($page) {
                return $slug === $page->slug;
            }

        }
        return false;
    }
}


if (!function_exists('pageLink')) {
    function pageLink($link)
    {
        switch ($link->type) {
            case pageType['PAGE']:
//                $slug = $child ?  $page->getNestedSlug() : $page->slug;
                return  route('page.index', [$link->getRelated('page')->first()->slug]);
                break;
            case pageType['URL']:
                return str_contains($link->url,'http') ? $link->url : '//' . $link->url;
                break;
        }
    }
}

if (!function_exists('url_format')) {
    function url_format($url)
    {
        return (!str_contains($url,'http') ? '//' : null) . $url;
    }
}


if (!function_exists('addImageParams')) {
    function addImageParams($image, $params)
    {
        $url = parse_url($image);
        $queryParams = $url['query'];
        parse_str($queryParams, $queries);

        foreach ($params as $key => $param) {
            $queries[$key] = $param;
        }

        return $url['path'] . '?' . http_build_query($queries);
    }
}

if (! function_exists('getImages')) {
    function getImages($model,$role, $crop = 'default')
    {
        $medias = $model->medias->filter(function ($media) use ($role, $crop) {
            return $media->pivot->role === $role && $media->pivot->crop === $crop;
        });

        $arrays = [];

        foreach ($medias as $key => $media) {
            $arrays[$key] = $model->imageAsArray($role, 'default');
            if ($media->getMetadata('youtube_url')) {
                $arrays[$key]['youtube_url'] = $media->getMetadata('youtube_url');
            }
        }
        return $arrays;
    }
}
