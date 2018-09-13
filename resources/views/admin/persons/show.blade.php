@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $person->name }}
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="{{ $person->getImage('original', '') }}" alt="User profile picture" style="margin: 0 auto;width: 110px;max-height: initial;padding: 3px;border: 0;border-radius: 0;">

                      <h3 class="profile-username text-center">{{ $person->name }}</h3>

                      <p class="text-muted text-center">{{ $person->name_original }}</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item clearfix">
                          <b>Карьера</b> 
                          <span class="pull-right">
                            @foreach($person->carers as $carer)
                                @if($carer->title == 'Актер')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Режиссер')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-red">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Сценарист')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-light-blue">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Продюсер')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-green">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Оператор')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Композитор')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge ">{{ $carer->title }}</span></a>
                                @elseif($carer->title == 'Художник')
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-red">{{ $carer->title }}</span></a>
                                @else
                                    <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-green">{{ $carer->title }}</span></a>
                                @endif
                            @endforeach
                          </span>
                        </li>
                        <li class="list-group-item">
                          {{--<b>День Рождение</b> <a class="pull-right">{{ $person->getDate() }}</a>--}}
                          <b>День Рождение</b> <a class="pull-right">{{ $person->date }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Место рождения</b> <a class="pull-right">{{ $person->birthplace }}</a>
                        </li>
                          <li class="list-group-item">
                              <b>Рост</b> <a class="pull-right">{{ $person->stature }}</a>
                          </li>

                      </ul>

                      <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                  <!-- About Me Box -->
                  {{--<div class="box box-primary">--}}
                    {{--<div class="box-header with-border">--}}
                      {{--<h3 class="box-title">Об {{ $person->name }}</h3>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-header -->--}}
                    {{--<div class="box-body">--}}
                      {{--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>--}}

                      {{--<p class="text-muted">--}}
                        {{--B.S. in Computer Science from the University of Tennessee at Knoxville--}}
                      {{--</p>--}}

                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                  {{--</div>--}}
                  <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#activity" data-toggle="tab">Фильмы</a></li>
                      <li><a href="#timeline" data-toggle="tab">Сериалы</a></li>
                      <li><a href="#settings" data-toggle="tab">Изменить</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="clearfix">
                          @foreach($person->films as $film)
                            <div class="box-body box-profile col-xs-6 col-md-2">
                              <a class="thumbnail" style="border: 0; padding: 0; overflow: hidden" href="{{ route('films.show', $film->slug) }}"><img class="img-responsive " src="{{ $film->getImage('original', '') }}" alt="User profile picture"></a>

                              <h3 class="profile-username text-left">{{ $film->title }}</h3>

                            </div>
                          @endforeach
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="timeline">
                         
                      </div>
                      <!-- /.tab-pane -->

                      <div class="tab-pane" id="settings">
                      {{ Form::open(['route' => ['persons.update', $person->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal clearfix' ]) }}
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

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <a href="{{ route('persons.index') }} " class="btn btn-danger">Выйти</a>
                                <button type="submit" name="action" value="saveView" class="btn btn-default ">Сохранить</button>
                            </div>
                          </div>
                        {{ Form::close() }}
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div>
                  <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection