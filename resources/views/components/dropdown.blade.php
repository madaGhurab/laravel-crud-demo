@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
// Determine alignment classes based on the alignment prop
$alignmentClasses = match($align) {
    'left' => 'origin-top-left start-0',
    'top' => 'origin-top',
    'right' => 'origin-top-right end-0',
    default => 'origin-top-right end-0',
};

// Determine width class based on the width prop
$widthClass = match($width) {
    '48' => 'w-48',
    default => 'w-48',
};
@endphp

<div x-data="{ open: false }" @click.outside="open = false" class="relative">
    <!-- Trigger Button -->
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <!-- Dropdown Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute z-50 mt-2 {{ $widthClass }} rounded-md shadow-lg {{ $alignmentClasses }}"
         @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
