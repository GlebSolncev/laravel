@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title"> Пользователи </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
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
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row pb-4 float-right">
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('users.create') }}">
                                <i class="mdi mdi-account-multiple-plus mdi-24px"></i>
                            </a>
                        </div>
                        <div class="dataTables_length" id="order-listing_length">
                            <table id="DataTable" class="table">
                                <thead>
                                <tr>
                                    <th>Профиль</th>
                                    <th>Почта</th>
                                    <th>Создан</th>
                                    <th>Статус</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->first_created() }}</td>
                                        <td>
                                            @if($user->isAdmin())
                                                <label class="badge badge-gradient-warning">ADMIN</label>
                                            @elseif($user->isModerator())
                                                <label class="badge badge-gradient-info">{{ $user->role->title }}</label>
                                            @elseif($user->isPremium())
                                                <label class="badge badge-gradient-primary">{{ $user->role->title }}</label>
                                            @else
                                                <label class="badge badge-gradient-danger">{{ $user->role->title }}</label>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a class="btn btn-sm btn-outline-danger"
                                               href="{{ route('users.edit', $user->id) }}">
                                                <i class="mdi mdi-brush text-break mdi-24px"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-primary"
                                               href="{{ route('users.premium', $user->id) }}">
                                                <i class="mdi mdi-parking mdi-18px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
