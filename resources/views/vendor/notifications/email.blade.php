@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# Whoops! parece haber un error :(
@else
# Hola, hay nuevas noticias!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}
@endforeach

{{-- Action Button --}}
@isset($actionText)

@component('mail::button', ['url' => $actionUrl, 'color' => 'primary'])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Saludos, BitácoraDISC.
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
Si tienes problemas con el botón de arriba, copia y pega
esta URL en tu navegador: <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>

@endslot
@endisset
@endcomponent
