<div class="container">
	<div class="box">

		<?php if($erro == 1): ?>
			<p style="color:red"> <?php echo $msg; ?> </p>
		<?php endif; ?>

		<h1>Tela de Cadastro</h1>

		<hr>

		<?= form_open('clogin/cadastro', array('id' => 'formulario', 'name' => 'formulario', 'method' => 'post')) ?>

			<label for="us_nome">Login:</label>
			<input type="text" name="us_login" id="us_login" required>

			<br>
			<br>

			<label for="us_password">Senha:</label>
			<input type="password" name="us_password" id="us_password" required>

			<br>
			<br>

			<label for="us_password">Confirma Senha:</label>
			<input type="password" name="us_password_confirm" id="us_password_confirm" required>

			<br>
			<br>

			<label for="us_nome">Nome:</label>
			<input type="text" name="us_nome" id="us_nome" required>

			<br>
			<br>

			<label for="us_sobrenome">Sobrenome:</label>
			<input type="text" name="us_sobrenome" id="us_sobrenome" required>

			<br>
			<br>

			<label for="us_password">E-mail:</label>
			<input type="text" name="us_email" id="us_email" required>

			<br>
			<br>

			<label for="us_sexo">Sexo:</label>
			<select name="us_sexo" id="us_sexo">
				<option value="0">Selecione</option>
				<option value="1">Masculino</option>
				<option value="2">Feminino</option>
				<option value="3">Indefinido</option>
			</select>

			<br>
			<br>

			<input type="submit" name="envio" onclick="enviar(this)">

		<?= form_close(); ?>

		<a href="<?= site_url() . '/cinicio/index'; ?>"><button>Voltar</button></a>

	</div>

</div>