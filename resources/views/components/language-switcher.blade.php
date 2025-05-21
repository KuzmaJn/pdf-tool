{{-- language-switcher.blade.php --}}

@php
    $currentLocale = app()->getLocale();
    $availableLocales = config('app.available_locales');
    $localeFlags = [
        'en' => '🇬🇧',
        'sk' => '🇸🇰',
    ];
    $currentFlag = $localeFlags[$currentLocale] ?? '';
    $currentName = $availableLocales[$currentLocale] ?? $currentLocale;
@endphp

<div x-data="{ open: false }" class="language-switcher relative inline-block text-left">
    <button
        @click="open = !open"
        type="button"
        class="inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        aria-haspopup="true"
        :aria-expanded="open"
    >
        <span class="mr-2">{{ $currentFlag }}</span>
{{--        <span>{{ $currentName }}</span>--}}
        <svg class="ml-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  d="M6 8l4 4 4-4"/>
        </svg>
    </button>
    <div
        x-show="open"
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50"
        style="display: none;"
    >
        <form action="{{ route('language.switch') }}" method="POST">
            @csrf
            <ul class="py-1">
                @foreach($availableLocales as $localeCode => $localeName)
                    @php
                        $flag = $localeFlags[$localeCode] ?? '';
                        $isActive = $localeCode === $currentLocale;
                    @endphp
                    <li>
                        <button
                            type="submit"
                            name="locale"
                            value="{{ $localeCode }}"
                            class="w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                {{ $isActive ? 'bg-gray-100 font-semibold text-gray-900' : 'text-gray-700 hover:bg-gray-50' }}
                                focus:outline-none"
                            @click="open = false"
                            {{ $isActive ? 'disabled' : '' }}
                        >
                            <span>{{ $flag }}</span>
                            <span>{{ $localeName }}</span>
                            @if($isActive)
                                <svg class="ml-auto h-4 w-4 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            @endif
                        </button>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
</div>
