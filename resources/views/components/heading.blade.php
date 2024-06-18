@props(['headingLevel' => 1])

<h{{ $headingLevel }} {{ $attributes }}>
    {{ $slot }}
    </h{{ $headingLevel }}>
