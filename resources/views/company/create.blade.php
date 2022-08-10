@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить компанию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('company.index')}}">Компании</a></li>
                        <li class="breadcrumb-item active">Добавить компанию</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Новая компания</h3>
                </div>

                <form action="{{ route('company.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input name="name" class="form-control" id="name" placeholder="Введите название">
                        </div>
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Введите описание компании..."></textarea>
                        </div>
                        @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Количество сотрудников</label>
                            <div class="input-group">
                                <input name="employees" type="number" class="form-control">
                            </div>
                        </div>
                        @error('employees')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Добавить компанию">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
