@extends('layouts.main');

@section('title', 'Заказы')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session('check'))
                <div class="alert alert-{{session('check')[1]}} mt-2 alert-dismissible" role="alert">
                    {{session('check')[0]}}<br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!-- /.row -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="/orders-create" class="btn btn-primary">Create</a>
                    <div class="card mt-2">
                        <div class="card-header bg-info border-info">
                            <h3 class="card-title">Таблица Заказов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered text-center table-success">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PRODUCT</th>
                                        <th>COUNT</th>
                                        <th>SUMMA</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $ord)
                                        <tr>
                                            <td>{{$ord->id}}</td>
                                            <td>{{$ord->prod_name}}</td>
                                            <td>{{$ord->count}}</td>
                                            <td>{{$ord->summa}}</td>
                                            <td>
                                                <form action="/orders/{{$ord->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2">Delete</button>
                                                    <a href="/orders/{{$ord->id}}" class="btn btn-info">Show</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- Пагинация -->
                    <div class="d-flex justify-content-center">
                        {{ $orders->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection