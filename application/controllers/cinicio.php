<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInicio extends CI_Controller
{
	public function index()
	{
		$this->load->view('estrutura/topo');
		$this->load->view('inicio/tela_login');
		$this->load->view('estrutura/base');
	}

	public function cadastro()
	{
		$this->load->view('estrutura/topo');
		$this->load->view('inicio/tela_cadastro');
		$this->load->view('estrutura/base');
	}

	public function inserir($dados = array())
	{
		$this->load->view('estrutura/topo');
		$this->load->view('inserir_dados/dados', $dados);
		$this->load->view('estrutura/base');
	}

	public function configurarFiltros($dados = array())
	{
		$this->load->view('estrutura/topo');
		$this->load->view('retirada_relatorio/filtros', $dados);
		$this->load->view('estrutura/base');
	}

	public function inserirDados()
	{
		// Iniciando Model;
		$this->load->model("inicio");

		// Recebe os dados do método POST;
		$nome_usuario = $this->input->post("nome_usuario");
		$pontos_usuario = $this->input->post("pontos_usuario");
		$email_usuario = $this->input->post("email_usuario");

		// Verifica a integridade dos dados enviados pelo formulário;
		if (empty($nome_usuario) || empty($pontos_usuario) || empty($email_usuario))
		{
			$dados["status"] = "Erro!";
			$dados["msg"] = "Nenhum dos dados podem ser vázios!";
			$this->inserir($dados);
			return;
		}

		// Faz o processo de inserir os dados no banco;
		$retorno = $this->inicio->inserir($nome_usuario, $pontos_usuario, $email_usuario);

		// Verifica o retorno do banco e trata de acordo com o mesmo;
		if (!empty($retorno) && $retorno != false)
		{
			$dados["status"] = "Sucesso!";
			$dados["msg"] = "Usuário inserido com sucesso na base de dados!";
			$this->inserir($dados);
			return;
		}
		else
		{
			$dados["status"] = "Erro!";
			$dados["msg"] = "Ocorreu um problema durante a inserção de dados na base, por favor tente novamente!";
			$this->inserir($dados);
			return;
		}
	}

	public function buscaDados()
	{
		// Iniciando Model;
		$this->load->model("inicio");

		// Recebe os dados por POST;
		$filtro_nome = "";
		$filtro_data_criacao = "";
		$filtro_quantidade_pontos = "";
		$filtro_email = "";

		// Verificação de valor enviado;
		if (!empty($this->input->post("filtro_nome")))
		{
			$filtro_nome = $this->input->post("filtro_nome");
		}

		if (!empty($this->input->post("filtro_data_criacao")))
		{
			$filtro_data_criacao = $this->input->post("filtro_data_criacao");
		}

		if (!empty($this->input->post("filtro_quantidade_pontos")))
		{
			$filtro_quantidade_pontos = $this->input->post("filtro_quantidade_pontos");
		}

		if (!empty($this->input->post("filtro_email")))
		{
			$filtro_email = $this->input->post("filtro_email");
		}

		$retorno = $this->inicio->selecionar("*", $filtro_nome, $filtro_data_criacao, $filtro_quantidade_pontos, $filtro_email);

		if (!empty($retorno["obj"]))
		{
			$this->gerarRelatorio($retorno);
			return;
		}
		else
		{
			$dados["status"] = "Erro!";
			$dados["msg"] = "Nenhum dado encontrado!";
			$this->configurarFiltros($dados);
			return;
		}
	}

	public function gerarRelatorio($dados = array())
	{
		require_once('vendor/autoload.php');

		// Carregando helper e library.
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

        // Gera número random.
        $random_number = rand(1,1000);

        // Caminho e nome do arquivo.
        $nomeArquivo = "relatorio" . $random_number . '.pdf';
        $path = 'application/relatorios/';

        // Verifica existencia do arquivo e entrega permissão.
        if (!file_exists($path))
        {
            mkdir($path);
            exec("chmod -R 0777" . $path);
        }
        else
            exec("chmod -R 0777" . $path);

        ob_clean();
        $mpdf->allow_charset_conversion = true;
        $mpdf->charset_in = 'UTF-8';
        $mpdf->SetHTMLFooter('
            <table width="100%">
                <tr>
                    <td width="50%"> {DATE d/m/Y} </td>
                    <td width="50%" align="center"> {PAGENO}/{nbpg} </td>
                </tr>
            </table>
        ');

        $html = $this->load->view("estrutura_relatorio/padrao_relatorio", $dados, true);

        $mpdf->WriteHTML($html);
        $mpdf->Output($path . $nomeArquivo, 'F');
        unset($mpdf);

        if (file_exists($path . $nomeArquivo))
        {
            die("Deu certo");
        }
        else
        {
            die("Deu merda");
        }
	}

}
