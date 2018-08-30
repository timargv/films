<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
        </a>
    </li>

    <li class="{{{ (Request::is('admin/films', 'admin/genres', 'admin/actors') ? 'treeview active' : 'treeview') }}}">
      <a href="#">
        <i class="fa fa-film"></i>
        <span>Фильмы / Сериалы</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{{ (Request::is('admin/films') ? 'treeview active' : 'treeview') }}}"><a href="{{ route('films.index') }}"><i class="fa fa-play"></i> <span>Фильмы</span></a></li>
        <li><a href="#"><i class="fa fa-play"></i> <span>Сериалы</span></a></li>
        <li class="{{{ (Request::is('admin/genres') ? 'treeview active' : 'treeview') }}}"><a href="{{ route('genres.index') }}"><i class="fa fa-align-justify"></i> <span>Жанры</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Возраст ограничение</span></a></li>
        <li class="{{{ (Request::is('admin/actors') ? 'treeview active' : 'treeview') }}}"><a href="{{ route('actors.index') }}"><i class="fa fa-user"></i> <span>Актеры</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Страны</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Режиссеры</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Сценаристы</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Продюсеры</span></a></li>
        <li><a href="#"><i class="fa fa-video-camera"></i> <span>Операторы</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Композиторы</span></a></li>
        <li><a href="#"><i class="fa fa-paint-brush"></i> <span>Художники</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i> <span>Монтаж</span></a></li>
        <li><a href="#"><i class="fa fa-comment-o"></i> <span>Рецензии</span></a></li>
        <li><a href="#"><i class="fa fa-comments"></i> <span>Комменты</span></a></li>
        <li><a href="#"><i class="fa fa-comment"></i> <span>Отзывы</span></a></li>
      </ul>
    </li>

</ul>
