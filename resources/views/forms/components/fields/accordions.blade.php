@php
    $isCompact = $isCompact();
    $childCount = count($getChildComponentContainer()->getComponents());
    $isDarkMode = config('forms.dark_mode');
@endphp

<div id="{{ $getId() }}"
    {{ $attributes->merge($getExtraAttributes())->class([
            'filament-forms-section-component',
            'rounded-xl border border-gray-300 bg-white',
            'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode'),
        ]) }}
    {{ $getExtraAlpineAttributeBag() }}>
    <div @class([
        'filament-forms-accordions-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl',
        'min-h-[40px]' => $isCompact,
        'min-h-[56px]' => !$isCompact,
        'px-4 py-2 items-center',
        'bg-gray-100 dark:bg-gray-900',
    ])>
        <div @class(['filament-forms-accordions-header flex-1 space-y-1'])>
            <h3 @class([
                'font-bold tracking-tight pointer-events-none flex flex-row items-center',
                'text-xl' => !$isCompact,
            ])>
                {{ $getLabel() }}
            </h3>
        </div>
    </div>

    <div class="filament-forms-accordions-content-wrapper">
        <div x-data="{ selected: 0 }">
            <ul class="shadow-box">
                @foreach ($getChildComponentContainer()->getComponents() as $key => $accordion)
                    <li @class([
                        'relative border-b border-gray-200 dark:border-gray-700',
                        'border-none' => $childCount === $key + 1,
                    ])>
                        <button type="button" @class([
                            'w-full px-4 py-4 text-left',
                        ])
                            :class="{ 'bg-gray-50 dark:bg-gray-700': selected == {{ $key }} }"
                            @click="selected !== {{ $key }} ? selected = {{ $key }} : selected = null">
                            <div class="flex items-center justify-between">
                                <div class="mr-2">
                                    <span class="text-sm font-medium">{{ $accordion->getLabel() }}</span>
                                    @if ($description = $accordion->getDescription())
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $description }}</p>
                                    @endif
                                </div>
                                <svg :class="selected == {{ $key }} ? 'rotate-90' : ''"
                                    @class(['w-5 h-5 text-gray-500 transform']) aria-hidden="true" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </div>
                        </button>
                        <div :class="selected == {{ $key }} ? '' : 'hidden'" @class(['relative'])>
                            <div class="px-4 py-4">
                                {{ $accordion }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
