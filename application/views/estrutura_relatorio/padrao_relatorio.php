<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Relatório</title>

	<style type="text/css">
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		tr:nth-child(even) {
			background-color: #dddddd;
		}
		img{
			max-width: 300px; height: auto; display: block;
		}
	</style>
</head>
<body>

<div id="container">
	<h1 style="text-align:center;">Relatório</h1>
	
	<h3>Dados do Relatório:</h3>

	<div id="body" style="margin:0px 0px 30px 0px;">
		<table>
			<tr>
				<td>Contador</td>
				<td>Usuário</td>
				<td>Pontos Usuário</td>
				<td>E-mail Usuário</td>
				<td>Data criação Usuário</td>
				<td>Data modificação Usuário</td>
			</tr>
			<tbody>
				<?php $i=1?>
				<?php foreach ($obj as $key):?>
				
                    <tr>
                    <td><?php echo $i++?></td>
                    <td><?php echo $key->us_id?></td>
                    <td><?php echo $key->us_pontos_usuario?></td>
                    <td><?php echo $key->us_email?></td>
                    <td><?php echo $key->us_data_alta ?></td>
                    <td><?php echo $key->us_data_mod ?></td>
                <?php endforeach;?>
			    </tr>
			</tbody>
		</table>
	</div>

</div>

</body>
</html>