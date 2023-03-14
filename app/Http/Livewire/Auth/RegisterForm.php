<?php

declare(strict_types=1);

namespace App\Http\Livewire\Auth;

use App\Actions\Auth\CreateNewUser;
use App\Actions\Auth\SendLoginLink;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

final class RegisterForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $status = '';

    public function submit(CreateNewUser $user, SendLoginLink $action): void
    {
        $this->validate();

        $user = $user->handle(
            name: $this->name,
            email: $this->email,
        );

        if (! $user) {
            throw ValidationException::withMessages(
                messages: [
                    'email' => 'Something went wrong, please try again later.',
                ],
            );
        }

        $action->handle(
            email: $this->email,
        );

        $this->status = 'An email has been sent for you to log in.';
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:55',
            ],
            'email' => [
                'required',
                'email',
            ]
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.register-form');
    }
}
