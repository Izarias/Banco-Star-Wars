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
			$tipo=$_POST['tipo'];
			$valor=$_POST['valor'];
			$nconta=$_POST['nconta'];
			$senha=$_POST['senha'];
			$contadestino=$_POST['contadestino'];
			$sql2="select*from conta where nconta = $nconta;";
			$resultado=mysql_fetch_array(mysql_query($sql2));
			$erro=0;
			if($resultado['senha']==$senha){
				if($tipo == "deposito"){
					if(mysql_query("update conta set saldo =" . ($resultado['saldo']+$valor) . " where nconta = $nconta;")){
						header ("location:sucesso.html");
					}else{
						header ("location:fracasso.php?erro= Operação mal sucedida");
						$erro=1;
					}
				}elseif ($tipo=="saque") {
					if($valor>$resultado['saldo']){
						header("location:fracasso.php?erro= Saldo insuficiente");
						$erro=1;
					}else{
						if(mysql_query("update conta set saldo =" . ($resultado['saldo']-$valor) . " where nconta = $nconta;")){
							header ("location:sucesso.html");
						}else{
							header ("location:fracasso.php?erro= Operação mal sucedida");
							$erro=1;
						}
					}
				}elseif($tipo=="transferencia"){
						if($valor>$resultado['saldo']){
							header("location:fracasso.php?erro= Saldo insuficiente");
							$erro=1;
						}else{
							$sql3="select*from conta;";
							$resultado3=mysql_query($sql3);
							$existe=0;
							while($linha=mysql_fetch_array($resultado3)){
								if($linha['nconta']==$contadestino){
									$existe=1;
								}
							}
							if($existe!=0){
								if(mysql_query("update conta set saldo =" . ($resultado['saldo']-$valor) . " where nconta = $nconta;")){
									$sql3="select*from conta where nconta = $contadestino";	
									$resultado2=mysql_fetch_array(mysql_query($sql3));
									if(mysql_query("update conta set saldo =" . ($resultado2['saldo']+$valor) . " where nconta = $contadestino;")){
										header("location:sucesso.html");
									}else{
										header ("location:fracasso.php?erro= Operação mal sucedida");
										$erro=1;
									}
								}else{
									header ("location:fracasso.php?erro= Operação mal sucedida");
									$erro=1;
								}
							}else{
								header ("location:fracasso.php?erro= Conta destino Inexistente");
								$erro=1;
							}
						}	
				}
				if($erro==0){
					if($contadestino == "") {
						$sql="insert into movimentacao(tipo,valor,nconta,senha)values('$tipo',$valor,$nconta,$senha)";
					}else{
						$sql="insert into movimentacao(tipo,valor,nconta,senha,contadestino)values('$tipo',$valor,$nconta,$senha,$contadestino)";
					}
					if(!mysql_query($sql)){
						header ("location:fracasso.php?erro= Operação mal sucedida");
					}	
				}
			}else{
				header ("location:fracasso.php?erro= Senha ou número da conta incorreto");
			}
		?>
	</body>
</html>