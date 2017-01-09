<?php
//print_r($user);
function objectToArray($d) {
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    }
    else {
        // Return array
        return $d;
    }
}

$user=objectToArray($user);
?>
<div class=" col-md-offset-2 col-md-8">
    <h2 class="text-center">Modifier votre compte</h2>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('authentification/edit_user_info/'.$user[0]['ID_CLIENT']);

echo "<div class='error_msg'>";
if (isset($message_display)) {
    echo $message_display;
}?>

<div class="form-group">
    <label for="nom" class="col-md-3 control-label">Nom</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="nom" value="<?php echo $user[0]['NOM_CLIENT'];?>" placeholder="nom">
    </div>
</div>
<div class="form-group">
    <label for="prenom" class="col-md-3 control-label">Prenom</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="prenom" value="<?php echo $user[0]['PRENOM_CLIENT'];?>" placeholder="Prenom">
    </div>
</div>
<div class="form-group">
    <label for="adresse" class="col-md-3 control-label">Adresse</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="adresse" value="<?php echo $user[0]['ADRESSE_CLIENT'];?>" placeholder="Adresse">
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-md-3 control-label">Email</label>
    <div class="col-md-9">
        <input type="email" class="form-control" name="email_value" value="<?php echo $user[0]['MAIL'];?>" placeholder="Email">
    </div>
</div>

<div class="form-group">
    <label for="password" class="col-md-3 control-label">Mot de passe</label>
    <div class="col-md-9">
        <input type="password" class="form-control" name="password" value="<?php echo $user[0]['MDP'];?>"   placeholder="password">
    </div>
</div>
<?php
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'modifier');
echo form_close();
?>
</div>
