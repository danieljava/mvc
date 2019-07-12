<?php
//Chama a classe e as funcoes
require("config.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste CRUD</title>
</head>

<body>

<form method="post" enctype="multipart/form-data" action="">

	<?php 
		
		if(isset($_POST['enviar']))
		{
			$values = array('nome' => $_POST['nome'], 'email' => $_POST['email']);
			
			$Crud->inserir('user',$values);
			
			echo "<script>alert('Dados gravados com sucesso!')</script>";
			
			echo "<script>window.location.href=window.location.href</script>";
		}

	?>

	<p>
	<label>Nome:</label>
    <input type="text" name="nome"  />
	</p>
    
    <p>
	<label>Email:</label>
    <input type="text" name="email"  />
	</p>
    
    <input type="submit" name="enviar" value="Cadastrar" />
    
</form>

<h3>Resultados</h3>

<?php 

	$fields = array('nome','email');

	$query = $Crud->seleciona('user',$fields,'id = id');
	
	while($linha = $Crud->fetch_assoc($query))
	{
		echo $linha['nome']."<br>";
		echo $linha['email']."<br><br>";
	}
	
	echo "<strong>Numero de registros: </strong>".$Crud->conta_registros($query);
	
	echo "<br><strong>Status da query: </strong>".$Crud->verifica_sql($query);
	
	if($Crud->verifica_sql($query) == true)
	{
		echo "<br><strong>Legal a função funfou!!!</strong>";
	}
?>


<h3>Atualizar dados</h3>

<form method="post" enctype="multipart/form-data" action="">

	<?php 
		
		if(isset($_POST['atualizar']))
		{
		
			$values = array('nome' => $_POST['nome'], 'email' => $_POST['email']);
			
			$cond = "id = ".$_POST['id'];
			
			$Crud->alterar('user',$values,$cond);
			
			echo "<script>alert('Dados atualizados com sucesso!')</script>";
			
			echo "<script>window.location.href=window.location.href</script>";
			
		}
	?>
	
    <p>
	<label>ID:</label>
    <input type="text" name="id"  />
	</p>
    
    <p>
	<label>Nome:</label>
    <input type="text" name="nome"  />
	</p>
    
    <p>
	<label>Email:</label>
    <input type="text" name="email"  />
	</p>
	
    <input type="submit" name="atualizar" value="Atualizar" />

</form>

<h3>Deletar dados</h3>

<form method="post" enctype="multipart/form-data" action="">

	<?php 
		
		if(isset($_POST['del']))
		{
			$cond = "id = ".$_POST['id'];
			
			$Crud->deleta('user',$cond);
			
			echo "<script>alert('Dados excluidos com sucesso!')</script>";
			
			echo "<script>window.location.href=window.location.href</script>";
			
		}
			
	?>
    
	<p>
	<label>ID:</label>
    <input type="text" name="id"  />
	</p>
	
    <input type="submit" name="del" value="Deletar" />

</form>

</body>
</html>
