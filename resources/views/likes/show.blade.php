@extends('layouts.main');

@section('title', 'Подробности!')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="/likes" class="btn btn-primary">Назад</a>
                    <div class="card mt-2" style="width: 6   0rem;">
                        <div class="card-header bg-dark">
                            <h1 class="text-center text-info fs-2">ID Поста: {{$likes->post_id}}</h1><hr style="border:1px solid white">
                            <h1 class="text-center text-info fs-2">ID Пользователя: {{$likes->user_id}}</h1>
                        </div>
                        <div class="card-body bg-secondary">
                            <p class="text-center fs-3 text-info">{{($likes->is_active == 0) ? 'not active' : 'has active'}}</p>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection