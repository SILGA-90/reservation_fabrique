<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    
        <link type="text/css" href="../../vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link type="text/css" href="../../vendor/bootstrap/dist/ccs/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../css/neumorphism.css" rel="stylesheet">
        <title>DevPage</title>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="alert shadow-inset d-flex mt-4">
                            <span class=" taille">Bienvenue</span>
                            <small class="ml-2 mt-3 font-weight-bolder">à la fabrique numérique simplon</small>
                        </div>
                    </div>
                    <div class="col-md-2 mt-4">
                        <img src="../../img/favicon.ico" alt="">
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class=" sm:flex sm:items-center sm:ml-6 nav-link mb-sm-3 mb-md-0 nav-item ">
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
                        </div>
                    </div>
                </div>
            </div>
        </header>
            <div class="container ">
                <div class="row mt-6">
                    <div class="col-md-6 ">
                        <div class="row ">
                            <div class="col-md-12 text-center mb-4">
                                <span class="h3 ml-4 couleur ">Infos Utiles</span>   
                            </div>                        
                        </div>
                        <div class="col-md-12">
                            <!--Accordion-->
                            <div class="accordion shadow-soft rounded" id="accordionExample1">
                                @foreach ($data as $item)
                                <div class="card card-sm card-body bg-primary border-light mb-0">
                                    <a href="#panel-1" data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                        <span class="h6 mb-0 font-weight-bold">{{$item->title}}</span>
                                        <span class="icon"><span class="fas fa-plus"></span></span>
                                    </a>
                                    <div class="collapse" id="panel-1">
                                        <div class="pt-3">
                                            <p class="mb-0">
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--End of Accordion-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 text-center mb-4">                    
                                <span class="h3 ml-4 mb-4 couleur">Mes reservations de la semaine</span>  
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <!--Accordion-->
                            <div class="accordion shadow-soft rounded">
                                <div class="card card-sm card-body bg-primary border-light mb-0">
                                    <a href="#panel-4" data-target="#panel-4" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                        <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Lundi</span><span class="icon"><span class="fas fa-plus"></span></span>
                                    </a>
                                    <div class="collapse" id="panel-4">
                                        <div class="pt-3">
                                            <p class="mb-0">
                                                At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                                helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-sm card-body bg-primary border-light mb-0">
                                    <a href="#panel-5" data-target="#panel-5" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                        <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Mardi</span>
                                        <span class="icon"><span class="fas fa-plus"></span></span>
                                    </a>
                                    <div class="collapse" id="panel-5">
                                        <div class="pt-3">
                                            <p class="mb-0">
                                                At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                                helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-sm card-body bg-primary border-light mb-0">
                                    <a href="#panel-6" data-target="#panel-6" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                        <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Mercredi</span>
                                        <span class="icon"><span class="fas fa-plus"></span></span>
                                    </a>
                                    <div class="collapse" id="panel-6">
                                        <div class="pt-3">
                                            <p class="mb-0">
                                                At Themesberg, our mission has always been focused on bringing openness and transparency to the design process. We've always believed that by providing a space where designers can share ongoing work not only empowers them to make better products, it also
                                                helps them grow. We're proud to be a part of creating a more open culture and to continue building a product that supports this vision. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End of Accordion-->
                        </div>
                        <div class="col-md-12 mt-4 text-center">
                            <form action="/devPage"  method="POST">
                                @csrf
                                    <input type="hidden" value="{{ Auth::user()-> id }}" name="id">
                                    <div class="form-group">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choisir le jour</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="choosed_day" required>
                                            <option selected>Reservez ici...</option>
                                                @foreach ($dates as $date)
                                                    <option>{{ $date }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                     <button class="signin-button mb-4">{{ __("Reserver") }}</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>

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