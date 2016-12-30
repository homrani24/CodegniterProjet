<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informations de facturation</title>
</head>
<body>
<form name="billing" method="post" action="<?php echo base_url().'billing/save_order' ?>" >
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center" class="grand">Informations de facturation</h1>
        <table border="1" cellpadding="2px">
        	<tr><td>Total de la commande:</td><td><strong> <?php echo number_format($grand_total,2); ?> DT</strong></td></tr>
            <input type="hidden" name="id" value="<?php echo ($this->session->userdata['logged_in']['user_id']);?>" />
            <tr><td>Votre nom:</td><td><?php echo ($this->session->userdata['logged_in']['nom']); ?></td></tr>
            <tr><td>Votre Mail:</td><td><?php echo ($this->session->userdata['logged_in']['email']); ?></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Passer la commande" /></td></tr>
        </table>
	</div>
</form>
</body>
</html>