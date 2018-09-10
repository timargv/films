@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>

                #{{ $film->id }} {{ $film->title }}
                <small>{{ $film->slogan }}..</small>
            </h1>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                                <img class="img-responsive " src="{{ $film->getImage('original', '') }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $film->title }}</h3>

                            <p class="text-muted text-center">{{ $film->original_title }}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item clearfix">
                                    <b>Жанры</b>
                                    @foreach($genres as $genre)
                                        <a class="pull-right" href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                    @endforeach

                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Год</b>

                                    @foreach($years as $year)
                                            <a class="pull-right" href="{{ route('years.show', $year->slug) }}"><span class="badge bg-yellow">{{ $year->year }}</span></a>
                                        @endforeach
                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Страна</b>
                                        @foreach($countries as $country)
                                            <a class="pull-right" href="{{ route('countries.show', $country->slug) }}"><span class="badge bg-yellow">{{ $country->country }}</span></a>
                                        @endforeach
                                </li>

                                <li class="list-group-item clearfix">
                                    <b>Бюджет</b> <a class="pull-right">
                                       {{ $film->budget }} RUB.
                                    </a>
                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Мировая Премьера</b> <a class="pull-right">
                                            {{ $film->getDate() }}
                                    </a>
                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Возрастное ограничение</b> <a class="pull-right">
                                        {{ $film->age }}
                                    </a>
                                </li>

                                <li class="list-group-item clearfix">
                                    <b>Рейтинг</b> <a class="pull-right">
                                        {{ $film->rating }}
                                    </a>
                                </li>

                                <li class="list-group-item clearfix">
                                    <b>Время</b> <a class="pull-right">
                                        {{ $film->time }}
                                    </a>
                                </li>

                                <li class="list-group-item clearfix">
                                    <b>Тематика</b> <a class="pull-right">
                                        @foreach($thematics as $thematic)
                                            <a class="pull-right" href="{{ route('thematics.show', $thematic->slug) }}"><span class="badge bg-yellow">{{ $thematic->title }}</span></a>
                                        @endforeach
                                    </a>
                                </li>
                            </ul>

                            <a href="{{ route('films.edit', $film->id) }}" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Жанры</strong>

                            <p>
                                <span class="label label-danger">UI Design</span>
                                <span class="label label-success">Coding</span>
                                <span class="label label-info">Javascript</span>
                                <span class="label label-warning">PHP</span>
                                <span class="label label-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    Трейлер
                                </div>
                                <div class="box-body">
                                    @if($film->trailer_field)
                                        <iframe width="575" height="315" src="{{ $film->trailer_field }}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box box-primary">
                                <div class="box-header">Плеер Фильма</div>
                                <div class="box-body">
                                    {{ $film->video_field }}
                                    <div id="trailerDiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#timeline1" data-toggle="tab">Актеры</a></li>
                            <li class=""><a href="#timeline2" data-toggle="tab">Режиссеры</a></li>
                            <li class=""><a href="#timeline3" data-toggle="tab">Сценарист</a></li>
                            <li class=""><a href="#timeline4" data-toggle="tab">Оператор</a></li>
                            <li class=""><a href="#timeline5" data-toggle="tab">Композитор</a></li>
                            <li class=""><a href="#timeline6" data-toggle="tab">Художник</a></li>
                            <li class=""><a href="#timeline7" data-toggle="tab">Монтаж</a></li>
                            <li class=""><a href="#timeline8" data-toggle="tab">Связанные фильмы</a></li>
                            <li class="pull-right"><a class="text-muted"  href="{{ route('films.edit', $film->id) }}"><i class="fa fa-pencil-square-o"></i></a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline1">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($persons as $person)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $person->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $person->name, $person->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline2">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($directors as $director)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $director->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $director->name, $director->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline3">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($writers as $writer)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $writer->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $writer->name, $writer->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline4">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($operators as $operator)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $operator->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $operator->name, $operator->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline5">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($musicians as $musician)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $musician->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $musician->name, $musician->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline6">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($artists as $artist)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $artist->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $artist->name, $artist->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline7">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($mountings as $mounting)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('persons.show', $mounting->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $mounting->name, $mounting->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class=" tab-pane" id="timeline8">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($relateds as $related)
                                        <div class="box-body box-profile col-xs-6 col-md-2">
                                            <a class="thumbnail" style="border: 0; padding: 0; overflow: hidden" href="{{ route('films.show', $related->slug) }}"><img class="img-responsive " src="../../img/iphone.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-left">{{ $related->title }}</h3>
                                        </div>
                                    @endforeach
                                    <hr>

                                </div>
                            </div>
                            <!-- /.tab-pane -->


                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->

                    <div class="box box-primary">
                        <div class="box-header">Краткое описание</div>
                        <div class="box-body">
                            <p>{{ $film->sh_description }}</p>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header">Полное описание</div>
                        <div class="box-body">
                            <p>{{ $film->description }}</p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection