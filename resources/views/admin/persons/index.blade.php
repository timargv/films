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

                <div class="box-header">

                    <div class="">
                        <a class="btn btn-primary btn-sm" href="{{ route('persons.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
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
                            <th style="width: 150px;">Картинка</th>                            
                            <th>Имя</th>
                            <th>Профессии</th>

                            <th></th>
                        </tr>
                        @foreach($persons as $person)
                            <tr>
                                <td style="padding-left: 15px;">{{ $person->id }}</td>
                                <td>{{ $person->image }}</td>
                                <td><a href="{{ route('persons.show', $person->slug)}}">{{ $person->name }}</a></td>
                                <td>
                                    @foreach($person->carers as $carer)
                                        @if($carer->title == 'Актер')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Режиссер')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-red">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Сценарист')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-light-blue">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Продюсер')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Оператор')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Композитор')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                        @elseif($carer->title == 'Художник')
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-yellow">{{ $carer->title }}</span></a>
                                        @else
                                            <a href="{{ route('carers.show', $carer->slug) }}"><span class="badge bg-green">{{ $carer->title }}</span></a>
                                        @endif
                                    @endforeach
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