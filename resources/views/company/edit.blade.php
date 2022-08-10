@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0 mr-3">Изменение компании</h1>
                    <a href="{{route('company.show', $company->id)}}" class="btn btn-primary">Просмотр</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('company.index')}}">Компании</a></li>
                        <li class="breadcrumb-item active">Изменить компанию</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Изменение компании</h3>
                </div>

                <form action="{{ route('company.update', $company->id) }}" data-id="{{$company->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input name="name" class="form-control" id="name" placeholder="Введите название" value="{{$company->name}}">
                        </div>
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Введите описание компании...">{{$company->description}}</textarea>
                        </div>
                        @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Количество сотрудников</label>
                            <div class="input-group">
                                <input name="employees" type="number" class="form-control" value="{{$company->employees}}">
                            </div>
                        </div>
                        @error('employees')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="card-footer item-update">
                        <input type="submit" class="btn btn-primary" value="Обновить компанию">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.item-update').click(function(e) {
            e.preventDefault()
            var _this = $('.item-update');
            var url = _this.closest('form').attr('action');
            var id = _this.closest('form').attr('data-id');
            var name = _this.parent().find('input[name="name"]').val();
            var description = _this.parent().find('textarea[name="description"]').val();
            var employees = _this.parent().find('input[name="employees"]').val();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: url,
                type: 'PATCH',
                data: {
                    "id": id,
                    "name": name,
                    "description": description,
                    "employees": employees,
                    "_token": token,
                },
                success: function(result) {
                    window.location.replace("{{route('company.show', $company->id)}}");
                }
            });
        });
    </script>
@endsection
