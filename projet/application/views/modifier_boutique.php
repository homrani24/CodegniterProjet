<?php $id=($this->session->userdata['logged_in']['user_id']);
//echo $id;
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
$boutiqu=objectToArray($boutique);
?>
<div class="container-fluid">

    <div class="col-md-offset-2 col-md-8">
        <h2 class="text-center">Modifier son boutique</h2>

        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('boutique/modifier_boutique/'.$boutiqu[0]['ID_BOUTIQUE']);

        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }?>

        <div class="form-group">
            <label for="nom" class="col-md-3 control-label"> Nom de boutiue</label >
            <div class="col-md-9">
                <input type="text" class="form-control" name="nom" value="<?php echo ($boutiqu[0]['NOM_BOUTIQUE']);?>" placeholder="nom">
            </div>
        </div>
        <div class="form-group">
            <label for="nom" class="col-md-3 control-label"> Description</label>
            <div class="col-md-9">

                <textarea class="form-control" rows="5" id="comment" name="description"><?php echo ($boutiqu[0]['DESCRIPTION_BOUT']);?></textarea>

                <?php
                echo "<br/>";
                echo "<br/>";
                echo form_submit('submit', 'modifer boutique');
                echo form_close();
                ?>
            </div>
        </div>

    </div>
</div>