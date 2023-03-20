@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="profile-container">
        <div class="menu-container">
            <ul class="menu" id="menu">
                <li class="menu-item selected" id="applicationsListButton">Мои заявки</li>
                <li class="menu-item" id="createApplicationButton">Создать заявку</li>
            </ul>
        </div>

        <div class="line"></div>

        <div class="applications-list" id="applicationsList">
            @foreach ($data as $application)
                <div class="application" id="application" data-id="{{ $application->id }}">
                    <img alt=' ' src="{{ $application->photo_url }}">
                    <div>
                        <b>Имя питомца: {{ $application->pet_name }}</b><br>
                        <span>
                            Статус:
                            @if ($application->status == 'new')
                                Новая
                            @elseif ($application->status == 'processing')
                                Обработка данных
                            @else
                                Услуга оказана
                            @endif
                        </span>
                    </div>
                    @if ($application->status == 'new')
                        <button class="button delete-button" id="deleteButton">Удалить</button>
                    @endif
                </div>
            @endforeach
        </div>

        <div id="createApplication" class="create-application" hidden>
            <h3>Создание заявки</h3>
            <form action="{{ route('profile.store') }}" method="POST" class="application-form"
                accept="image/jpeg, image/bmp" enctype="multipart/form-data">
                @csrf
                <label>Имя питомца:</label>
                <input class="application-form-input" name="pet_name">
                <label>Фото питомца:</label>
                <input name="photo" type="file">
                <button type="submit" class="button button-submit">Создать</button>
            </form>
        </div>
    </div>

    <div class="modal hidden" id="deleteModal">
        <div class="warning">
            <div class="warning-header">
                <b>Удаление заявки</b>
                <span id="closeModal" class="close-icon">&#10006;</span>
            </div>
            <div class="warning-body">Вы уверены что хотите удалить эту заявку?</div>
            <div class="warning-footer">
                <button class="button cancel-button" id="cancelButton">Отмена</button>
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input hidden id="deleteId" name="id">
                    <button type="submit" class="button delete-confirm-button" id="deleteConfirmButton">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    <div class="wrong-inputs" id="wrongInputs">
        @foreach ($errors->all() as $error)
            <div class="wrong-message" id="wrongMessage">
                <span id="closeMessage" class="close-icon">&#10006;</span>
                {{ $error }}
            </div>
        @endforeach
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/js/profile.js') }}"></script>
@endsection
