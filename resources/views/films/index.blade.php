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
                        @foreach($films as $film)
                    	<div class="col-2 mb-3">
                            <div class="sh-film-list">
                                <div class="sh-poster-film">
                                    <a href=""><img src="http://films.loc/uploads/persons/original/iphone360_5.jpg" alt="" class="w-100 rounded" /></a>
                                    <span class="sh-film-reating">7.8</span>
                                </div>
                                <div class="sh-film-title">
                                    <a href="#"><span>{{ $film->title }}</span></a>
                                </div>
                                <div class="sh-film-year-gen">
                                    <span>{{ $film->years }}, фантастика</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection