<?= form_open('cinicio/inserirDados', array('id' => 'formulario', 'name' => 'formulario', 'method' => 'post')) ?>
	
	<div class="container">
		<div class="box">

			<h1>Tela de inserção de usuário:</h1>

			<hr>

			<label for="nome_usuario"> Nome: </label>
			<input type="text" name="nome_usuario" id="nome_usuario">

			<br>
			<br>

			<label for="pontos_usuario"> Pontos: </label>
			<input type="number" name="pontos_usuario" id="pontos_usuario">

			<br>
			<br>

			<label for="email_usuario"> Email: </label>
			<input type="text" name="email_usuario" id="email_usuario">

			<br>
			<br>

			<input type="submit" value="Enviar" style="width: 15%;">
			<a href="<?= site_url(); ?>">Voltar Início</a>

			<hr>

			<br>
			<br>

			<?php if(!empty($status) && !empty($msg)): ?>
				<p> <?php echo $status . " " . $msg; ?> </p>
			<?php endif; ?>

		</div>

	</div>
<?= form_close(); ?>