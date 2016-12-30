<!doctype html>
<html lang="en">
<head>
    <?php
    if (isset($this->session->userdata['logged_in'])) {
        $nom = ($this->session->userdata['logged_in']['nom']);
        $email = ($this->session->userdata['logged_in']['email']);
        $id = ($this->session->userdata['logged_in']['user_id']);
        $id_boutique = ($this->session->userdata['logged_in']['id_boutique']);
     //  echo $nom;
    } else {
        header("location:" . base_url() . "authentification/user_login_process");
    }
    ?>
    <?php
    $grand_total = 0;
    $i=0;
    if ($cart = $this->cart->contents()):
        foreach ($cart as $item):
         $i++;
            $grand_total = $grand_total + $item['subtotal'];
        endforeach;
    endif;
    ?>
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
            <a href="#" class="header-gopersonal"></a>
            <ul>
                <li>
                    <a href="message.html">Messages <span>12</span></a>
                </li>
                <li>
                    <a href="#">Bookmarks <span>6</span></a>
                </li>
                <li>
                    <a href="cart.html">Shopping Cart <span>5</span></a>
                </li>
                <li class="header-order">
                    <a href="orders.html">Order Status</a>
                </li>
                <li>
                    <a href="#">Modifier profile</a>
                </li>
                <li>
                    <a href="<?php
                    echo base_url('authentification/logout'); ?>">Log out</a>
                </li>
            </ul>
        </div>

        <!-- Small Cart -->
        <a href="<?php
        echo base_url('cart'); ?>" class="header-cart">
            <div class="header-cart-inner">
                <p class="header-cart-count">
                    <img src="<?php echo base_url(); ?>/assets/img/cart.png" alt="">
                    <span><?php echo $i;?></span>
                </p>
                <p class="header-cart-summ">DT <?php echo $grand_total; ?></p>
            </div>
        </a>


        <!-- Search Form -->
        <a href="#" class="header-searchbtn" id="header-searchbtn"></a>
        <form action="<?php echo base_url('produit/recherche'); ?>" method="post" class="header-search" id="header-search">
            <input type="text" name="identifiant" placeholder="Search parts or vehicles">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>

    <!-- Logotype -->


    <!-- Navmenu - start -->
    <nav id="top-menu">
        <ul>
            <li class="active">
                <a href="<?php
                echo base_url('main/acceuil'); ?>">Home</a>
            </li>

            <li class="has-child">
                <a href="catalog.html">Produits</a>
                <i class="fa fa-angle-down"></i>
                <ul>

                    <?php

                    foreach ($categorie as $item) {?>
                        <li><a href="<?php echo base_url('Produit/produits_show/'.$item['ID_CAT']); ?>"><?php echo($item['NOM_CAT']); ?></a></li>

                        <?php ;}
                    ?>
                </ul>
            </li>
            <li><?php
            if($id_boutique=='vide'){?>


                <a href="<?php
                echo base_url('main/creer_boutique'); ?>">Creer Boutique</a><?php
            }else{
                ?>

                <a href="<?php
                echo base_url('boutique/gestion_boutique/'.$id_boutique); ?>">Gestion de boutiue</a>
                <?php }?>
            </li>

            <li>
                <a href="#">Contacts</a>
            </li>
        </ul>
    </nav>
    <!-- Navmenu - end -->

</div>
<!-- Header - end -->
