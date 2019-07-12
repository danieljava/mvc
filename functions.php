<?php 

	//Função de paginação de resultados
	function paginacao($total, $maximo, $pag)
	{
					if($total <= '0'){
					}
					else
					{
						$paginas = ceil($total/$maximo);
						
						$links = '5';
						
						echo "<a href=\"index.php?pagina=comentarios&amp;pag=1\">Primeira pagina</a>&nbsp;&nbsp;&nbsp;";
						
						for ($i = $pag-$links; $i <= $pag-1; $i++){
						if ($i <= 0){
						}else{
						echo "<a href=\"index.php?pagina=comentarios&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
						}
						}echo "$pag &nbsp;&nbsp;&nbsp;";
						for($i = $pag +1; $i <= $pag+$links; $i++){
						if($i > $paginas){
						}else{
						echo "<a href=\"index.php?pagina=comentarios&amp;pag=$i\">$i</a>&nbsp;&nbsp;&nbsp;";
						}
				}
						echo "<a href=\"index.php?pagina=comentarios&amp;pag=$paginas\">Última pagina</a>&nbsp;&nbsp;&nbsp;";
		   }	

	}//Fecha a função
	
	//Função de limitação de palavras
	function limitarTexto($texto, $limite)
	{
		$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
	 
	   	return $texto;
	}//Fecha a função
	
	//Função de validar cpf
  	function isCpf($cpf)
  	{
		$cpf         = preg_replace("/[^0-9]/", "", $cpf);
		$digitoUm     = 0;
		$digitoDois = 0;
		
		for($i = 0, $x = 10; $i <= 8; $i++, $x--)
		{
			$digitoUm += $cpf[$i] * $x;
		}
		for($i = 0, $x = 11; $i <= 9; $i++, $x--)
		{
			if(str_repeat($i, 11) == $cpf)
			{
				return false;
			}
			$digitoDois += $cpf[$i] * $x;
		}
		$calculoUm  = (($digitoUm%11) < 2) ? 0 : 11-($digitoUm%11);
		$calculoDois = (($digitoDois%11) < 2) ? 0 : 11-($digitoDois%11);
		if($calculoUm <> $cpf[9] || $calculoDois <> $cpf[10])
		{
			return false;
		}
		return true;
		
	}//Fecha a função
	 
	 //função Validar CNPJ
	function isCNPJ($cpf)
	{
	       $cnpj     = preg_replace('/[^0-9]/', '', $cpf);
	       if(strlen($cpnj) <> 14){
	            return false;
	        }
	        $calcular = 0;
	        $calcularDois = 0;
	        for ($i = 0, $x = 5; $i <= 11; $i++, $x--) {
	            $x = ($x < 2) ? 9 : $x;
	            $number = substr($cnpj, $i, 1);
	            $calcular += $number * $x;
	        }
	        for ($i = 0, $x = 6; $i <= 12; $i++, $x--) {
	            $x = ($x < 2) ? 9 : $x;
	            $numberDois = substr($cnpj, $i, 1);
	            $calcularDois += $numberDois * $x;
	        }
	 
	        $digitoUm = (($calcular % 11) < 2) ? 0 : 11 - ($calcular % 11);
	        $digitoDois = (($calcularDois % 11) < 2) ? 0 : 11 - ($calcularDois % 11);
	 
	        if ($digitoUm <> substr($cnpj, 12, 1) || $digitoDois <> substr($cnpj, 13, 1)) {
	            return false;
	        }
	        return true;
	 }//Fecha a função
	 
	  //Intervalo entre datas
	  function intervalo($inicio, $fim)
	  {
	     $dataInicio = strtotime($inicio);
	     $dataFim    = strtotime($fim);
	     $intervalo  = ($dataFim-$dataInicio)-86400;
	     
		 return date('d', $intervalo);
		 
		 //echo intervalo('2010-12-10', '2010-12-30').' dias';
		 
	  }//Fecha a função
?>