@component('mail::message')
# Your Site is Down

## {{$link->url}}

You as member of {{$link->team->name}} team we would like to inform you , at {{$link->scaned_at}} we scan your site and sadly it was down ,Please check and fix the issue  

@component('mail::button', ['url' => route('customer.scan.index')])

Scan Logs
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent