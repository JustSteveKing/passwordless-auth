<?php

declare(strict_types=1);

namespace App\Http\Livewire\Auth;

use App\Actions\Auth\SendLoginLink;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

final class LoginForm extends Component
{
    public string $email = '';

    public string $status = '';

    public function submit(SendLoginLink $action)
    {
        $this->validate();

        $action->handle(
            email: $this->email,
        );

        $this->status = 'An email has been sent for you to log in.';
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists(
                    table: 'users',
                    column: 'email',
                ),
            ]
        ];
    }

    public function render(): View
    {
        return view('livewire.auth.login-form');
    }
}
