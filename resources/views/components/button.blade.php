@php
    $hasClass = $attributes->get('class');
@endphp

<a {{ $attributes->merge(['class' => $hasClass ?: 'flex items-center justify-center w-12 h-12 bg-violet-700 rounded-full']) }}>
    {{ $slot }}
</a>