<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Motor</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">


    <!--[if lt IE 9]>
    <![endif]-->
    <style>.panel-info > .panel-heading {
            color: #ffffff;
            background-color: #000000;
            border-color: #000000;
        }</style>
</head>
<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo base_url() ?>Main/index"
                                                                                           onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign
                        In</a></div>
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
                echo form_open('authentification/new_user_registration');

                echo "<div class='error_msg'>";
                if (isset($message_display)) {
                    echo $message_display;
                }?>

                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label">Nom</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="nom" placeholder="nom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="prenom" class="col-md-3 control-label">Prenom</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse" class="col-md-3 control-label">Adresse</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="email_value" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Mot de passe</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                </div>
                <?php
                echo"<br/>";
                echo"<br/>";
                echo form_submit('submit', 'S\'inscrire');
                echo form_close();
                ?>
            </div>