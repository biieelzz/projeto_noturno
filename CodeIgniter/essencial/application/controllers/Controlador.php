<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {

	public function index()
	{
        $this->load->view('layout/cabecalho');
        $this->load->view('conteudo');
        $this->load->view('layout/rodape');
	}
}