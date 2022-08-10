@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0 mr-3">Компания</h1>
                    <a href="{{route('company.edit', $company->id)}}" class="btn btn-primary mr-3">Изменить</a>
                    <form action="{{route('company.delete', $company->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" data-id="2" class="item-delete btn btn-danger">Удалить</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Компании</a></li>
                        <li class="breadcrumb-item active">Компания</li>
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
                        О компании
                    </h3>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Название</dt>
                        <dd class="col-sm-8">{{ $company->name }}</dd>
                        <dt class="col-sm-4">Описание</dt>
                        <dd class="col-sm-8">{{ $company->description }}</dd>
                        <dt class="col-sm-4">Сотрудники</dt>
                        <dd class="col-sm-8">{{ $company->employees }}</dd>
                        <dt class="col-sm-4">Клиенты</dt>
                        <dd class="col-sm-8">
                            @foreach ($clients as $client)
                                {{ $loop->first ? '' : ', ' }}
                                <a href="{{ route('client.show',$client->id)}}">{{$client->first_name}} {{$client->last_name}}</a>
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
                    window.location.replace("{{route('company.index')}}");
                }
            });
        });
    </script>
@endsection
