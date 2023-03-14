<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Mail\Auth\LoginLink;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

final class SendLoginLink
{
    public function handle(string $email): void
    {
        Mail::to(
            users: $email,
        )->send(
            mailable: new LoginLink(
                url: URL::signedRoute(
                    name: 'login:store',
                    parameters: [
                        'email' => $email,
                    ],
                    expiration: 3600,
                ),
            )
        );
    }
}
