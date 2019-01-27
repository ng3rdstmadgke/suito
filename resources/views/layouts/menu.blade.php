<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/expences') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Su</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>出納帳</b></span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                ログアウト
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview">
        <a href="#"><i class="fa fa-dollar"></i> <span>出費</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/expences') }}">
            <i class="fa fa-list"></i> <span>一覧</span>
          </a></li>
          <li><a href="{{ url('/expences/create') }}">
            <i class="fa fa-plus"></i> <span>新規作成</span>
          </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-tags"></i> <span>カテゴリ</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/category') }}">
            <i class="fa fa-list"></i> <span>一覧</span>
          </a></li>
          <li><a href="{{ url('/category/create') }}">
            <i class="fa fa-plus"></i> <span>新規作成</span>
          </a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
