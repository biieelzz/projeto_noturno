<div class="container">
	<div class="box">

		<?php if($sucesso == 1): ?>
			<p style="color:#4CAF50"> <?php echo $msg; ?> </p>
		<?php endif; ?>

		<h1>Tela de Login</h1>

		<hr>

		<?= form_open('clogin/login', array('id' => 'formulario', 'name' => 'formulario', 'method' => 'post')) ?>

			<label for="us_nome">Login:</label>
			<input type="text" name="us_nome" id="us_nome">

			<br>
			<br>

			<label for="us_password">Senha:</label>
			<input type="password" name="us_password" id="us_password">

			<br>
			<br>

			<input type="submit" name="envio">

		<?= form_close(); ?>

		<a href="<?= site_url() . '/cinicio/cadastro'; ?>"><button>Cadastro</button></a>

		<hr>

	</div>

</div>