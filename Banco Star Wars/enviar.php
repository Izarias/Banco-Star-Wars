<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8">
		<title>Banco STAR-WARS</title>
		<link rel="stylesheet" type="text/css" href="estilo2.css">
	</head>
	<body>
		<?php
			include "conexao.php";
			$nome=$_POST["nome"];
			$cidade=$_POST["cidade"];
			$cpf=$_POST["cpf"];
			$telefone=$_POST["telefone"];
			$saldo=0;
			$senha=$_POST['senha'];
			$sql="insert into conta(nome,cidade,cpf,telefone,saldo,senha)values('$nome','$cidade','$cpf',$telefone,$saldo,$senha)";
			if(mysql_query($sql)){
				echo "<h1><center>Sua conta foi criada com sucesso</center></h1><br><br><br>";
				$sql2="select*from conta;";
				$resultado=mysql_query($sql2);
				while($linha=mysql_fetch_array($resultado)){
					if($cpf==$linha['cpf']){
						echo "<center>O número da sua conta é: ".$linha['nconta']."</center><br><br>";
					}	
				}
				echo "<center><a href='sobre.html' style='text-decoration: none;'>Voltar para página inicial</a></center>";
			}else{
				header ("location:fracasso.php?erro=Erro de cadastro");
			}
		?>
	</body>
</html>
