<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8">
		<title>Banco STAR-WARS</title>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			include"conexao.php";
			$nconta=$_POST['nconta'];
			$senha=$_POST['senha'];
			$sql="select*from conta where nconta= $nconta;";
			$resultado=mysql_fetch_array(mysql_query($sql));
			if($senha == $resultado['senha']){
				echo "<center>";
					echo "<table border='1'>";
						echo "<tr>";
							echo "<td colspan='7'><center>Seus dados</center></td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Nome:" . $resultado['nome'] . "</td>";
							echo "<td>Senha:" . $resultado['senha'] . "</td>";
							echo "<td>Conta:" . $resultado['nconta'] . "</td>";
							echo "<td>Cidade:" . $resultado['cidade'] . "</td>";
							echo "<td>CPF:" . $resultado['cpf'] . "</td>";
							echo "<td>Telefone:" . $resultado['telefone'] . "</td>";
							echo "<td>Saldo:" . $resultado['saldo'] . "</td>";
						echo "</tr>";
					echo "</table><br><br>";
					$sql2="select*from movimentacao where nconta= $nconta";
					$resultado2=mysql_query($sql2);
					echo "<table border='1'>";
						echo "<tr>";
							echo "<td colspan='5'><center>Suas Movimentações</center></td>";
						echo "</tr>";
						while($linha=mysql_fetch_array($resultado2)){
							echo "<tr>";
								echo "<td>Tipo:".$linha['tipo']."</td>";
								echo "<td>Valor:".$linha['valor']."</td>";
								echo "<td>Conta:".$linha['nconta']."</td>";
								echo "<td>Senha:".$linha['senha']."</td>";
								echo "<td>*Conta Destino:".$linha['contadestino']."</td>";
							echo "</tr>";
				}
				echo "</table><br><br><a style='text-decoration: none;' href='sobre.html'>Voltar para página inicial</a></center>";
			}else{
				header("location:fracasso.php?erro= Senha ou número da conta incorreto");
			}
		?>
	</body>
</html>
