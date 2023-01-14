<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8">
		<title>Banco STAR-WARS</title>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			$senha=$_POST['senha'];
			if($senha = 42){
				include"conexao.php";
				$sql="select*from conta;";
				$resultado=mysql_query($sql);
				echo"<center><table border='1'>";
					echo"<tr>";
						echo"<td colspan='6'><center>Contas</center></td>";
					echo"</tr>";
				while($linha=mysql_fetch_array($resultado)){
					echo"<tr>";
						echo"<td>Número da conta: ".$linha['nconta']."</td>";
						echo"<td>Nome: ".$linha['nome']."</td>";
						echo"<td>Cidade: ".$linha['cidade']."</td>";
						echo"<td>CPF: ".$linha['cpf']."</td>";
						echo"<td>Telefone: ".$linha['telefone']."</td>";
						echo"<td>Saldo: " . $linha['saldo'] . "</td>";
					echo"</tr>";
				}
				echo "</table><br><br>";
				$sql2="select*from movimentacao";
				$resultado2=mysql_query($sql2);
				echo"<table border='1'>";
					echo "<tr>";
						echo"<td colspan='5'><center>Movimentações</center></td>";
					echo"</tr>";
				while($linha2=mysql_fetch_array($resultado2)){
					echo"<tr>";
						echo"<td>Tipo: ". $linha2['tipo'] ."</td>";
						echo"<td>Valor: ". $linha2['valor'] ."</td>";
						echo"<td>Conta: ". $linha2['nconta'] ."</td>";
						echo"<td>Senha: ". $linha2['senha'] ."</td>";
						echo"<td>*Conta Destino: ". $linha2['contadestino']."</td>";
					echo"</tr>";
				}
				echo"</table><br><br><a style='text-decoration: none;' href='sobre.html'>Voltar para página inicial</a></center>";
			}else{
				header("location:fracasso.php?erro= Senha incorreta");
			}
		?>
	</body>
</html>
