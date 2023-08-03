<x-mail::message>
<h5 style="color: #006544;text-align:center;"><strong>{!! $vehicle !!}</strong></h5>

<p style="color: #006544;">{!! $message !!}</p>

<p style="color: #006544;">You can reach us by replying to this message.</p>
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
