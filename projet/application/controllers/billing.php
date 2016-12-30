<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Billing_model');
	}

	public function index()
	{	
		$this->data['title'] = 'Facturation';
        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header', $data);
		$this->load->view('billing', $this->data);
		$this->load->view('footer', $this->data);
	}
	
	public function save_order()
	{
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'ID_CLIENT' => $this->input->post('id'),
					'ID_PROD' 	=> $item['id'],
					'QUANTITE' 	=> $item['qty'],
					'PRICE' 	=> $item['price']
				);		

				$cust_id = $this->Billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		
		echo "Merci! Votre commande a bien été reçue!<br />";
		echo "<a href=".base_url()."products>Retourner</a>";
	}
}