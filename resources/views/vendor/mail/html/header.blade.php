@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ public_path('images/logo.png') }}" class="logo" alt="Automart AA Kenya">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
