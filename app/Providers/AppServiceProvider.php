<?php

namespace App\Providers;

use A17\Twill\Repositories\SettingRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Facades\TwillAppSettings;
use A17\Twill\Services\Settings\SettingsGroup;
use A17\Twill\View\Components\Navigation\NavigationLink;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('pages')
        );
        TwillNavigation::addLink(
            NavigationLink::make()->forModule('navigations')
        );
        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()->name('homepage')->label('Homepage')
        );

        if (Schema::hasTable('twill_settings')) {
            $site_keywords = str_replace(';',', ',app(SettingRepository::class)->byKey('keywords'));
            $site_description = app(SettingRepository::class)->byKey('meta_description');
        }

        view()->share([
            'site_keywords' => $site_keywords ?? null,
            'site_description' => $site_description ?? null
        ]);

    }
}
