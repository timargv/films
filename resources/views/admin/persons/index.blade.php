@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Персоны
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header clearfix">

                    <div class="pull-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('persons.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
                        <a class="btn btn-default btn-sm" href="{{ route('persons.export') }}"><i class="fa fa-download"></i>  Export</a>
                    </div>

                    <div class="pull-right">
 
{{--                         <div class="form-group form-inline">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Поиск Персоны" style="width: 450px">
                        </div>
 --}}
                        <form class="input-group input-group-md" action="{{route('persons.index')}}" method="GET">

                            <input type="text" name="q" class="form-control pull-right" value="{{ request('q') }}" placeholder="Поиск Компании">

                            {{-- <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                @if(!empty(request('q')))
                                    <a href="{{route('persons.index')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                @endif
                            </div> --}}
                        </form>
                    </div>

                </div>
                <div class=" box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th style="width: 50px;padding-left: 15px;">ID</th>
                            <th style="width: 100px;">Картинка</th>
                            <th>Имя</th>
                            <th></th>

                            <th></th>
                        </tr>
                        @foreach($persons as $person)
                            <tr>
                                <td style="padding-left: 15px;"><a target="_blank" href="https://www.kinopoisk.ru/name/{{ $person->id }}/">{{ $person->id }}</a></td>
                                <td><img class="" src="{{ $person->getImage('original', '') }}" style="height: 80px;"></td>
                                <td><a href="{{ route('persons.show', $person->slug)}}">{{ $person->name }}</a>
                                    <div class="clearfix " style="max-width: 250px; font-size: 13px; margin-top: 5px;">
                                        @foreach($person->carers as $carer)
                                            <a  class="pull-left text-muted" style="margin-right: 10px;" href="{{ route('carers.show', $carer->slug) }}">{{ $carer->title }}</a>
                                        @endforeach
                                    </div>

                                </td>
                                <td>

                                </td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('persons.edit', $person->id) }}">ред.</a>

                                        {{ Form::open(['route' => ['persons.destroy', $person->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                    {{$persons->links()}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection