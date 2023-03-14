<x-mail::message>
# Login Link

Use the link below to log into the {{ config('app.name') }} application.

<x-mail::button :url="$url">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
