<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class CreateNewUser
{
    public function handle(string $name, string $email): Builder|Model
    {
        return User::query()->create([
            'name' => $name,
            'email' => $email,
        ]);
    }
}
