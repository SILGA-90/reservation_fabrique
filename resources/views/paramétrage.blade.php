
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrapper position-relative">
                        <ul class="nav nav-pills rounded nav-fill flex-column flex-md-row">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 "  href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"><span class="fas fa-tachometer-alt mr-2"></span>{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0"  href="#"><span class="far fa-user-circle mr-2"></span>Gestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active"  href="{{ route('parametre')}}"><span class="far fa-sun mr-2"></span>Paramétrage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0"  href="{{ route('configuration.store')}}"><span class="far fa-comments mr-2"></span>Informer</a>
                            </li>
                            <li class="nav-item">
                                <div class=" sm:flex sm:items-center sm:ml-6 nav-link mb-sm-3 mb-md-0">
                                    <!-- Settings Dropdown -->
                                    <div class="ml-3 relative">
                                        <x-jet-dropdown align="right" width="18">
                                            <x-slot name="trigger">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->lastname }}" />
                                                    </button>
                                                @else
                                                    <span class="inline-flex rounded-md">
                                                        <button type="button" class="inline-flex items-center ">
                                                            {{ Auth::user()->lastname }} {{ Auth::user()->firstname }}

                                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                @endif
                                            </x-slot>

                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-black-400">
                                                    {{ __('Gestion du compte') }}
                                                </div>

                                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>

                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                        {{ __('API Tokens') }}
                                                    </x-jet-dropdown-link>
                                                @endif

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
     <x-app-layout>
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg">

                        <div class="min-h-screen flex justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
                            <div class="max-w-md w-full space-y-8">

                                @if(Session::has("success"))
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Success!</strong>
                                        <span class="block sm:inline">{{Session::get('success')}}</span>
                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                        </span>
                                    </div>

                                @elseif(Session::has("failed"))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Failed!</strong>
                                        <span class="block sm:inline">{{Session::get('failed')}}</span>
                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>

    <main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <form class="input-daterange datepicker row align-items-center" action="parametre" method="post">
                    @csrf
                    <div class="col-md-12 my-5">
                        <label class="h6" for="exampleInputDate2">Du</label>
                        <div class="form-group">
                            <div class="input-group input-group-border">
                                <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                                <input class="form-control datepicker" id="exampleInputDate2" placeholder="Start date" type="text" name="jour_d">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="h6" for="exampleInputDate3">Au</label>
                            <div class="input-group input-group-border">
                                <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                                <input class="form-control datepicker" id="exampleInputDate3" placeholder="End date" type="text" name="jour_f">
                            </div>
                        </div>
                    </div>
                    <button class="signin-button">{{ __("Soumettre") }}</button>
                </form>
            </div>
            <form action="/parametre" class="col-md-6 mt-5" method="POST">
                @csrf
                    <div class="form-group">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choisir le jour</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="choosed_day">
                            <option selected>Choisir...</option>
                                @foreach ($dates as $date)
                                     <option>{{ $date}}</option>
                                @endforeach
                                
                            
                        </select>
                    </div>

                    <div class="form-group row d-flex justify-content-center">
                        <div class="col-4">
                            <input class="form-control" type="time" value="" id="example-time-input" name="start_hour">
                        </div>
                        <p class="text-center font-weight-bolder mt-2 ">à</p>
                        <div class="col-4">
                            <input class="form-control" type="time" value="" id="example-time-input" name="end_hour">
                        </div>
                    </div>
                        
                    <div class="form-group mb-4 row">
                        <input type="number" name="selected_number" class="form-control" id="exampleInputEmail67" aria-describedby="emailHelp" placeholder="Entrez le nombre de place">
                    </div>
                    <button class="signin-button">{{ __("Soumettre") }}</button>
            </form>
        </div>

    </div>
    </main>   
    <footer>

        <p>
            SIMPLON BURKINA <span id="date">2021</span>
        </p>

    </footer>
</body>

</html>