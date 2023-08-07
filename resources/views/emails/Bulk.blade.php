<x-mail::message>
<h5 style="color: #006544; text-align: center;">{{ $subject }}</h5>

{!! $message !!}
@foreach ($attachments as $item)
    <img src="{{ public_path("attachments/$item") }}">
@endforeach
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
