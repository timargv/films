@extends('layout')


@section('content')

	<div class="container-content mx-auto">
        <div class="content">
            <div class="films-list-block mt-5 mb-3">
                <div class="films-list-block-header mb-3">
                    <div class="row">
                        <div class="col-6 films-list-block-header-title">{{ $title }}</div>
                        <div class="col-6"></div>
                    </div>
                </div>
                <div class="films-list-block-content">
                    <div class="row clearfix">
                        @foreach($persons as $person)
                    	<div class="col-2 mb-4">
                            <div class="sh-film-list">
                                <div class="sh-poster-film">
                                    <a href=""><img src="{{ $person->getImage('original', '') }}" alt="{{ $person->name }}" class="w-100 rounded" /></a>
                                    @foreach($person->carers as $key => $carer)
                                		@if ( $key == 0 )
                                			<span class="sh-film-reating" style="background: {{ $carer->color }} !important">{{ $carer->title }}</span>
                                		@endif
                                	@endforeach
                                </div>
                                <div class="sh-film-title">
                                    <a href="#"><span>{{ $person->name }}</span></a>
                                </div>
                                <div class="sh-film-year-gen">
                                    <span>
                                    	@if($person->date)
                                    	{{ $person->date }}
                                    	@endif                                     	
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="films-list-block-footer">
                	{{ $persons->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection