<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
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
    public function boot()
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Bienvenido, verifica de correo electrónico')
                ->greeting('Verifica tu dirección de correo electrónico para comenzar')
                ->line('Hola,')
                ->line('¡Ya casi está todo listo! Para completar tu registro, por favor verifica tu dirección de correo electrónico.')
                ->action('Verificar correo electrónico', $url);
        });
    }
}
