@extends('admin.layout')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $actor->name }}
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
                      <img class="profile-user-img img-responsive img-circle" src="../../img/user1-128x128.jpg" alt="User profile picture">

                      <h3 class="profile-username text-center">{{ $actor->name }}</h3>

                      <p class="text-muted text-center">Software Engineer</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item clearfix">
                          <b>Карьера</b> 
                          <a class="pull-right">
                            @foreach($actor->carers as $carer)
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
                          </a>
                        </li>
                        <li class="list-group-item">
                          <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
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

                      <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

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
                      <li class="active"><a href="#activity" data-toggle="tab">Фильмы</a></li>
                      <li><a href="#timeline" data-toggle="tab">Сериалы</a></li>
                      <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class=" box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                              <th style="width: 50px;padding-left: 15px;">ID</th>
                              <th>Название</th>
                              <th>Жанры</th>

                              <th></th>
                            </tr>
                            
                            @foreach($actor->films as $film)
                              <tr>
                                <td style="padding-left: 15px;">{{ $film->id }}</td>
                                <td><a href="{{ route('films.show', $film->slug)}}">{{ $film->title }}</a></td>
                                <td>
                                  @foreach($film->genres as $genre)
                                    <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                  @endforeach
                                </td>
                                

                                <td width="150px">
                                  <div class="form-inline">
                                    <a class="form-inline" href="{{ route('films.edit', $film->id) }}">ред.</a>

                                    {{ Form::open(['route' => ['films.destroy', $film->id], 'method' => 'delete', 'class' => 'form-group']) }}
                                    <button onclick="return confirm('Удалить?')" class="btn btn-link">удалить</button>
                                    {{ Form::close() }}
                                  </div>
                                </td>
                              </tr>
                            @endforeach

                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="timeline">
                         
                      </div>
                      <!-- /.tab-pane -->

                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                          <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
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