@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Жанры
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                    <div class="">
                        <a class="btn btn-primary btn-sm" href="{{ route('thematics.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
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

                            <th></th>
                        </tr>
                        @foreach($thematics as $thematic)
                            <tr>
                                <td style="padding-left: 15px;">{{ $thematic->id }}</td>
                                <td><a href="{{ route('thematics.show', $thematic->slug)}}">
                                        <span>{{ $thematic->title }}</span>
                                        <span class="pull-right-container">
                                          <small class="label bg-green">{{ count($thematic->films) }}</small>
                                        </span>
                                    </a>


                                </td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('thematics.edit', $thematic->id) }}">ред.</a>

                                        {{ Form::open(['route' => ['thematics.destroy', $thematic->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                    {{ $thematics->links() }}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection