@extends('layouts.main');

@section('title', 'Посты')

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
            <a href="/posts-create" class="btn btn-primary">Create</a>
            <!-- /.row -->
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info border-info">
                            <h3 class="card-title">Таблица Постов</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered text-center table-success">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CATEGORY</th>
                                        <th>TITLE</th>
                                        <th>BODY</th>
                                        <th>LIKES</th>
                                        <th>DISLIKES</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $pos)
                                        <tr>
                                            <td class="wid">{{$pos->id}}</td>
                                            <td class="wid">{{$pos->cat_name}}</td>
                                            <td class="wid">{{$pos->title}}</td>
                                            <td class="wid">{{substr($pos->body, 0, 50)}}</td>
                                            <td class="wid">{{$pos->likes}}</td>
                                            <td class="wid">{{$pos->dislikes}}</td>
                                            <td>
                                                <form action="/posts/{{$pos->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2">Delete</button>
                                                    <a href="/posts/{{$pos->id}}" class="btn btn-info">Show</a>
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
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection