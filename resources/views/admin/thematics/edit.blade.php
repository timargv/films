@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактировать Жанр
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                </div>
                {{ Form::open(['route' => ['thematics.update', $thematic->id], 'method' => 'put']) }}
                <div class=" box-body ">

                    <div class="">

                        <div class="">

                            @include('admin.errors')
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Имя</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="title" type="text" class="form-control" placeholder="Иван" value="{{ $thematic->title }}"></div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Описание </label>
                                    <div class="input-group ">
                                        <textarea name="description" rows="5" cols="110">{!! $thematic->description !!}</textarea></div>
                                </div>
                            </div>
                            <br>

                            <br>

                        </div>
                    </div>

                </div>
                <div class="box-footer clearfix">
                    <a href="{{ URL::previous() }} " class="btn btn-default">Закрыть</a>
                    <button  class="btn btn-primary">Сохранить</button>
                </div>
                {{ Form::close() }}

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection