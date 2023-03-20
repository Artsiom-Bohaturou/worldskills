@extends('layouts.app')

@section('title', 'Home')

{{-- @section('hide_header', 'hidden') --}}

@section('content')
    <div class="home-container">

        @guest
            <div class="forms">
                <div class="forms-select">
                    <button class="button select-form-button selected-button" id="loginButton">Вход</button>
                    <button class="button select-form-button" id="registerButton">Регистрация</button>
                </div>

                <form method="POST" action="{{ route('login') }}" class="login-form" id="loginForm">
                    @csrf
                    <h3 class="form-title">Вход в аккаунт</h3>
                    <label>Логин</label>
                    <input class="text-input" type="text" name="login_login" placeholder="Введите логин" required>
                    <label>Пароль</label>
                    <input class="text-input" type="password" name="password" placeholder="Введите пароль" required>
                    <button class="button button-submit" type="submit">Войти</button>
                </form>

                <form method="POST" action="{{ route('register') }}" class="register-form" id="registerForm" hidden>
                    @csrf
                    <h3 class="form-title">Регистрация</h3>
                    <label>ФИО</label>
                    <input class="text-input" type="text" name="name" placeholder="Введите ФИО" required
                        value="{{ old('name') }}">
                    <label>Логин</label>
                    <input class="text-input" type="text" name="register_login" placeholder="Введите логин" required
                        value="{{ old('register_login') }}">
                    <label>Адрес электронной почты</label>
                    <input class="text-input" type="text" name="email" placeholder="Введите адрес электронной почты"
                        required value="{{ old('email') }}">
                    <label>Пароль</label>
                    <input class="text-input" type="password" name="password" placeholder="Введите пароль" required>
                    <label>Подтвердите пароль</label>
                    <input class="text-input" type="password" name="password_confirmation" placeholder="Повторите пароль"
                        required>
                    <div>
                        <label for="confirmCheckbox">Согласе на обработку персональных данных</label>
                        <input class="form-checkbox" id="confirmCheckbox" type="checkbox" name="confirmed" required>
                    </div>
                    <button class="button button-submit" type="submit">Зарегестрироваться</button>
                </form>
            </div>
        @endguest

        <div class="pets-section">
            @foreach ($data as $application)
                <div class="pet-photo">
                    <img src="{{ $application->photo_url }}" alt=" " draggable="false">
                    <p>{{ $application->pet_name }}</p>
                </div>
            @endforeach
        </div>

        <div class="wrong-inputs" id="wrongInputs">
            @foreach ($errors->all() as $error)
                <div class="wrong-message" id="wrongMessage">
                    <span id="closeMessage" class="close-icon">&#10006;</span>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
@endsection

@section('js')
    @guest
        <script src="{{ asset('/js/homeForms.js') }}"></script>
    @endguest
@endsection
