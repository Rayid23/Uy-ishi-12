@extends('layouts.main');

@section('title', 'Лайки')

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
            <!-- <a href="/products-create" class="btn btn-primary">Create</a> -->
            <!-- /.row -->
            <div class="row mt-2">
                <div class="col-12">
                    <a href="/like-create" class="btn btn-primary">Создать</a>
                    <div class="card mt-2">
                        <div class="card-header bg-info border-info">
                            <h3 class="card-title">Таблица Лайков</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered text-center table-success">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE-POST</th>
                                        <th>ACTIVE</th>
                                        <th>OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($likes as $like)
                                        <tr>
                                            <td>{{$like->id}}</td>
                                            <td>{{substr($like->pos_title, 0, 50)}}</td>
                                            <td>{{ ($like->is_active == 0) ? 'not active' : 'has active' }}</td>
                                            <td>
                                                <form action="/likes/{{$like->id}}" method="POST"
                                                    style="display: inline-flex">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger me-2">Delete</button>
                                                    <a href="/likes/{{$like->id}}" class="btn btn-info">Show</a>
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
                        {{ $likes->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection