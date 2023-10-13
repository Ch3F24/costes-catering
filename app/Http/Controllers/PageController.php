<?php

namespace App\Http\Controllers;

use A17\Twill\Facades\TwillAppSettings;
use App\Models\Page;
use App\Repositories\PageRepository;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function show(string $slug, PageRepository $pageRepository): View
    {
        $page = $pageRepository->forSlug($slug);

        if (!$page) {
            abort(404);
        }

        return view('site.pages.view', ['page' => $page]);

    }

    public function home(): View
    {
        if (TwillAppSettings::get('homepage.homepage.page')->isNotEmpty()) {
            /** @var Page $page */
            $page = TwillAppSettings::get('homepage.homepage.page')->first();

            if ($page->published) {
                return view('site.pages.home', ['page' => $page]);
            }
        }

        abort(404);
    }
}
