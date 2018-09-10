@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Года
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
           

            <div class="box">
                
                

                <div class="box-header clearfix">

                    <div class="pull-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('years.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
                        <a class="btn btn-default btn-sm" href="{{ route('years.export') }}"><i class="fa fa-download"></i> &nbsp; Export</a>
                    </div>

                    {{ Form::open(['route' => 'years.store', 'class' => 'form-inline ']) }}

                        <div class="clearfix pull-right">
                            <div class="form-group">

                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="year" type="text" class="form-control" placeholder="Профессия" value="{{ old('year') }}"></div>
                            </div>
                            <div class="form-group">
                                    <button  class="btn btn-primary"><i class="fa fa-plus"></i></button>                                
                            </div>
                            @include('admin.errors')

                        </div>

                    {{ Form::close() }}
                </div>

                


                <div class=" box-body table-responsive no-padding mailbox-messages">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>

                            <th style="width: 50px;padding-left: 15px;">ID</th>
                            <th>Год</th>

                            <th></th>
                        </tr>
                        @foreach($years as $year)
                            <tr>

                                <td style="padding-left: 15px;">{{ $year->id }}</td>
                                <td><a href="{{ route('years.show', $year->slug)}}">{{ $year->year }}</a></td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('years.edit', $year->id) }}">ред.</a>
                                        {{ Form::open(['route' => ['years.destroy', $year->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                     {{$years->links()}}
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection