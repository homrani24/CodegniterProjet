<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Motor</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,300italic,300&amp;subset=latin,cyrillic'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;subset=latin,cyrillic' rel='stylesheet'
          type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/flexslider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/media.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>


<!-- Header - start -->
<div class="header">

    <!-- Navmenu Mobile Toggle Button -->
    <a href="#" class="header-menutoggle" id="header-menutoggle">Menu</a>

    <div class="header-info">

        <!-- Personal Menu -->
        <div class="header-personal">
            <a href="<?php
            echo base_url('authentification/user_login_process'); ?>" class="header-gopersonal"></a>

        </div>



        <!-- Search Form -->
        <a href="#" class="header-searchbtn" id="header-searchbtn"></a>
        <form action="<?php echo base_url('produit/recherche'); ?>" method="post" class="header-search" id="header-search">
            <input type="text" name="identifiant" placeholder="Search parts or vehicles">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>

    <!-- Logotype -->


    <!-- Navmenu - start -->
    <nav id="top-menu header_officiel" style="        margin-left: -31px;">
        <ul>
            <li class="active">
                <a href="<?php
                echo base_url('main/acceuil'); ?>">Acceuil</a>
            </li>

            <li class="has-child">
                <a href="catalog.html">Produits</a>
                <i class="fa fa-angle-down"></i>
                <ul>

                    <?php

                    foreach ($categorie as $item) {?>
                        <li><a href="<?php echo base_url('Utilisateur/produits_show/'.$item['ID_CAT']); ?>"><?php echo($item['NOM_CAT']); ?></a></li>

                        <?php ;}
                    ?>
                </ul>
            </li>

            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
    </nav>
    <!-- Navmenu - end -->

</div>
<!-- Header - end -->
