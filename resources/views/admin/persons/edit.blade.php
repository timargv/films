@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование Персонажа
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{ Form::open(['route' => ['persons.update', $person->id], 'method' => 'put', 'files' => true ]) }}
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                                <img class="img-responsive " src="{{$person->getImage('original', '')}}" alt="User profile picture">
                                <label for="exampleInputFile"></label>
                                <input type="file" id="exampleInputFile" name="image">
                            </div>

                            <div class="btn-group " role="toolbar" style="width: 100%">
                                <button type="submit" name="action" value="save" class="btn btn-default btn-block"><b>Сохранить картинку</b></button>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <div class="col-md-9">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">

                            <ul class="list-group list-group-unbordered">
                                <li style="border-top: 0" class="list-group-item clearfix">
                                    <div class="form-group">
                                        <label>Имя</label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="name" type="text" class="form-control" placeholder="Иван" value="{{ $person->name }}">
                                        </div>
                                </li>
                                <li class="list-group-item clearfix">
                                    <div class="form-group">
                                        <label>Профессии</label>
                                        {{Form::select('carers[]',
                                          $carers,
                                          $selectedCarers,
                                          ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Профессии'])
                                        }}
                                    </div>
                                </li>
                                <li style="border-bottom: 0" class="list-group-item clearfix">
                                    <div class="form-group">
                                        <label>День рождения </label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" value="{{ $person->date }}" name="date">
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{ URL::previous() }} " class="btn btn-danger">Выйти</a>
                            <button  class="btn btn-primary">Сохранить</button>
                            <button type="submit" name="action" value="saveView" class="btn btn-default ">Сохранить и Посмотреть</button>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>
            </div>
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

