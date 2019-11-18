@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title"> {{ $user->name }}
                @if($user->isPremium())
                    <label class="badge badge-gradient-primary">Premium</label>
                @endif
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Пользователи</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Редактировать</li>
                </ol>
            </nav>
        </div>

        @if(Session::has('message'))
            <div class="row" id="proBanner">
                <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>{{ Session::get('message') }}</p>
                  <i class="mdi mdi-close ml-auto" id="flashClose"></i>
                </span>
                </div>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Данные пользователя</div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>
                                    Имя
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    Почта
                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    Пароль
                                    <input type="password" class="form-control" name="password">
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Действия</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Сохранить</button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" name="submit_btn" value="save_and_leave">Сохранить и выйти</button>
                                                <button class="dropdown-item" name="submit_btn" value="save_and_stay">Сохранить и остаться</button>
                                                <button class="dropdown-item" name="submit_btn" value="restart">Сбросить</button>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="pay_to_premium" class="form-check-input"
                                            {{ $user->isPremium()?"checked":null }}>
                                    Оплатил <i class="input-helper text-dark"></i>
                                </label>
                            </div>

                            <div class="form-group form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="moderator" class="form-check-input"
                                            {{ $user->isModerator()?"checked":null }}>
                                    Модератор <i class="input-helper text-dark"></i>
                                </label>
                            </div>

                            <div class="form-group form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="administrator" class="form-check-input"
                                            {{ $user->isAdmin()?"checked":null }}>
                                    Администратор <i class="input-helper text-dark"></i>
                                </label>
                            </div>

                            <hr>

                            <div class="form-group form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" name="send_to_email_data" class="form-check-input"> Отправить на почту новые данные <i class="input-helper text-dark"></i>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
