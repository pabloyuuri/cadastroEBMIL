<?php
require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';
	class CadastrosRecentes { 
		private $conexao;

		private $id;
		private $NomeGuerra;
		private $DivSecao;
		private $data;
		private $HrChegada;
		private $SaidaAlmoco;
		private $RetornoAlmoco;
		private $HrSaida;		

		public function __construct() {
			$this->conexao = new Conexao();

		}

		public function __set($atributo, $valor){
        	$this->$atributo = $valor;
	    }
	    public function __get($atributo){
	        return $this->$atributo;
	    }

		public function querySeleciona($dados){
	        try {
	            $cst = $this->conexao->conectar()->prepare("SELECT id, DivSecao, NomeGuerra, HrChegada, SaidaAlmoco, RetornoAlmoco, HrSaida FROM `controlemil_table` WHERE data = (SELECT CURRENT_DATE()) AND id ='" .$_GET['id']."'");
	            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
	            $cst->execute();
	            return $cst->fetch();
	        } 
	        catch (PDOException $ex) {
	            return 'error '.$ex->getMessage();
	        }
	    }
				    
	    public function queryUpdate($dados) {
	        try{
	        	$NomeGuerra = $this->NomeGuerra = $dados['NomeGuerra'];
	    		$DivSecao = $this->DivSecao = $dados['DivSecao'];
	    		$data = $this->data = $dados['data'];		    	
	    		$HrChegada = $this->HrChegada = $dados['HrChegada'];		    	
	    		$SaidaAlmoco = $this->SaidaAlmoco = $dados['SaidaAlmoco'];
	    		$RetornoAlmoco = $this->RetornoAlmoco = $dados['RetornoAlmoco'];
	    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
	    		
	            $StringUpdate = "UPDATE `controlemil_table` SET  ";

	    		if (empty($this->NomeGuerra == false)) {
    				$NomeGuerra = $this->NomeGuerra = $dados['NomeGuerra'];
    				
	    		}	
	    		
	    		if (empty($this->DivSecao == false)) {
		    		$DivSecao = $this->DivSecao = $dados['DivSecao'];

	    		}

	    		if (empty($this->data == false)) {
		    		$data = $this->data = $dados['data'];
		  	
	    		}
		    	
		    	if (empty($this->HrChegada == false)) {
		    		$HrChegada = $this->HrChegada = $dados['HrChegada'];
		    		$StringUpdate .= "`HrChegada` = :HrChegada ,";


		    	}

		    	if (empty($this->SaidaAlmoco == false)) {
		    		$SaidaAlmoco = $this->SaidaAlmoco = $dados['SaidaAlmoco'];
		    		$StringUpdate .= "`SaidaAlmoco` = :SaidaAlmoco ,";
		    		
		    	}

		    	if (empty($this->RetornoAlmoco == false)) {
		    		$RetornoAlmoco = $this->RetornoAlmoco = $dados['RetornoAlmoco'];
		   			$StringUpdate .= "`RetornoAlmoco` = :RetornoAlmoco ,";

		    	}
		    	if(empty($this->HrSaida == false )) {
		    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
		   			$StringUpdate .= "`HrSaida` = :HrSaida , ";

		    	}

		    	
		    	$StringUpdate = substr($StringUpdate, 0, -2);
		    	$StringUpdate .= " WHERE `NomeGuerra` = :NomeGuerra AND `data` = :data";

			    $cst = $this->conexao->conectar()->prepare($StringUpdate);
	    		
	            if (empty($this->NomeGuerra == false)) {
			       		$cst->bindValue(":NomeGuerra", $NomeGuerra);
			        }
		        if (empty($this->data == false)) {
	          	  	$cst->bindValue(":data", $data);
		        }	            	
            	if(empty($this->HrChegada == false )) {
            		$cst->bindValue(":HrChegada", $HrChegada);
            	}
            	if(empty($this->SaidaAlmoco == false )) {
            		$cst->bindValue(":SaidaAlmoco", $SaidaAlmoco);
            	}
            	if(empty($this->RetornoAlmoco == false )) {
            		$cst->bindValue(":RetornoAlmoco", $RetornoAlmoco);	    		
            	}
            	if(empty($this->HrSaida == false )) {
            		$cst->bindValue(":HrSaida", $HrSaida);
            	}
		    		
		           
	            if($cst->execute()) {
	                return 'ok';

	            }
	            else {
	                return 'erro';
	            }
	            echo "<div id='StatusCadastro'>atualização de cadastro feita com sucesso! </div>";
	        } 
	        catch (PDOException $ex) {
	            return 'error '.$ex->getMessage();
	        }
	    }
			    
	    public function queryDelete($dados){
	        try {
	            $cst = $this->conexao->conectar()->prepare("DELETE FROM `controlemil_table` WHERE id = '" .$_GET['id']."'");
	            if($cst->execute()){
	                return 'ok';
	            }
	            else {
	                return 'erro';
	            }
	        } 
	        catch (PDOException $ex) {
	            return 'error'.$ex->getMessage();
	        }
	    }
	}

?>