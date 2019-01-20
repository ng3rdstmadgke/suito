<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('/expences') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>出納帳</b></span>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">ログイン<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('login') }}">ログイン</a></li>
            <li><a href="{{ route('register') }}">新規登録</a></li>
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
      <li class="header">メニュー</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <span>ログイン</span></a></li>
      <li><a href="{{ route('register') }}"><i class="fa fa-address-card"></i> <span>新規登録</span></a></li>
    </ul>
  </section>
</aside>
