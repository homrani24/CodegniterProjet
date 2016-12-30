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
    <?php
    if (isset($this->session->userdata['logged_in'])) {

        header("location:" . base_url() . "authentification/user_login_process");
    }
    ?>

</head>
<body>
<?php
if (isset($logout_message)) {
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>
<div class="container">

    <div id="signupbox" style=" margin-top:50px"
         class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">connexion</div>
            </div>
            <div class="panel-body">

        <?php echo form_open('authentification/user_login_process'); ?>


        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>




                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="email" class="form-control" name="email" value="" placeholder="username or email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>


                <input type="submit" value=" Login " name="submit" class="btn btn-succes"/><br/>


                <a href="<?php echo base_url() ?>Main/register">Cliquez ici pour s'inscrire</a>


        <?php echo form_close(); ?>

    </div>
        </div>
    </div>

</div>
</body>
</html>