<?php

namespace App\Providers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url') . "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
        Gate::define('show-note', function (User $user, Note $note) {
            return $user->id === $note->user_id || $user->is_admin;
        });
        Gate::define('edit-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });
        Gate::define('delete-note', function (User $user, Note $note) {
            return $user->id === $note->user_id || $user->is_admin;
        });
        Gate::define('update-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });
        Gate::define('create-note', function (User $user) {
            return !$user->is_admin;
        });
        Gate::define('store-note', function (User $user) {
            return !$user->is_admin;
        });
        Gate::define('notes', function (User $user) {
            return !$user->is_admin;
        });
        Gate::define('restore-note', function (User $user, Note $note) {
            return $user->id === $note->user_id;
        });
    }
}
