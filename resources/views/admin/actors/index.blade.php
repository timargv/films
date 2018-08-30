@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Актеры
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                    <div class="">
                        <a class="btn btn-primary btn-sm" href="{{ route('actors.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
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
                            <th>Картинка</th>

                            <th></th>
                        </tr>
                        @foreach($actors as $actor)
                            <tr>
                                <td style="padding-left: 15px;">{{ $actor->id }}</td>
                                <td><a href="{{ route('actors.show', $actor->slug)}}">{{ $actor->name }}</a></td>
                                <td>{{ $actor->image }}</td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('actors.edit', $actor->id) }}">ред.</a>

                                        {{ Form::open(['route' => ['actors.destroy', $actor->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                    {{$actors->links()}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection