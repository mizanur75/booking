<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
                <div class="mt-16">
                    <form action="{{route('front.book')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div>
                                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                        </svg>
                                    </div>
                                    <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
    
                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$hotel->name}}</h2>
    
                                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                        {{$hotel->location}} || Available Rooms - {{$hotel->available_rooms}}
                                    </p>
                                </div>
    
                            </div>
                            <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div>                            
                                    <div>
                                        <x-input-label for="room_type" :value="__('Room Type')" />
                                        <select id="room_type" name="room_type" class="mt-1 mb-3 block w-full" :value="old('room_type')" required>
                                            <option value="">Select Room Type</option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('room_type')" />
                            
                                    </div>
                                    <div>
                                        <x-input-label class="mt-4" for="check_in" :value="__('Check In')" />
                                        <x-text-input id="check_in" name="check_in" type="date" class="mb-4 mt-1 block w-full" :value="old('check_in')" required autofocus autocomplete="check_in" />
                                        <x-input-error class="mt-2" :messages="$errors->get('check_in')" />
                                    </div>
                                    <div>
                                        <x-input-label class="mt-4" for="check_out" :value="__('Check Out')" />
                                        <x-text-input id="check_out" name="check_out" type="date" class="mb-4 mt-1 block w-full" :value="old('check_out')" required autofocus autocomplete="check_out" />
                                        <x-input-error class="mt-2" :messages="$errors->get('check_out')" />
                                    </div>
                                    <div>
                                        <x-input-label class="mt-4" for="occupants" :value="__('Occupants')" />
                                        <x-text-input id="occupants" name="occupants" type="number" class="mb-4 mt-1 block w-full" :value="old('occupants')" required autofocus autocomplete="occupants" />
                                        <x-input-error class="mt-2" :messages="$errors->get('occupants')" />
                                    </div>
                                    <div>
                                        <x-input-label class="mt-4" for="number_of_room" :value="__('Number of Room')" />
                                        <x-text-input id="number_of_room" name="number_of_room" type="number" class="mb-4 mt-1 block w-full" :value="old('number_of_room')" required autofocus autocomplete="number_of_room" />
                                        <x-input-error class="mt-2" :messages="$errors->get('number_of_room')" />
                                    </div>
                            
                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Book') }}</x-primary-button>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
