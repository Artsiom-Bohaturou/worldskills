@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="admin-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя питомца</th>
                    <th>Статус</th>
                    <th>Имя пользователя</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->pet_name }}</td>
                        <td>
                            @if ($application->status == 'new')
                                Новая
                            @elseif ($application->status == 'processing')
                                Обработка данных
                            @else
                                Услуга оказана
                            @endif
                        </td>
                        <td>{{ $application->user->name }}</td>
                        <td>
                            @if ($application->status == 'new')
                                <form method="POST" action="{{ route('admin.update', $application->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input hidden name="status" value="processing">
                                    <button type="submit" class="button button-submit">Принять заявку</button>
                                </form>
                            @elseif ($application->status == 'processing')
                                <form method="POST" action="{{ route('admin.update', $application->id) }}"
                                    accept="image/jpeg, image/bmp" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input hidden name="status" value="processed">
                                    <label>Резултат работы:</label>
                                    <input type="file" name="photo">
                                    <button type="submit" class="button button-submit">Завершить работу</button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
@endsection

@section('js')
    <script src="{{ asset('/js/admin.js') }}"></script>
@endsection
