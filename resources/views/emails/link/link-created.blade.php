@component('mail::message')
# New Link Created

{{$link->user->name}} Your teammate has created a new link and added it to  {{$link->team->name}} team

@component('mail::button', ['url' => route('customer.link.index')])
Check
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
