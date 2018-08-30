@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить фильм
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                </div>
                {{ Form::open(['route' => 'films.store']) }}

                <div class=" box-body ">

                    <div class="">

                        <div class="">

                            @include('admin.errors')
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Имя</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="title" type="text" class="form-control" placeholder="Иван"></div>
                                </div>
                                <div class="col-xs-6">                                
                                    <div class="form-group">
                                      <label>Жанры</label>
                                      {{Form::select('genres[]', 
                                        $genres, 
                                        null, 
                                        ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите жанры'])
                                      }}
                                    </div>
                                    <div class="form-group">
                                      <label>Актеры</label>
                                      {{Form::select('actors[]', 
                                        $actors, 
                                        null, 
                                        ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Актера'])
                                      }}
                                    </div>
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