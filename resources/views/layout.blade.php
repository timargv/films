<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		
	</head>
	<body>
		
		<div class="app-container">
			<header>
				<div class="header pt-3 mx-auto">
					<div class="header-fresh__inner-body">
						<div class="header-left float-left">
							<div class="logo">
								<a href="#">Фильмы Онлайн</a>
							</div>
						</div>
						<div class="header-center">
							<div class="input-group">
							  <input type="text" class="form-control" name="kp_query" placeholder="Фильмы, персоны, кинотеатры" autocomplete="off">
							  <div class="input-group-append" id="button-addon4">
							    <button class="btn " type="button"><i class="fa fa-search"></i></button>
							    <!-- <button class="btn " type="button">Button</button> -->
							  </div>
							</div>
						</div>
						<div class="header-right float-right">
							<a href="#"><i class="fa fa-bookmark"></i>  Буду смотреть</a>
							<a href="#" class="header-prof">
								<img src="http://films.loc/uploads/persons/original/iphone360_2.jpg" class="rounded">
							</a>
						</div>
					</div>
				</div>
				<div class="header pt-3 mx-auto">
					<div class="header-fresh__inner-body">
						<div class="header-menu mx-auto">
							<ul>
								<li><a href="">Афиша</a></li>
								<li><a href="">Фильмы</a></li>
								<li><a href="">Сериалы</a></li>
								<li><a href="">Мультифильмы</a></li>
							</ul>	
						</div>
					</div>
				</div>
			</header>

			@yield('content')

			<div class="container-content mx-auto">
				<div class="content">
					<div class="films-list-block mt-5 mb-3">
						<div class="films-list-block-header mb-3">
							<div class="row">
								<div class="col-6 films-list-block-header-title">Триллеры</div>
								<div class="col-6"></div>
							</div>
						</div>
						<div class="films-list-block-content">
							<div class="row clearfix">
								<div class="col-2">
									<div class="sh-film-list">
										<div class="sh-poster-film">
											<a href=""><img src="http://films.loc/uploads/persons/original/iphone360_5.jpg" alt="" class="w-100 rounded" /></a>
											<span class="sh-film-reating">7.8</span>
										</div>
										<div class="sh-film-title">
											<a href="#"><span>Мир Юрского периода</span></a>
										</div>
										<div class="sh-film-year-gen">
											<span>2018, фантастика</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<footer class="mt-5">
				<div class="container-content mx-auto">
					<div class="footer-genre-block">
						<ul class="clearfix pt-5 pb-3 m-0 p-0">
							<li><a href="">Аниме</a></li>
							<li><a href="">Биография</a></li>
							<li><a href="">Боевик</a></li>
							<li><a href="">Вестерн</a></li>

							<li><a href="">Военный</a></li>
							<li><a href="">Детектив</a></li>
							<li><a href="">Детский</a></li>
							<li><a href="">Драма</a></li>

							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>

							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
						</ul>
					</div>
					<div class="soc clearfix mb-3">
						<ul class="float-right m-0 p-0">
							<li class="float-right ml-3"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li class="float-right ml-3"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="float-right ml-3"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="float-right ml-3"><a href="#"><i class="fa fa-facebook"></i></a></li>							
							<li class="float-right ml-3"><a href="#"><i class="fa fa-vk"></i></a></li>

						</ul>

					</div>
					<hr>
					<div class="copy pb-3">
						<span>© 2003 – 2018, ФильмыОнлайн 18+</span>
					</div>
				</div>
			</footer>
		</div>






		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>