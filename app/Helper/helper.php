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

if (! function_exists('currentPage')) {
    function currentPage($active,$parent = false, $default = 'nav-link')
    {
        if (is_null(Route::current())) {
            return $default;
        }

        $slug = Route::current()->parameter('slug');

        if ($slug && str_contains($slug,'/')) {
            $slug = explode('/',$slug)[0];
        }

        return $slug === $active ? $default . ' active' : $default;
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
//            if (array_key_exists($key,$queries)) {
                $queries[$key] = $param;
//            }
        }

        return $url['path'] . '?' . http_build_query($queries);
    }
}
