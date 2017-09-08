<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borsha</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >


<div id="page" class="hfeed site wrapper cleafix">


    <!-- BEGIN header -->
    <header id="header" class="theme-header">

        <div class="logo-container">
            <h1 class="logo"><?php bloginfo( 'name' ); ?></h1>
        </div>

		<?php

		wp_nav_menu( array(
			'menu' => 'top'
		) );
		?>

    </header>
    <!-- END header -->
