<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Model
{

	// nome_usuario = nome que servira como identificador para o usuario.
	// pontos_usuario = pontuação individual de cada usuário.
	// email_usuario = email vinculado ao usuario.
	public function inserir($nome_usuario, $pontos_usuario, $email_usuario)
	{
		if (empty($nome_usuario) || empty($pontos_usuario) ||empty($email_usuario))
		{
			return false;
		}

		$this->db->set("us_usuario", $nome_usuario);
		$this->db->set("us_pontos_usuario", $pontos_usuario);
		$this->db->set("us_email", $email_usuario);

		return $this->db->insert("usuarios");
	}

	// campos = campos de retorno da tabela (us_usuario, us_pontos_usuario).
	// filtro_nome = nome que deseja filtra na consulta.
	// fitlro_data_criacao = data que deseja filtra na consulta.
	// filtro_quantidade_pontos = quantidade de pontos que deseja filtrar na consulta.
	// filtro_email = email que deseja filtrar na consulta.
	public function selecionar($campos = "", $filtro_nome = "", $filtro_data_criacao = "", $filtro_quantidade_pontos = "", $filtro_email = "")
	{
		
		if($campos != "")
		{
			$this->db->select($campos)
			 	 ->from("usuarios");
		}
		else
		{
			$this->db->select("*")
			 	 ->from("usuarios");
		}

		if ($filtro_nome != "")
			$this->db->like("us_usuario",$filtro_nome);

		if ($filtro_data_criacao != "")
			$this->db->where("us_data_alta >=",$filtro_data_criacao);

		if ($filtro_quantidade_pontos != "")
			$this->db->where("us_pontos_usuario",$filtro_quantidade_pontos);

		if ($filtro_email != "")
			$this->db->where("us_email",$filtro_email);

		$retorno['obj'] = $this->db->get()->result();
        $retorno['total'] = $this->db->query('SELECT FOUND_ROWS() AS total')->row()->total;

        return $retorno;

	}
}