<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" media="screen" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="{{ asset('/css/ie.css') }}" type="text/css" media="screen" />
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="{{ asset('/js/jquery.tablesorter.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <title>Административная панель CCOL</title>

</head>

<body>
<header id="header">
    <hgroup>
        <h1 class="site_title"><a href="/">CCOL.RU</a></h1>

        <h2 class="section_title">Административная панель CCOL.RU</h2>

    </hgroup>
</header> <!-- end of header bar -->

<aside id="sidebar" class="column">
    <h3>Действия</h3>
    <ul class="toggle">
        <li class="icn_categories"><a href="{{ route('admin') }}">Категории</a></li>
        <li class="icn_new_article"><a href="/admin/create">+ категория</a></li>
        <li class="icn_tags"><a href="/admin_products">Товары</a></li>
        <li class="icn_edit_article"><a href="/admin_products/create">+ товар</a></li>
        <li class="icn_jump_back">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               Выход ({{ Auth::user()->name }})
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}

            </form>
        </li>
    </ul>
    <footer>
        <hr />
        <p><strong>serdjiostrel@gmil.com - CCOL</strong></p>
    </footer>
</aside>
<section id="main" class="column">
    <article class="module width_full">
        @yield('content')
        <div class="spacer"></div>
</section>
</body>

</html>