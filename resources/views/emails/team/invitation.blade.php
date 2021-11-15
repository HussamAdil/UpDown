@component('mail::message')
# Invitation

{{$invitation->user->name}} invite you to join  {{$invitation->team->name}} team

@component('mail::button', ['url' => route('customer.invitation.index')])
Check invitation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
