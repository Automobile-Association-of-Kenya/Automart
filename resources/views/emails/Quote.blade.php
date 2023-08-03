<x-mail::message>
<h5 style="color: #006544;text-align: center;">{{ $subject }}</h5>

<p style="color: #006544;">{{ $message }}</p>
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
