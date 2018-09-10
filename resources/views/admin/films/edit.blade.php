@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редактировать фильм
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {!!  Form::open(['route' => ['films.update', $film->id], 'method' => 'put', 'files' => true ])  !!}
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                                {{--<button type="submit" name="action" value="del" class="btn btn-default btn-block"><b>-</b></button>--}}


                                <img class="img-responsive " src="{{$film->getImage('original', '')}}" alt="User profile picture">
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



                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Год</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('years[]',
                                  $years,
                                  $selectedYears,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Год'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Страна</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('countries[]',
                                  $countries,
                                  $selectedCountries,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Страну'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Жанры</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('genres[]',
                                  $genres,
                                  $selectedGenres,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите жанры'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Актеры</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('persons[]',
                                  $persons,
                                  $selectedPersons,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Актера'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Режиссер</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('directors[]',
                                  $persons,
                                  $selectedDirectors,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Режиссера'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Сценарист</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('writers[]',
                                  $persons,
                                  $selectedWriters,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Сценариста'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Оператор</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('operators[]',
                                  $persons,
                                  $selectedOperators,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Оператора'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Композитор</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('musicians[]',
                                  $persons,
                                  $selectedMusicians,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Композитора'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Художник</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('artists[]',
                                  $persons,
                                  $selectedArtists,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Художника'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Монтаж</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('mountings[]',
                                  $persons,
                                  $selectedMountings,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Монтажера'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Связанные Фильмы</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('relateds[]',
                                  $relateds,
                                  $selectedRelateds,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Фильм'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Тематика</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                {{Form::select('thematics[]',
                                  $thematics,
                                  $selectedThematics,
                                  ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите Тематику'])
                                }}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="pull-right">
                                <button  class="btn btn-default" name="action" value="saveView">Посмотреть</button>
                                <button  class="btn btn-default">Сохранить и закрыть</button>
                                <button  type="submit" name="action" value="saveAdd" class="btn btn-default ">Сохранить и добавить</button>
                                <a href="{{ route('films.index') }}"  class="btn btn-danger">Выйти</a>
                            </div>
                        </div>
                        <div class="box-header with-border">
                            <div class="form-group">

                                <label>Назание Ru</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="title" type="text" class="form-control" placeholder="Иван" value="{{ $film->title }}"></div>
                            </div>

                            <div class="form-group">

                                <label>Назание Оригинальное</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="original_title" type="text" class="form-control" placeholder="Иван" value="{{ $film->original_title }}"></div>
                            </div>

                        </div>
                        <div class=" box-body ">
                            @include('admin.errors')

                            <div class="form-group">

                                <label>Слоган</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="slogan" type="text" class="form-control" placeholder="Иван" value="{{ $film->slogan }}"></div>
                            </div>

                            <div class="form-group">

                                <label>Бюджет</label>
                                <div class="input-group ">
                                    <input name="budget" type="text" class="form-control" placeholder="Иван" value="{{ $film->budget }}"></div>
                            </div>

                            <div class="form-group">

                                <label>Мировая Премьера </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" value="{{ $film->date }}" name="date">
                                </div>

                            </div>

                            <div class="form-group">

                                <label>Возраст</label>
                                <div class="input-group ">
                                    <input name="age" type="text" class="form-control" placeholder="Иван" value="{{ $film->age }}"></div>
                            </div>

                            <div class="form-group">

                                <label>Рейтинг</label>
                                <div class="input-group ">

                                    {{ Form::selectRange('rating', 1, 10, $film->rating, ['class' => 'form-control select', 'data-placeholder'=>'Выберите Фильм']) }}
                                </div>
                            </div>

                            <div class="form-group">

                                <label>Время длительности фильма</label>
                                <div class="input-group ">
                                    <input name="time" type="text" class="form-control" placeholder="Иван" value="{{ $film->time }}"></div>
                            </div>

                            <div class="form-group">

                                <label>Краткое описание</label>
                                <div class="input-group ">
                                    <textarea name="sh_description" rows="3" cols="80">{!! $film->sh_description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <label>Полное описание</label>
                                <div class="input-group ">
                                    <textarea name="description" rows="5" cols="80">{!! $film->description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                <label>Трейлер</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="trailer_field" type="text" class="form-control" placeholder="Иван" value="{{ $film->trailer_field }}"></div>
                            </div>
                            <div class="form-group">

                                <label>Фильм</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="video_field" type="text" class="form-control" placeholder="Иван" value="{{ $film->video_field }}"></div>
                            </div>

                        </div>
                        <div class="box-footer clearfix">
                            <a href="{{ URL::previous() }}"  class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <button  class="btn btn-primary">Сохранить</button>
                        </div>

                    </div>
                </div>
            </div>
            {!!  Form::close()  !!}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection