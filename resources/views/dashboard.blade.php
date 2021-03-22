        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link type="text/css" href="../../vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link type="text/css" href="../../vendor/bootstrap/dist/ccs/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../css/neumorphism.css" rel="stylesheet">


<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrapper position-relative">
                        <ul class="nav nav-pills rounded nav-fill flex-column flex-md-row">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active"  href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"><span class="fas fa-tachometer-alt mr-2"></span>{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0"  href="#"><span class="far fa-user-circle mr-2"></span>Gestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0"  href="{{ route('parametre')}}"><span class="far fa-sun mr-2"></span>Paramétrage</a>
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


<footer>

        <p>
            SIMPLON BURKINA <span id="date">2021</span>
        </p>

    </footer>

    
<script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Core -->
<script src="../../vendor/jquery/dist/jquery.min.js"></script>
<script src="../../vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../js/neumorphism.js"></script>
</body>

</html>