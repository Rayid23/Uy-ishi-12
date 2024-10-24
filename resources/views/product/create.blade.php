@extends('layouts.main')

@section('title', 'Добавить продукт!')

@section('content')
<!-- Часть Контента -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                
                <!-- left column -->
                <div class="col-md-12">
                    <a href="/products" class="btn btn-primary">Назад</a>
                    <!-- general form elements -->
                    <div class="card card-success mt-2">

                        <div class="card-header">
                            <h3 class="card-title">Добавить продуктов</h3>
                        </div>

                        @error('name')
                            <style>
                                .custom-placeholder-name::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror
                        @error('price')
                            <style>
                                .custom-placeholder-price::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror
                        @error('description')
                            <style>
                                .custom-placeholder-description::placeholder {
                                    color: #C92020;
                                    opacity: 1;
                                }
                            </style>
                        @enderror

                        <form action="/products" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="car_id" class="text-success fs-4">Категория</label>
                                    <select class="form-control border-success" id="car_id" name="car_id" placeholder="Продукт">
                                        @foreach ($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-success fs-4">Название</label>
                                    <input type="text" name="name" class="form-control custom-placeholder-name border-success" id="name"
                                        placeholder="@error('name'){{'Заполните это поле!'}} @else Название @enderror" value="{{@old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="price" class="text-success fs-4">Стоимость</label>
                                    <input type="number" name="price" class="form-control custom-placeholder-price border-success" id="price"
                                        placeholder="@error('price'){{'Заполните это поле!'}} @else Стоимость @enderror" value="{{@old('price')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="text-success fs-4">Подробности</label>
                                    <textarea name="description" class="form-control custom-placeholder-description border-success" id="description"
                                        placeholder="@error('description'){{'Заполните это поле!'}} @else Подробности @enderror">{{@old('description')}}</textarea>
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