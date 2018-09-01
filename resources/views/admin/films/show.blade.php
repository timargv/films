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
                                    @foreach($film->genres as $genre)
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
                            @php($i=0)
                            @foreach($actors as $actor)
                                @foreach($actor->carers as $carer)
                                    @if ($carer->id == '1')
                                        <li><a href="#timeline1" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '2')
                                        <li><a href="#timeline2" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '3')
                                        <li><a href="#timeline3" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '4')
                                        <li><a href="#timeline4" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '5')
                                        <li><a href="#timeline5" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '6')
                                        <li><a href="#timeline6" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '7')
                                        <li><a href="#timeline7" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @elseif ($carer->id == '8')
                                        <li><a href="#timeline8" data-toggle="tab">{{ $carer->title }}</a></li>
                                    @endif
                                @endforeach
                            @endforeach

                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline1 activity">
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '1')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name, $actor->id }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline2">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '2')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline3">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '3')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline4">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '4')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline5">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '5')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline6">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == 6)
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline7">
                                <!-- The timeline -->
                                <p></p>
                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '7')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

                                    @endforeach

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="timeline8">
                                <!-- The timeline -->
                                <p></p>

                                <div class="clearfix">
                                    @foreach($actors as $actor)

                                        @foreach($actor->carers as $carer)
                                            @if ($carer->id == '8')
                                                <div class="box-body box-profile pull-left">
                                                    <a href="{{ route('actors.show', $actor->slug) }}"><img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture"></a>

                                                    <h3 class="profile-username text-center">{{ $actor->name }}</h3>
                                                    <p class="text-muted text-center">
                                                        {{ $carer->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach

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