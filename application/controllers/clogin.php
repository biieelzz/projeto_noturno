<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller
{
	public function login()
	{
		// Variáveis encaminhadas.
		$login = $_POST["us_nome"];
		$password = $_POST["us_password"];

		// FIM
	}

	public function cadastro()
	{
		// Variáveis encaminhadas.
		$login = $_POST["us_login"];
		$senha = $_POST["us_password"];
		$senha_confirm = $_POST["us_password_confirm"];
		$nome = $_POST["us_nome"];
		$sobrenome = $_POST["us_sobrenome"];
		$email = $_POST["us_email"];
		$sexo = ($_POST["us_sexo"] == 0) ? null : $_POST["us_sexo"];

		// Confirmação de Senha.
		if($senha != $senha_confirm)
		{
			$dados["erro"] = 1;
			$dados["msg"] = "As senhas não correspondem.";

			$this->load->view('estrutura/topo');
			$this->load->view('inicio/tela_cadastro', $dados);
			$this->load->view('estrutura/base');
		}

		// Iniciando Model de Usuário;
		$this->load->model("usuario");
		$retorno = $this->usuario->inserir_usuario($login, $senha, $nome, $sobrenome, $email, $sexo);

		// Tratativa do retorno do banco de dados.
		if($retorno != false)
		{
			$dados["sucesso"] = 1;
			$dados["msg"] = "Cadastrado com sucesso!";

			$this->load->view('estrutura/topo');
			$this->load->view('inicio/tela_login', $dados);
			$this->load->view('estrutura/base');
		}
	}
}