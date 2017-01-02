<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panier</title>
<script>
function clear_cart() {
	var result = confirm('Voulez-vous vraiment effacer toutes les réservations?');

	if(result) {
		window.location = "<?php echo base_url(); ?>cart/remove/all";
	}else{
		return false; 
	}
}
</script>
</head>
<body>
<div style="margin:0px auto; width:600px;" >
	<div style="padding-bottom:10px">
		<h1 align="center" class="grand">Votre Panier</h1>
		<input type="button" value="Continuer vos achats" onclick="window.location='main/acceuil'" />
	</div>
	<div style="color:#F00"><?php echo $message?></div>
	<table border="2"  cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; border-color: black; background-color:#E1E1E1" width="100%">
		<?php if ($cart = $this->cart->contents()): ?>
		<tr bgcolor="#FFFFFF"  style="font-weight:bold">
			<td>Série</td>
			<td>Nom</td>
			<td>Prix</td>
			<td>Quantité</td>
			<td>Montant</td>
			<td>Options</td>
		</tr>
		<?php
		echo form_open('cart/update_cart');
		$grand_total = 0; $i = 1;
		
		foreach ($cart as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
		?>
		<tr bgcolor="#FFFFFF">
			<td>
				<?php echo $i++; ?>
			</td>
			<td>
				<?php echo $item['name']; ?>
			</td>
			<td>
				 <?php echo number_format($item['price'],2); ?> DT
			</td>
			<td>
				<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
			</td>
			<?php $grand_total = $grand_total + $item['subtotal']; ?>
			<td>
				 <?php echo number_format($item['subtotal'],2) ?> DT
			</td>
			<td>
				<?php echo anchor('cart/remove/'.$item['rowid'],'Annuler'); ?>
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td><b>Total: <?php echo number_format($grand_total,2); ?> DT</b></td>
			<td colspan="5" align="right"><input type="button" value="Vider le panier" onclick="clear_cart()">
					<input type="submit" value="Mettre à jour le panier">
					<?php echo form_close(); ?>
					<input type="button" value="Passer la commande" onclick="window.location='billing'"></td>
		</tr>
		<?php endif; ?>
	</table>
</div>
</body>
</html>