@extends('layouts.main')

@section('title', 'Добавить Лайк!')

@section('content')
<!-- Часть Контента -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                @if ($errors->any())

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Holy Alexander Pierce!</strong> {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach

                @endif
                <!-- left column -->
                <div class="col-md-12">
                    <a href="/comment" class="btn btn-primary">Назад</a>
                    <!-- general form elements -->
                    <div class="card card-success mt-2">

                        <div class="card-header">
                            <h3 class="card-title">Добавить лайк</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/likes" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="post_id">Лайки</label>
                                    <select name="post_id" id="post_id" class="form-control border-success">
                                        <option selected="">...</option>
                                        @foreach ($posts as $pos)
                                            <option value="{{$pos->id}}">{{$pos->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="user_id">Введите айди пользователя:</label>
                                    <input type="number" class="border-success" name="user_id" id="user_id">
                                </div>

                                <div class="form-group" align="center">
                                    <label class="custom-radio btn btn-danger">
                                        <input type="radio" name="is_active" value="0">
                                        Отключено
                                    </label>
                                    <label class="custom-radio btn btn-primary">
                                        <input type="radio" name="is_active" value="1">
                                        Включено
                                    </label>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Сохранить</button>
                                </div>
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