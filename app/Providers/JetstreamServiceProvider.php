<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     $this->configurePermissions();

    //     Jetstream::deleteUsersUsing(DeleteUser::class);
    // }
        public function boot()
        {
            Fortify::authenticateUsing(function (Request $request) {
                $user = User::where('email', $request->email)->first();

                if ($user &&
                    Hash::check($request->password, $user->password)) {
                    return $user;
                }
            });
        }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
