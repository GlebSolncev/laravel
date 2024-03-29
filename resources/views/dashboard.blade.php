@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span>
                Главная
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <span></span>Главная <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Пользователей
                            <i class="mdi mdi-account-convert mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $users->count() }}</h2>
                        <h6 class="card-text">Количество пользователей</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Видеозаписи
                            <i class="mdi mdi-message-video mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $videos }}</h2>
                        <h6 class="card-text">Количество видеозаписей</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Посещений
                            <i class="mdi mdi-meteor mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $visition }}</h2>
                        <h6 class="card-text">Количество визитов сайта</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Пользователи</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Name</th>
                                    <th> Due Date</th>
                                    <th> Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="" class="btn btn-outline-primary">
                                                <i class="mdi mdi-lead-pencil mdi-24px"></i>
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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Пользователи</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Name</th>
                                    <th> Due Date</th>
                                    <th> Progress</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> 1</td>
                                    <td> Herman Beck</td>
                                    <td> May 15, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                 style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 2</td>
                                    <td> Messsy Adam</td>
                                    <td> Jul 01, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                 style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 3</td>
                                    <td> John Richards</td>
                                    <td> Apr 12, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                 style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 4</td>
                                    <td> Peter Meggik</td>
                                    <td> May 15, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 5</td>
                                    <td> Edward</td>
                                    <td> May 03, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar"
                                                 style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 5</td>
                                    <td> Ronald</td>
                                    <td> Jun 05, 2015</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%"
                                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
