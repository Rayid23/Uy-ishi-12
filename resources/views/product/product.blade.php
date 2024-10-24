@extends('layouts.main');

@section('title', 'Продукты')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid mt-4">
            @if(session('check'))
                <div class="alert alert-{{session('check')[1]}} mt-2 alert-dismissible" role="alert">
                    {{session('check')[0]}}<br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="/products-create" class="btn btn-primary">Create</a>
            <!-- /.row -->
            <div class="row mt-2">
                <div class="col-12">
                    <a></a>
                    <div class="card">
                        <div class="card-header bg-info border-info">
                            <h3 class="card-title">Таблица Продуктов</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered text-center table-success">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CATEGORY</th>
                                        <th>NAME</th>
                                        <th>PRICE</th>
                                        <th>DESCRIPTION</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $prod)
                                        <tr>
                                            <td>{{$prod->id}}</td>
                                            <td>{{$prod->cat_name}}</td>
                                            <td>{{$prod->name}}</td>
                                            <td>{{$prod->price}}</td>
                                            <td>{{substr($prod->description, 0, 50)}}</td>
                                            <td>
                                                <form action="/products/{{$prod->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2">Delete</button>
                                                    <a href="/products/{{$prod->id}}" class="btn btn-info">Show</a>
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
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection