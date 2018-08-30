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

                    <div class="">
                        <a class="btn btn-primary btn-sm" href="{{ route('films.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
                    </div>

                    <p></p>
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
                                        <a href="{{ route('genres.show', $genre->slug) }}"><span class="badge bg-red">{{ $genre->title }}</span></a>
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
                <div class="box-footer clearfix">
                    {{$films->links()}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection