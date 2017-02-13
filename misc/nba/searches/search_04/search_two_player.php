<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!--
••••••••••••••••••••••••

Powered by Type & Grids™
www.typeandgrids.com

••••••••••••••••••••••••
-->

    <title>Single Player</title>
    <meta name="description" content="Single player search page">
    <meta name="author" content="foo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================================================================= -->
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/themes/type_05.css">
    <link rel="stylesheet" href="../../css/themes/color_06.css">

    <!-- Favicons
============================================================================================= -->
    <link rel="shortcut icon" href="../../images/favicons/basketball.ico">
    <link rel="apple-touch-icon" href="../../images/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/favicons/apple-touch-icon-114x114.png">

    <!-- JS
================================================================================================= -->
    <script src="../../js/libs/modernizr.min.js"></script>
    <script src="../../js/libs/jquery-1.8.3.min.js"></script>
    <script src="../../js/libs/jquery.easing.1.3.min.js"></script>
    <script src="../../js/libs/jquery.fitvids.js"></script>
    <script src="../../js/script.js"></script>

</head>

<body>

    <!-- Write preloader to page - this allows the site to load for users with JS disabled -->
    <script type="text/javascript">
        document.write("<div id='sitePreloader'><div id='preloaderImage'><img src='../../images/site_preloader.gif' alt='Preloader' /></div></div>");
    </script>

    <div class="container">

        <!-- Header begins ========================================================================== -->
        <header class="sixteen columns">
            <div id="logoDetailView">
                <h1>Single Player Average Stats Search</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../../index.html">&laquo; Back</a>
                    </li>
                </ul>
            </nav>
            <hr />
        </header>
        <!-- Header ends ============================================================================ -->

        <div id="detailView" class="sixteen columns">
            
		<?php include('Radarchart.php') ?>

            <hr />

            <div id="detailViewBack">
                <a href="../../index.html">&laquo; Back</a>
            </div>

        </div>

        <!-- Footer begins ========================================================================== -->
       <footer class="sixteen columns">
		<hr />
		<ul id="footerLinks">
			<li>&copy; 2015 Foo. All rights reserved.</li>
            <li>Contact: lyuhao@utexas.edu&nbsp;&nbsp;ruoying0225@gmail.com&nbsp;&nbsp;sssy1991@gmail.com&nbsp;&nbsp;liwuxi.sjtu@gmail.com</li>
		</ul>
	</footer>
        <!-- Footer ends ============================================================================ -->

    </div>
    <!-- container -->
</body>

</html>
