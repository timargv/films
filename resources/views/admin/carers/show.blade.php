@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $carer->title }}
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">
 
                </div>
                <div class=" box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th style="width: 50px;padding-left: 15px;">ID</th>
                            <th style="width: 150px;">Картинка</th>                            
                            <th>Имя</th>
                            <th></th>

                            <th></th>
                        </tr>
                        @foreach($persons as $person)
                            <tr>
                                <td style="padding-left: 15px;">{{ $person->id }}</td>
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