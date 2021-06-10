<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model
{
	public function inserir_usuario($login, $senha, $nome, $sobrenome, $email, $sexo)
	{
		// Verificação dos campos obrigatórios.
		if (empty($login) || empty($senha) || empty($nome) || empty($sobrenome) || empty($email))
		{
			return false;
		}

		// Configura as colunas para a inserção.
		$this->db->set("us_login", $login);
		$this->db->set("us_senha", $senha);
		$this->db->set("us_nome", $nome);
		$this->db->set("us_sobrenome", $sobrenome);
		$this->db->set("us_email", $email);
		$this->db->set("us_sexo", $sexo);

		// Retorna o valor inserido na tabela.
		return $this->db->insert("usuario");
	}
}	