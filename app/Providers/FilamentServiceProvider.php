<?php

namespace App\Providers;

use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        Filament::serving(function() {
            if (auth()->user()) {
                if (auth()->user()->admin === 4) {
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Andmin-Rechte')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-users'),
                    ]);
                }
            }
        });
    }
}
