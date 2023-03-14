<form class="space-y-6" wire:submit.prevent="submit">
    @csrf

    <x-status class="mb-4" :status="$status" />

    <div>
        <x-form.label for="email">
            Email Address
        </x-form.label>
        <div class="mt-2">
            <x-form.input
                id="email"
                name="email"
                type="email"
                wire:model.defer="email"

                autofocus
            />
            <x-form.error :messages="$errors->get('email')" />
        </div>
    </div>

    <div>
        <x-form.submit type="submit">
            Login
        </x-form.submit>
    </div>
</form>
