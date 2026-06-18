<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Schema;
>>>>>>> c46f660 (initial commit project SIBAKSO)

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
<<<<<<< HEAD
        //
=======
        Schema::defaultStringLength(191);
>>>>>>> c46f660 (initial commit project SIBAKSO)
    }
}
