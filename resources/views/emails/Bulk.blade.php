<x-mail::message>
    <img src="{{ asset('images/automart.jpg') }}" alt="">
<h5 style="color: #006544; text-align: center;">{{ $subject }}</h5>
{!! $message !!}
@foreach ($attachments as $item)
    <img src="{{ asset("attachments/$item") }}">
@endforeach
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
