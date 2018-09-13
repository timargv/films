@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактирование {{ $person->name }}
                <small>{{ $person->name_original }}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{ Form::open(['route' => ['persons.update', $person->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal' ]) }}
            <div class="row">
                <div class="col-md-2">

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
                        <div class="box-header with-border">
                            Редактирование - {{ $person->name }}
                        </div>
                        <div class="box-body box-profile ">

                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Имя</label>

                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control" placeholder="Иван" value="{{ $person->name }}">
                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Имя EN</label>

                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" placeholder="Иван" value="{{ $person->name_original }}">
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Профессии</label>

                                    <div class="col-sm-10">
                                        {{Form::select('carers[]',
                                                $carers,
                                                $selectedCarers,
                                                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Профессии', 'style' => 'width: 100%;'])
                                        }}
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">День рождения</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control pull-right"  value="{{ $person->date }}" name="date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Место рождения</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control pull-right"  value="{{ $person->birthplace }}" name="birthplace">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Рост</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control pull-right"  value="{{ $person->stature }}" name="stature">
                                    </div>
                                </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('persons.index') }} " class="btn btn-danger">Выйти</a>
                                    <button  class="btn btn-primary">Сохранить</button>
                                    <button type="submit" name="action" value="saveView" class="btn btn-default ">Сохранить и Посмотреть</button>
                                </div>
                            </div>
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

