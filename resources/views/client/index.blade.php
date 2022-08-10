@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0 mr-3">Клиенты</h1>
                    <a href="{{route('client.create')}}" class="btn btn-primary">Добавить</a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Клиенты</a></li>
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список клиентов</h3>
                    <div class="card-tools">
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Email</th>
                            <th>Телефон</th>
{{--                            <th>Компания</th>--}}
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td name="id">{{$client->id}}</td>
                                <td name="first_name">{{$client->first_name}}</td>
                                <td name="last_name">{{$client->last_name}}</td>
                                <td name="email">{{$client->email}}</td>
                                <td name="phone">{{$client->phone}}</td>
{{--                                <td name="company_id">{{App\Models\Company::where('id',$client->company_id)->first()->name}}</td>--}}
                                <td class="d-flex">
                                    <a href="{{ route('client.show', $client->id) }}" class="item-show mr-2 bg-transparent btn-outline-danger">
                                        <svg fill="#007bff" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"/></svg>                                </a>
                                    </a>
                                    <a href="{{ route('client.edit', $client->id) }}" class="item-edit border-0 bg-transparent btn-outline-danger">
                                        <svg fill="#17a2b8" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V299.6L289.3 394.3C281.1 402.5 275.3 412.8 272.5 424.1L257.4 484.2C255.1 493.6 255.7 503.2 258.8 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM564.1 250.1C579.8 265.7 579.8 291 564.1 306.7L534.7 336.1L463.8 265.1L493.2 235.7C508.8 220.1 534.1 220.1 549.8 235.7L564.1 250.1zM311.9 416.1L441.1 287.8L512.1 358.7L382.9 487.9C378.8 492 373.6 494.9 368 496.3L307.9 511.4C302.4 512.7 296.7 511.1 292.7 507.2C288.7 503.2 287.1 497.4 288.5 491.1L303.5 431.8C304.9 426.2 307.8 421.1 311.9 416.1V416.1z"/></svg>
                                    </a>
                                    <form action="{{ route('client.delete', $client->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" data-id="{{$client->id}}" class="item-delete border-0 bg-transparent btn-outline-danger">
                                            <svg fill="#dd3444" width="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr hidden>
                                <form data="{{$client->id}}" id="item-update" action="{{ route('client.update', $client->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <td name="id">{{$client->id}}</td>
                                    <td><input type="text" name="first_name" value="{{$client->first_name}}"></td>
                                    <td><input type="text" name="last_name" value="{{$client->last_name}}"></td>
                                    <td><input type="text" name="email" value="{{$client->email}}"></td>
                                    <td><input type="text" name="phone" value="{{$client->phone}}"></td>
                                    <td>
                                        <input type="submit" class="item-update btn-primary btn-xs" value="Обновить">
                                        <button type="button" class="item-cancel btn-danger btn-xs">Отмена</button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $clients->links() }}
        </div>
    </div>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.item-update').click(function(e) {
            e.preventDefault()
            var _this = $(this);
            var tr = _this.closest('tr').prop('hidden', true);
            var tr2 = tr.prev().prop('hidden', false);

            var first_name2 = tr2.find('td[name="first_name"]');
            var last_name2 = tr2.find('td[name="last_name"]');
            var email2 = tr2.find('td[name="email"]');
            var phone2 = tr2.find('td[name="phone"]');
            var company_id2 = tr2.find('td[name="company_id"]');

            var url = tr.find('form').attr('action');
            var id = tr.find('td[name="id"]').text();
            var first_name = tr.find('input[name="first_name"]').val();
            var last_name = tr.find('input[name="last_name"]').val();
            var email = tr.find('input[name="email"]').val();
            var phone = tr.find('input[name="phone"]').val();
            var company_id = tr.find('input[name="company_id"]').val();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: url,
                type: 'PATCH',
                data: {
                    "id": id,
                    "first_name": first_name,
                    "last_name": last_name,
                    "email": email,
                    "phone": phone,
                    "company_id": company_id,
                    "_token": token,
                },
                complete: function() {
                    first_name2.text(first_name)
                    last_name2.text(last_name)
                    email2.text(email)
                    phone2.text(phone)
                    company_id2.text(company_id)
                    Toast.fire({
                        icon: 'success',
                        title: 'Запись успешно обновлена.'
                    })
                }
            });
        });
        $('.item-cancel').click(function(e) {
            e.preventDefault()
            var _this = $(this);
            var tr = _this.closest('tr').prop('hidden', true);
            var tr2 = tr.prev().prop('hidden', false)
        });
        $('.item-edit').click(function(e) {
            e.preventDefault()
            var _this = $(this);
            var tr = _this.closest('tr').prop('hidden', true);
            var tr2 = tr.next().prop('hidden', false)
        });
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
                    var tr = _this.closest('tr');
                    tr.slideUp();
                    Toast.fire({
                        icon: 'success',
                        title: 'Запись успешно удалена.'
                    })
                }
            });
        });
    </script>
@endsection
