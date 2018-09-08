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
                {{ Form::open(['route' => ['thematics.update', $thematic->id], 'method' => 'put', 'files' => true ]) }}
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                            <button type="submit" name="action" value="del" class="btn btn-default btn-block"><b>-</b></button>


                            <img class="img-responsive " src="{{$thematic->getImage('original', '')}}" alt="User profile picture">


                            <label for="exampleInputFile">Постер</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>

                        <div class="btn-group " role="toolbar" style="width: 100%">
                            <button type="submit" name="action" value="save" class="btn btn-default btn-block"><b>Сохранить картинку</b></button>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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