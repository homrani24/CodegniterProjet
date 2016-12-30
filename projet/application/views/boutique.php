<?php $id=($this->session->userdata['logged_in']['user_id']);
echo $id;?>
<div class="container-fluid">

    <div class="col-md-offset-2 col-md-8">
        <h2 class="text-center">Creer son boutique</h2>

        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('boutique/new_boutique');

        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }?>

        <div class="form-group">
            <label for="nom" class="col-md-3 control-label"> Nom de boutiue</label >
                <div class="col-md-9">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" placeholder="nom">
                    <input type="text" class="form-control" name="nom" placeholder="nom">
                </div>
        </div>
        <div class="form-group">
            <label for="nom" class="col-md-3 control-label"> Description</label>
            <div class="col-md-9">

                <textarea class="form-control" rows="5" id="comment" name="description"></textarea>

                <?php
                echo "<br/>";
                echo "<br/>";
                echo form_submit('submit', 'Creer');
                echo form_close();
                ?>
            </div>
        </div>

    </div>
</div>