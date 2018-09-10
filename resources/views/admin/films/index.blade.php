@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Фильмы
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">





            <div class="box">

                <div class="box-header">

                    <div class="pull-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('films.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
                        <a class="btn btn-default btn-sm" href="{{ route('films.export') }}"><i class="fa fa-download"></i> &nbsp; Export</a>

                    </div>

                    <div class="pull-right">
                        <form class="form-inline" method="post" action="{{ route('films.import') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="file" id="exampleInputFile" class="input-group">
                            </div>
                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-upload"></i> Import</button>
                        </form>
                    </div>
                    <p></p>
                    <div class="clearfix"></div>
                </div>
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
                        @foreach($films as $film)
                            <tr>
                                <td style="padding-left: 15px;">{{ $film->id }}</td>
                                <td><a href="{{ route('films.show', $film->slug)}}">{{ $film->title }}</a></td>
                                <td>

                                    @foreach($film->genres as $genre)
                                        @if($genre->id == 1)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 2)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-blue">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 3)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 4)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-green">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 5)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 6)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-blue">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 7)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 8)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-green">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 9)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 10)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-blue">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 11)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 12)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-green">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 13)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 14)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-blue">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 15)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-yellow">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 16)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-green">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 17)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 18)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 19)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 20)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 21)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 22)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 23)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 24)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 25)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 26)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 27)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 28)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 29)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 30)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @elseif($genre->id == 31)
                                            <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
                                        @endif
                                    @endforeach
                                </td>


                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('films.edit', $film->id) }}">ред.</a>

                                        {{ Form::open(['route' => ['films.destroy', $film->id], 'method' => 'delete', 'class' => 'form-group']) }}
                                        <button onclick="return confirm('Удалить?')" class="btn btn-link btn-xs">удалить</button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{$films->links()}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection