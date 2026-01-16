@props([
  'class' => null,
])

<div {{ $attributes->merge(['class' => "w-full max-w-sm px-6 lg:px-0 lg:max-w-7xl mx-auto {$class}"]) }}>
  {!! $slot !!}
</div>
