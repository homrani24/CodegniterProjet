<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('gestion_produit');

        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();

        $this->load->view('header', $data);
        $this->load->view('ajouter_produit', $data);
        $this->load->view('footer', $data);
    }

    public function produits_show($id)
    {

        $this->load->model("Gestion_produit");
        $data['categorie'] = $this->Gestion_produit->read_categorie_produit();
        $data['produit'] = $this->Gestion_produit->show_produits($id);
        $data['identifiant']=$id;
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer');

    }

// Valider et stocker les données d'enregistrement dans la base de données
    public function new_produit_registration()
    {

// Vérifier la validation les données entrées par l'utilisateur
        $this->form_validation->set_rules('nom', 'Nom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prix', 'Prenom d\'utilisateur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Email', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('picture')) {
                    echo $this->upload->display_errors();
                } else {
                    $file_data = $this->upload->data();

                    $data = array(
                        'ID_BOUTIQUE' => $this->input->post('idboutique'),
                        'ID_CAT' => $this->input->post('categorie'),
                        'NOM_PROD' => $this->input->post('nom'),
                        'PRIX' => $this->input->post('prix'),
                        'DESCRIPTION_PD' => $this->input->post('description'),
                        'PICTURE_PD' => $file_data['file_name']
                    );
                    $result = $this->gestion_produit->creerproduit($data);

                    if ($result == TRUE) {
                        $data['message_display'] = 'Inscription réussie !';
                        $this->load->view('login', $data);
                    } else {
                        $data['message_display'] = 'Nom d\'utilisateur existe déjà!';
                        $this->load->view('register', $data);
                    }
                }
            }
        }
    }

// Valider et stocker les données d'enregistrement dans la base de données
    public function supp_produit($id)
    {
            $result = $this->gestion_produit->delete_produit($id);
            redirect('main/acceuil');

    }
    public function recherche()
    {
        $this->load->model("Gestion_produit");

        $id=$this->input->post('identifiant');

        $data['produit'] = $this->Gestion_produit->recherche_produits($id);

        $this->load->view('header');
        $this->load->view('recherche',$data);
        $this->load->view('footer');

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */