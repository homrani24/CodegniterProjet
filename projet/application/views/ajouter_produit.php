<?php $id_boutique=($this->session->userdata['logged_in']['id_boutique']);
 $id_client=($this->session->userdata['logged_in']['user_id']);
?>
<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Ajouter produit</div>
            </div>
            <div class="panel-body">

                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";
                //echo form_open('produit/new_produit_registration');
                 echo form_open_multipart('produit/new_produit_registration');

                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                } ?>
                <div class="row">

                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label">Nom produit</label>
                    <div class="col-md-9">
                        <input type="hidden" class="form-control" name="idboutique" value="<?php echo $id_boutique;; ?>" placeholder="nom">
                        <input type="text" class="form-control" name="nom" placeholder="nom">
                    </div>
                </div>
                </div>
                <div class="row">

                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label">Prix produit</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="prix" placeholder="nom">
                    </div>
                </div>
                </div>


                <div class="row">

                    <div class="form-group">
                        <label for="nom" class="col-md-3 control-label">Photo produit</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="picture" placeholder="nom">
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label">categories</label>
                    <div class="col-md-9">
                        <select class="selectpicker" name="categorie">

                            <?php

                            foreach ($categorie as $item) {?>
                                <option value="<?php echo($item['ID_CAT']); ?>">
                                    <?php echo($item['NOM_CAT']); ?></option>

                            <?php ;}
                            ?>
                        </select>

                    </div>
                </div>
                </div>
                <div class="row">

                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label">Description de produit</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                    </div>
                </div>
                </div>
                <?php
                echo "<br/>";
                echo "<br/>";
                echo form_submit('submit', 'ajouter produit');
                echo form_close();
                ?>
            </div>