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
                    <a href="/orders" class="btn btn-primary">Назад</a>
                    <div class="card mt-2" style="width: 6   0rem;">
                        <div class="card-header bg-dark">
                            <h1 class="text-center text-primary fs-2">ID Продукта: {{$orders->prod_id}}</h1>
                        </div>
                        <div class="card-body bg-secondary">
                            <p class="text-center fs-3 text-info">Количество: {{$orders->count}}</p><hr style="background:white; border:1px solid white">
                            <p class="text-center fs-3 text-info">Сумма: {{$orders->summa}}</p>
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