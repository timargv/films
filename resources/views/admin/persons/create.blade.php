@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Создание персонажа
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                </div>
                {{ Form::open(['route' => 'persons.store']) }}

                <div class=" box-body ">

                    @include('admin.errors')
                    <div class="clearfix row">
                        <div class="col-xs-6">
                            <label>Имя</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="name" type="text" class="form-control" placeholder="Иван"></div>
                        </div>
                        <div class="col-xs-6">                                
                            <div class="form-group">
                              <label>Профессии</label>
                              {{Form::select('carers[]', 
                                $carers, 
                                null, 
                                ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Профессии'])
                              }}
                            </div>

                            <div class="form-group">

                                <label>День рождения </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" value="{{ old('date') }}" name="date">
                                </div>

                            </div>
                            
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