<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>

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
