<!DOCTYPE html>
<html lang="en">
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
    <title>Reservation</title>
</head>
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
                                <a class="nav-link mb-sm-3 mb-md-0 active"  href="{{ route('reserve')}}"><span class="far fa-user-circle mr-2"></span>Gestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 "  href="{{ route('parametre')}}"><span class="far fa-sun mr-2"></span>Paramétrage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 "  href="{{ route('configuration.store')}}"><span class="far fa-comments mr-2"></span>Informer</a>
                            </li>
                            <li class="nav-item">
                                <div class=" sm:flex sm:items-center sm:ml-6 nav-link mb-sm-3 mb-md-0 ">
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
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-center">   
                <div class="table-responsive-sm shadow-soft rounded my-4 ">
                    <table class="table table-striped">
                        <tr>   
                            {{-- <th class="border-0" scope="col" id="class2">Reservation/jour</th> --}}
                            <th class="border-0" scope="col" id="teacher2">Nom</th>
                            <th class="border-0" scope="col" id="males2">Email</th>
                            <th class="border-0" scope="col" id="females2">Action</th>
                        </tr>
                    </table>
                    <div class="card card-sm card-body bg-primary border-light mb-0">
                        <a href="#panel-4" data-target="#panel-4" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                            <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Lundi</span><span class="icon"><span class="fas fa-plus"></span></span>
                        </a>
                        <div class="collapse" id="panel-4">
                            <div class="pt-3">
                                <p class="mb-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">
                                                <div class="progress-wrapper">
                                                    <div class="progress-info">
                                                        <div class="progress-label">
                                                            <span>12/25</span>
                                                        </div>
                                                        <div class="progress-percentage">
                                                            <span>60%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </th>
                                                @foreach ($data as $item)
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">{{ $item->lastname }} {{ $item->firstname }}</th>
                                            
                                                 <td headers="firstyear2 Bolter2 males2">{{ $item->email }}</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <form action="{{ route('approbation')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->reservation_id }}" name="reservation_id">
                                                    <button class="btn btn-primary text-success" type="submit">Approuver</button>
                                                </form>
                                                <form action="rejet" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->reservation_id }}" name="reservation_id">
                                                    <button class="btn btn-primary text-danger" type="submit">Refuser</button>
                                                </form>
                                            </td>
                                          
                                                @endforeach
                                        </tr>
                                    </table>
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
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Approuver</button>
                                                <button class="btn btn-primary text-danger" type="button">Refuser</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
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
                                        <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <div class="card card-sm card-body bg-primary border-light mb-0">
                        <a href="#panel-7" data-target="#panel-7" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                            <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Jeudi</span>
                            <span class="icon"><span class="fas fa-plus"></span></span>
                        </a>
                        <div class="collapse" id="panel-7">
                            <div class="pt-3">
                                <p class="mb-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-sm card-body bg-primary border-light mb-0">
                        <a href="#panel-8" data-target="#panel-8" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                            <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Vendredi</span>
                            <span class="icon"><span class="fas fa-plus"></span></span>
                        </a>
                        <div class="collapse" id="panel-8">
                            <div class="pt-3">
                                <p class="mb-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-sm card-body bg-primary border-light mb-0">
                        <a href="#panel-9" data-target="#panel-9" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                            <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Samedi</span>
                            <span class="icon"><span class="fas fa-plus"></span></span>
                        </a>
                        <div class="collapse" id="panel-9">
                            <div class="pt-3">
                                <p class="mb-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-sm card-body bg-primary border-light mb-0">
                        <a href="#panel-10" data-target="#panel-10" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                            <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Dimanche</span>
                            <span class="icon"><span class="fas fa-plus"></span></span>
                        </a>
                        <div class="collapse" id="panel-10">
                            <div class="pt-3">
                                <p class="mb-0">
                                    <table class="table table-striped">
                                        <tr>
                                            <th scope="row" id="firstyear2" rowspan="2">Lundi</th>
                                            <th scope="row" id="Bolter2" headers="firstyear2 teacher2">D. Bolter</th>
                                            <td headers="firstyear2 Bolter2 males2">5</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" id="Cheetham2" headers="firstyear2 teacher2">A. Cheetham</th>
                                            <td headers="firstyear2 Cheetham2 males2">7</td>
                                            <td headers="firstyear2 Bolter2 females2">
                                                <button class="btn btn-primary text-success" type="button">Success</button>
                                                <button class="btn btn-primary text-danger" type="button">Danger</button>
                                            </td>
                                        </tr>
                                    </table>
                                </p>
                            </div>
                        </div>
                    </div>       
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
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>ù
{{-- <script src="../../vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="../../vendor/jquery-countdown/dist/jquery.countdown.min.js"></script> --}}
<script src="../../js/neumorphism.js"></script>
</body>
</html>