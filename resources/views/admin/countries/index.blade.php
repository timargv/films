@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Профессии
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
           

            <div class="box">
                
                

                <div class="box-header clearfix">

                    <div class="pull-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('carers.create') }}"><i class="fa fa-plus"></i> &nbsp; Добавить</a>
                    </div>

                    {{ Form::open(['route' => 'carers.store', 'class' => 'form-inline ']) }}

                        <div class="clearfix pull-right">
                            <div class="form-group">

                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="title" type="text" class="form-control" placeholder="Профессия" value="{{ old('title') }}"></div>
                            </div>
                            <div class="form-group">
                                    <button  class="btn btn-primary"><i class="fa fa-plus"></i></button>                                
                            </div>
                            @include('admin.errors')

                        </div>

                    {{ Form::close() }}
                </div>

                
                {{ Form::open(['route' => 'carers.dest', 'method' => 'post', 'class' => 'form-group']) }}
                <input type="hidden" name="_method" value="delete">
          

                <div class=" box-body table-responsive no-padding mailbox-messages">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th style="width: 50px;padding-left: 15px;">                                 
                                <button onclick="return confirm('Удалить?')" class="btn btn-link btn-md fa fa-trash checkbox-toggle"  style="padding: 3px"> </button>
                            </th>
                            <th style="width: 50px;padding-left: 15px;">ID</th>
                            <th>Название</th>

                            <th></th>
                        </tr>
                        @foreach($carers as $carer)
                            <tr>
                                <td style="padding-left: 15px;">
                                          <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" >
                                            <input type="checkbox" class="minimal" name="carers[]"  value="{{ $carer->id }}" >
                                            <ins class="iCheck-helper"></ins></div>
                                </td> 
                                <td style="padding-left: 15px;">{{ $carer->id }}</td>
                                <td><a href="{{ route('carers.show', $carer->slug)}}">{{ $carer->title }}</a></td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('carers.edit', $carer->id) }}">ред.</a>
                                        {{ Form::open(['route' => ['carers.destroy', $carer->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                    {{-- {{$carers->links()}} --}}
                </div>
                {{ Form::close() }}
            </div>     

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection