<x-mail::message>
Dear {{ $user->full_name }},

Here is your assessment code:
{{ $assess_code }}

Thanks,<br>
{{ config('app.name') }} Team
</x-mail::message>
