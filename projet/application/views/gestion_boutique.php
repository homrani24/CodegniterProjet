<?php
//print_r($produit[1]['PRIX']);
//echo($categorie[$identifiant]['NOM_CAT']);
?>
<div class="populars-wrap">
    <div class="cont populars">

        <p class="populars-count">7 ITEMS</p>
        <div class="populars-list">
            <?php
            if (is_array($produit) || is_object($produit))
            {

                foreach ($produit as $item) {
                    extract($item);

                    ?>
                    <div class="popular">
                        <a href="#" class="popular-link">
                            <p class="popular-img">
                                <img src="<?php
                                echo base_url();
                                echo "uploads/images/" . $PICTURE_PD; ?>" alt="">
                            </p>
                            <h3><span><?php echo $NOM_PROD; ?></span></h3>
                        </a>
                        <p class="popular-info">
                            <a href="#" class="popular-categ"></a>
                            <span class="popular-price">$<?php echo $PRIX; ?></span>
                            <a href="#" class="popular-add">
                                <a href="<?php echo base_url('produit/supp_produit/'.$ID_PROD); ?>">supprimer produit</a>
                            </a>
                        </p>
                    </div>
                <?php

                }
            } ?>
        </div>

        <div class="row">
            <a href="<?php
            echo base_url('produit'); ?>" class="btn btn-primary">Ajouter produit</a>

        </div>
        <p class="popular-more">
            <a href="#">show more</a>
        </p>
        <span class="popular-line1"></span>
        <span class="popular-line2"></span>
    </div>
</div>
