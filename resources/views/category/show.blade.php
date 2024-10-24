@extends('layouts.main');

@section('title', 'Категория подробности!')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row mt-4">
                <div class="col-12">
                    <a href="/" class="btn btn-primary">Назад</a>
                    <div class="card mt-2" style="width: 6   0rem;">
                        <div class="card-header bg-dark">
                            <h1 class="text-center text-info fs-2">Категория: {{$category->id}}</h1>
                        </div>
                        <div class="card-body bg-secondary">
                            <p class="text-center fs-3 text-info">{{$category->name}}</p>
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