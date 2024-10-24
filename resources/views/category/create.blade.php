@extends('layouts.main')

@section('title', 'Добавить категорию!')

@section('content')
<!-- Часть Контента -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-md-12">
                    <a href="/" class="btn btn-primary">Назад</a>
                    <!-- general form elements -->
                    <div class="card card-success mt-2">

                        <div class="card-header">
                            <h3 class="card-title">Добавить категорию</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="/category" method="POST">
                            @csrf
                            @error('name')
                                <style>
                                    .custom-placeholder::placeholder {
                                        color:#C92020;
                                        opacity: 1;
                                    }
                                </style>
                            @enderror
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" style="color:green" class="fs-4">Название</label>
                                    <input type="text" name="name" class="form-control custom-placeholder border-success" id="name"
                                        placeholder="@error('name'){{'Заполните это поле!'}} @else Название @enderror">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit"  class="btn btn-success">Сохранить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection