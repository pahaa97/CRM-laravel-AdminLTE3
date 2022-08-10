@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0 mr-3">Клиент</h1>
                    <a href="{{route('client.edit', $client->id)}}" class="btn btn-primary mr-3">Изменить</a>
                    <form action="{{route('client.delete', $client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" data-id="2" class="item-delete btn btn-danger">Удалить</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Клиенты</a></li>
                        <li class="breadcrumb-item active">Клиент</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        О клиенте
                    </h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Имя</dt>
                        <dd class="col-sm-8">{{ $client->first_name }}</dd>
                        <dt class="col-sm-4">Фамилия</dt>
                        <dd class="col-sm-8">{{ $client->last_name }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $client->email }}</dd>
                        <dt class="col-sm-4">Телефон</dt>
                        <dd class="col-sm-8">{{ $client->phone }}</dd>
                        <dt class="col-sm-4">Компании</dt>
                        <dd class="col-sm-8">
                            @foreach ($companies as $company)
                                {{ $loop->first ? '' : ', ' }}
                                <a href="{{ route('company.show',$company->id)}}">{{ $company->name }}</a>
                            @endforeach
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.item-delete').click(function(e) {
            e.preventDefault()
            var _this = $(this);
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: $(this).parent().attr('action'),
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(result) {
                    window.location.replace("{{route('client.index')}}");
                }
            });
        });
    </script>
@endsection
