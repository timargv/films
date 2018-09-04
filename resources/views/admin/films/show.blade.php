@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $film->title }}
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
                            <div class="thumbnail" style="border: 0; padding: 0; overflow: hidden">
                                <img class="img-responsive " src="../../img/iphone.jpg" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $film->title }}</h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item clearfix">
                                    <b>Жанры</b>
                                    @foreach($genres as $genre)
                                        <a class="pull-right" href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                    @endforeach

                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Following</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item clearfix">
                                    <b>Friends</b> <a class="pull-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#timeline1" data-toggle="tab">Актеры</a></li>
                            <li class=""><a href="#timeline2" data-toggle="tab">Режиссеры</a></li>
                            <li class=""><a href="#timeline3" data-toggle="tab">Сценарист</a></li>
                            <li class=""><a href="#timeline4" data-toggle="tab">Оператор</a></li>
                            <li class=""><a href="#timeline5" data-toggle="tab">Композитор</a></li>
                            <li class=""><a href="#timeline6" data-toggle="tab">Художник</a></li>
                            <li class=""><a href="#timeline7" data-toggle="tab">Монтаж</a></li>

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline1">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)
                                        <div class="box-body box-profile pull-left">
                                            <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $actor->name, $actor->id }}</h3>
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
                                            <a href="{{ route('actors.show', $director->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
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
                                            <a href="{{ route('actors.show', $writer->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
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
                                            <a href="{{ route('actors.show', $operator->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
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
                                            <a href="{{ route('actors.show', $musician->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
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
                                            <a href="{{ route('actors.show', $artist->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
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
                                            <a href="{{ route('actors.show', $mounting->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>
                                            <h3 class="profile-username text-center">{{ $mounting->name, $mounting->id }}</h3>
                                        </div>
                                    @endforeach
                                </div>
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