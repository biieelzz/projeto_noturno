<?= form_open('cinicio/buscaDados', array('id' => 'formulario', 'name' => 'formulario', 'method' => 'post')) ?>
	
	<div class="container">
		<div class="box">

			<h1>Tela de configuração dos filtros:</h1>

			<hr>

			<label for="filtro_nome"> Nome Usuário: </label>
			<input type="text" name="filtro_nome" id="filtro_nome">

			<br>
			<br>

			<label for="filtro_data_criacao"> Data criação: </label>
			<input type="date" name="filtro_data_criacao" id="filtro_data_criacao">

			<br>
			<br>

			<label for="filtro_quantidade_pontos"> Quantidade de pontos: </label>
			<input type="number" name="filtro_quantidade_pontos" id="filtro_quantidade_pontos">

			<br>
			<br>

			<label for="filtro_email"> Nome Usuário: </label>
			<input type="text" name="filtro_email" id="filtro_email">

			<br>
			<br>

			<input type="submit" value="Enviar" style="width: 15%;">
			<a href="<?= site_url(); ?>">Voltar Início</a>

			<hr>

			<?php if(!empty($status) && !empty($msg)): ?>
				<p> <?php echo $status . " " . $msg; ?> </p>
			<?php endif; ?>

		</div>

	</div>
<?= form_close(); ?>