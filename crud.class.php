<?php 

	class Crud
	{
		//declarar variaveis privadas
		private $banco = 'test';
		private $usuario = 'root';
		private $senha = '';
		private $hostname = 'localhost';
		
		//Funcao para conexao
		public function conexao()
		{
			$conn = mysql_connect($this->hostname, $this->usuario, $this->senha);

			mysql_select_db($this->banco) or die ('erro ao conectar'.mysql_error());
	  
		  	mysql_query("SET NAMES 'UTF8'");
		  	mysql_query('SET character_set_connection=UTF8');
		  	mysql_query('SET character_set_cliente=UTF8');
		  	mysql_query('SET character_set_results=UTF8');
		}
		
		//Funcao para selecao de dados
		public function seleciona($tabela, $campos, $condicao)
		{
			// pegar os valores da array
			$arrValores = array_values($campos);
		
			$String = "SELECT ";
			
			foreach($arrValores as $value){
				
				$String .= "$value, ";
			}
			
			$String = substr_replace($String, " ", -2, 1);
			
			$String .= "FROM ".$tabela." WHERE $condicao";
			
			$result = mysql_query($String);
			
			return $result;

		}//fecha a funcao
		
		//Funcao que fatia os dados
		public function fetch_assoc($dado)
		{
			$fetch = mysql_fetch_assoc($dado);
			
			return $fetch;
		}
		
		//função conta registros
		public function conta_registros($sql)
		{
			$total = mysql_num_rows($sql);
			
			return $total;
		}
		
		//Funcao verifica sql
		public function verifica_sql($sql)
		{
			if(mysql_num_rows($sql) <= 0 ){
				return false;
			}else{
				return true;
			}
		}//fecha a função
		
		//Funcao para inserir de dados
		public function inserir($tabela, $dados)
		{
		
			 // pegar os campos da array
			 $arrCampo = array_keys($dados);
			 // pegar valores da array
			 $arrValores = array_values($dados);
			 // contar os campos da array
			 $numCampo = count($arrCampo);
			 //contar os valores da array
			 $numValores = count($arrValores);
		
			  //validação dos campos
		
			  if($numCampo == $numValores){
				
				$sql = "INSERT INTO ".$tabela." (";
				
				foreach($arrCampo as $campo){
				
				$sql.= "$campo, ";
			
				 }
			
				$sql = substr_replace($sql, ")", -2, 1);
				//echo $sql;
			
				$sql.= " VALUES (";
				
				foreach($arrValores as $valores){
				
				$sql.= "'".$valores."', ";
			
				 }
				
				$sql = substr_replace($sql, ")", -2, 1);
			
			   }else{
			
				echo 'Erro ao checar os valores';
			
				}
				
				$query = mysql_query($sql);
				
				return $query;
			
			}//fecha a funcao
		
		//funcao atualizar
		public function alterar ($tabela, $dados, $string)
		{

			 // pegar os campos da array
			 $arrCampo = array_keys($dados);
			 // pegar valores da array
			 $arrValores = array_values($dados);
			 // contar os campos da array
			 $numCampo = count($arrCampo);
			 //contar os valores da array
			 $numValores = count($arrValores);
			
			 // construção da string
		
			if($numCampo == $numValores && $numValores > 0){
		
			$sql = "UPDATE ".$tabela." SET ";
			
			for($i = 0; $i < $numCampo; $i++){
			$sql .= $arrCampo[$i]." = '".$arrValores[$i]."', ";
				
			}
			
			$sql = substr_replace($sql, " ", -2, 1);
			$sql .= "WHERE $string";
			
			}else{
		
			echo 'Erro ao atualizar dados';
		
			}
			
			$up = mysql_query($sql);
			
			return $up;
			
		}//Fecha a funcao atualizar
		
		
		//funcao deletar
		public function deleta($tabela, $condicao)
		{
			$sql = "DELETE FROM ".$tabela." WHERE $condicao";
			
			$del = mysql_query($sql);
			
			return $del;
		}//Fecha a funcao deletar
		
		
	
	}//fecha a classe


?>