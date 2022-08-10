@extends('adminlte::page')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0 mr-3">Изменение клиента</h1>
                    <a href="{{route('client.show', $client->id)}}" class="btn btn-primary">Просмотр</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('client.index')}}">Клиенты</a></li>
                        <li class="breadcrumb-item active">Изменить клиента</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Изменение клиента</h3>
                </div>

                <form action="{{ route('client.update', $client->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">Имя</label>
                            <input name="first_name" class="form-control" id="first_name" placeholder="Введите имя" value="{{$client->first_name}}">
                        </div>
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="last_name">Фамилия</label>
                            <input name="last_name" class="form-control" id="last_name" placeholder="Введите фамилию" value="{{$client->last_name}}">
                        </div>
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" class="form-control" id="email" placeholder="Введите email" value="{{$client->email}}">
                        </div>
                        @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input name="phone" class="form-control" id="phone" placeholder="Введите телефон" value="{{$client->phone}}">
                        </div>
                        @error('phone')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group" data-select2-id="10">
                            <label>Компании</label>
                            <select class="form-control select2" name="companies[]" id="id_select2_demo4" multiple="multiple">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                            @error('companies')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Обновить клиента">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .select2-container {
            width: 100% !important;
        }
        .select2-container .select2-selection--single {
            height: 35px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
