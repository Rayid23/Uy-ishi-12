@extends('layouts.main')

@section('title', 'Добавить Комментария!')

@section('content')
<!-- Часть Контента -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-md-12">
                    <a href="/comment" class="btn btn-primary">Назад</a>
                    <!-- general form elements -->
                    <div class="card card-success mt-2">

                        <div class="card-header">
                            <h3 class="card-title">Добавить комментарии</h3>
                        </div>

                        @error('body')
                            <style>
                                .custom-placeholder-body::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror
                       

                        <form action="/comment" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="post_id" class="text-success fs-4">Пост</label>
                                    <select name="post_id" id="post_id" class="form-control border-success">
                                        @foreach ($posts as $pos)
                                            <option value="{{$pos->id}}">{{$pos->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="body" class="text-success fs-4" >Коммент</label>
                                    <textarea name="body" class="form-control custom-placeholder-body border-success" id="body"
                                        placeholder="@error('body'){{'Заполните это поле!'}} @else Подробности @enderror"></textarea>
                                </div>
                            </div>
                            
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Сохранить</button>
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