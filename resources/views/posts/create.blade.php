@extends('layouts.main')

@section('title', 'Добавить пост!')

@section('content')
<!-- Часть Контента -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <!-- left column -->
                <div class="col-md-12">
                    <a href="/posts" class="btn btn-primary">Назад</a>
                    <!-- general form elements -->
                    <div class="card card-success mt-2">

                        <div class="card-header">
                            <h3 class="card-title">Добавить пост</h3>
                        </div>

                        @error('cat_id')
                            <style>
                                .custom-placeholder-cat-id::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror
                        @error('title')
                            <style>
                                .custom-placeholder-title::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror
                        @error('body')
                            <style>
                                .custom-placeholder-body::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror   

                        <form action="/posts" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_id" class="text-success fs-4">Категория</label>
                                    <select class="form-control border-success custom-placeholder-cat-id" id="cat_id" name="cat_id"
                                        placeholder="Продукт">
                                        <option selected="" value="@old('cat_id')">...</option>
                                        @foreach ($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="text-success fs-4">Название</label>
                                    <input type="text" name="title" class="form-control border-success custom-placeholder-title" id="title"
                                        placeholder="@error('title'){{'Заполните это поле!'}} @else Количество @enderror" value="{{@old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="body" class="text-success fs-4">Подробности</label>
                                    <textarea name="body" class="form-control border-success custom-placeholder-body" id="body"
                                        placeholder="@error('body'){{'Заполните это поле!'}} @else Подробности @enderror">{{ @old('body') }}</textarea>
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