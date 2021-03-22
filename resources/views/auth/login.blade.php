<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
    <link href={{asset("/css/login.css")}} rel="stylesheet">
    <title>Document</title>
</head>
<body>
<x-guest-layout>

    <div class="login-form-design">
        <div class="form-logo-image"></div>
        <div class="large-text-title">Enregistrez-vous</div>
        <div class="small-text">@Fabrique</div>
    {{-- <x-jet-authentication-card> --}}
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="input-fields">
            @csrf

            <div class="email">
                {{-- <x-jet-label for="email" value="{{ __('Email') }}" /> --}}
              <svg fill="#999" viewBox="0 0 1024 1024">
                <path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path>
              </svg>
                <input id="email" type="email" name="email"  class="user-input" :value="old('email')" required autofocus placeholder="email"/>
            </div>

            <div class="password">
                {{-- <x-jet-label for="password" value="{{ __('Password') }}" /> --}}
              <svg fill="#999" viewBox="0 0 1024 1024">
                <path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path>
              </svg>
                <input id="password" type="password" name="password"  class="pass-input" required autocomplete="current-password" placeholder="mot de passe"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <button class="signin-button">{{ __('Login') }}</button>

            <div class="flex items-center justify-end mt-4 link">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oubié ?') }}
                    </a>
                @endif
                    OU
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Inscrivez-vous') }}
                    </a>
                {{-- <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button> --}}
            </div>
        </form>
    {{-- </x-jet-authentication-card> --}}
    </div>
</x-guest-layout>
 <footer>

        <p>
            SIMPLON BURKINA <span id="date">2021</span>
        </p>

    </footer>

</body>

</html>


