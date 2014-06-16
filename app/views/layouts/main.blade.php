<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
    <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8">
        <![endif]-->
        <!--[if IE 8]>
        <html class="no-js lt-ie9">
            <![endif]-->
            <!--[if gt IE 8]>
            <!-->
            <html class="no-js">
                <!--<![endif]-->
<head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <title>eCommerce</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

                <!-- Loading Bootstrap -->
                {{ HTML::style('bootstrap/css/bootstrap.css') }}
                <!-- Loading Flat UI -->
                {{ HTML::style('css/flat-ui.css') }}
                <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
                <!--[if lt IE 9]>
                <script src="js/html5shiv.js"></script>
                <script src="js/respond.min.js"></script>
                <![endif]-->{{ HTML::style('css/custom.css') }}</head>
<body>
                <!--[if lt IE 7]>
                <p class="chromeframe">
                    You are using an <strong>outdated</strong>
                    browser. Please
                    <a href="http://browsehappy.com/">upgrade your browser</a>
                    or
                    <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>
                    to improve your experience.
                </p>
                <![endif]-->

                <header>
                    <!-- Fixed navbar -->
                    <!-- Fixed navbar -->
                    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/">E-Com</a>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Category <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($catnav as $cat)
                                            <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{ Form::open(array('url'=>'store/search', 'method'=>'get', 'class'=>'navbar-form navbar-left ', 'role'=>'search')) }}
                                    <div class="form-group">
                                        {{ Form::text('keyword', null, array('placeholder'=>'Search', 'class'=>'form-control', 'data-provide'=>'typeahead')) }}
                                    </div>
                                    {{ HTML::decode(Form::button('
                                    <span class="glyphicon glyphicon-search"></span>
                                    ', array('type'=>'submit', 'class'=>'btn btn-primary'))) }}

                                    {{ Form::close() }}
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    @if(Auth::check())
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            {{ Auth::user()->firstname }} <b class="caret"></b>

                                        </a>
                                        <ul class="dropdown-menu">
                                            @if(Auth::user()->admin == 1)
                                            <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                                            <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                                            <li class="divider"></li>
                                            @endif
                                            <li>{{ HTML::link('users/signout', 'Logout') }}</li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Login
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>{{ HTML::link('users/signin', 'Login') }}</li>
                                            <li>{{ HTML::link('users/newaccount', 'Register') }}</li>
                                        </ul>

                                    </li>
                                    @endif
                                    <li>
                                        {{ HTML::decode(HTML::link('store/cart', '
                                        <span class="glyphicon glyphicon-shopping-cart"></span>
                                        Cart')) }}
                                            @if(Cart::totalItems()>0)
                                        <span class="navbar-new hidden-xs">{{ Cart::totalItems(); }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <!--/.nav-collapse --> </div>
                    </nav>

                </header>
                @yield('promo')



                    @if (Session::has('message'))
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif
                <div class="container">
                    @yield('search-keyword')
                @yield('content')
                    <!-- end main-content -->
                    @yield('pagination')
                    <div class="row ">
                        <div class="col-lg-12 text-center">
                            <hr>
                            <h3>
                                For phone orders please call 0800-1000. You
                                <br>
                                can also email us at
                                <a href="mailto:e-com@shop.com">e-com@shop.com</a>
                            </h3>
                            <hr></div>
                    </div>

                    <!-- end contact -->

                    <section id="links">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <h5>Account</h5>
                                            @if(Auth::check())
                                            <li>{{ HTML::link('users/signout', 'Logout') }}</li>
                                            <li>{{ HTML::link('store/cart', 'Shopping Cart') }}</li>
                                            @else
                                            <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                                            <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <h5>Information</h5>
                                            <li>{{ HTML::link('store/terms', 'Terms of Use') }}</li>
                                            <li>{{ HTML::link('store/privacy', 'Privacy Policy') }}</li>
                                            <li>{{ HTML::link('store/disclaimer', 'Disclaimer') }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <h5>Extras</h5>
                                            <li>{{ HTML::link('store/about', 'About Us') }}</li>
                                            <li>{{ HTML::link('store/contact', 'Contact Us') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-md-8">
                                    <a href="#">Facebook</a>
                                    <a href="#">Twitter</a>
                                    <a href="#">Google +</a>
                                </div>
                                <div class="col-md-4">
                                    <p class="muted pull-right">© 2014 E-Com. All rights reserved</p>
                                </div>
                            </div>
                        </div>

                        <!-- end extras --> </section>
                    <!-- end links --> </div>
                <!-- end wrapper -->

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                {{ HTML::script('js/plugins.js') }}
                {{ HTML::script('js/main.js') }}
                <!-- RWD -->
                {{ HTML::script('js/jquery-1.8.3.min.js') }}
                {{ HTML::script('js/jquery-ui-1.10.3.custom.min.js') }}
                {{ HTML::script('js/jquery.ui.touch-punch.min.js') }}
                {{ HTML::script('js/bootstrap.min.js') }}
                {{ HTML::script('js/bootstrap-select.js') }}
                {{ HTML::script('js/bootstrap-switch.js') }}
                {{ HTML::script('js/flatui-checkbox.js') }}
                {{ HTML::script('js/flatui-radio.js') }}
                {{ HTML::script('js/jquery.tagsinput.js') }}
                {{ HTML::script('js/jquery.placeholder.js') }}
                {{ HTML::script('js/typehead.js') }}
                <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
                <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48806274-1', 'frbit.net');
  ga('send', 'pageview');

</script>
</body>
            </html>