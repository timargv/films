@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить Жанр
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">
                    <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                        <label for="exampleInputFile">Постер</label>
                        <input type="file" id="exampleInputFile" name="image">
                    </div>
                </div>
                {{ Form::open(['route' => 'thematics.store']) }}

                <div class=" box-body ">

                    <div class="">

                        <div class="">

                            @include('admin.errors')
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Имя</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="title" type="text" class="form-control" placeholder="Жанр" value="{{ old('title') }}"></div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Описание </label>
                                    <div class="input-group ">
                                        <textarea name="description" rows="5" cols="110">{!! old('description') !!}</textarea></div>
                                </div>
                            </div>

                            <br>

                        </div>
                    </div>

                </div>
                <div class="box-footer clearfix">
                    <button  class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button  class="btn btn-primary">Сохранить</button>
                </div>
                {{ Form::close() }}

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection