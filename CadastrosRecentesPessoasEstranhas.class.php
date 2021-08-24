<?php
require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';
	class CadastrosRecentesPessoasEstranhas { 
		private $conexao;

		private $id;
		private $nome;
		private $rg;
		private $OrgaoExpedidor;
		private $data;	
		private $HrEntrada;
		private $HrSaida;
		private $destino;	
		private $FalarCom;

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
	            $cst = $this->conexao->conectar()->prepare("SELECT id, nome, rg, OrgaoExpedidor, data, HrEntrada, HrSaida, destino, FalarCom FROM `controlepessoas_table` WHERE data = (SELECT CURRENT_DATE()) AND id ='" .$_GET['id']."'");
	            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
	            $cst->execute();
	            return $cst->fetch();
	        } 
	        catch (PDOException $ex) {
	            return 'error '. $ex->getMessage();
	        }
	    }
				    
	    public function queryUpdate($dados) {
	        try {
	        	$nome = $this->nome = $dados['nome'];
	        	$rg = $this->rg = $dados['rg'];
	    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];
	    		$data = $this->data = $dados['data'];		    	
	    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
	    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
	    		$destino = $this->destino = $dados['destino'];
	    		$FalarCom = $this->FalarCom = $dados['FalarCom'];
	    		
	            $StringUpdate = "UPDATE `controlepessoas_table` SET  ";
	            // Condições
	    		if (empty($this->nome == false)) {
    				$nome = $this->nome = $dados['nome'];
    				$StringUpdate .= "`nome` = :nome ,";
	    		}	
	    		
	    		if (empty($this->rg == false)) {
		    		$rg = $this->rg = $dados['rg'];
		    		$StringUpdate .= "`rg` = :rg ,";
	    		}
	    		if (empty($this->OrgaoExpedidor == false)) {
		    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];
		    		$StringUpdate .= "`OrgaoExpedidor` = :OrgaoExpedidor ,";

	    		}

	    		//if (empty($this->data == false)) {	
		    		//$data = $this->data = $dados['data'];

	    		//}
		    	
		    	

		    	if (empty($this->HrEntrada == false)) {
		    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
		    		$StringUpdate .= "`HrEntrada` = :HrEntrada ,";
		    	}
		    	if (empty($this->HrSaida == false)) {
		    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
		    		$StringUpdate .= "`HrSaida` = :HrSaida ,";
		    	}
		    	if (empty($this->destino == false)) {
		    		$destino = $this->destino = $dados['destino'];
		    		$StringUpdate .= "`destino` = :destino ,";
		    	}

		    	if (empty($this->FalarCom == false)) {
		    		$FalarCom = $this->FalarCom = $dados['FalarCom'];
		   			$StringUpdate .= "`FalarCom` = :FalarCom ,";
		    	}

		    	
		    	$StringUpdate = substr($StringUpdate, 0, -2);
		    	$StringUpdate .= " WHERE `data` = (SELECT CURRENT_DATE()) AND `id` = '" .$_GET['id']."'";

			    $cst = $this->conexao->conectar()->prepare($StringUpdate);
    			
    			// Condições
            	if (empty($this->nome == false)) {
		       		$cst->bindValue(":nome", $nome);
		        }
		        if (empty($this->rg == false)) {
		       		$cst->bindValue(":rg", $rg);
		        }
		        if (empty($this->OrgaoExpedidor == false)) {
		       		$cst->bindValue(":OrgaoExpedidor", $OrgaoExpedidor);
		        }
		        //if (empty($this->data == false)) {
	          	  	//$cst->bindValue(":data", $data);
		        //} // Fim Condições	  

            	if(empty($this->HrEntrada == false )) {
            		$cst->bindValue(":HrEntrada", $HrEntrada);
            	}
            	if(empty($this->HrSaida == false )) {
            		$cst->bindValue(":HrSaida", $HrSaida);	    		
            	}
            	if(empty($this->destino == false )) {
            		$cst->bindValue(":destino", $destino);
            	}
            	if(empty($this->FalarCom == false )) {
            		$cst->bindValue(":FalarCom", $FalarCom);
            	}
            	var_dump($cst);
	            if($cst->execute()) {
	                return 'ok';
	            }
	            else {
	                return 'erro';
	            }
	        } 
	        catch (PDOException $ex) {
	            return 'error '.$ex->getMessage();
	        }
	    }
			    
	    public function queryDelete($dados){
	        try {
	            $cst = $this->conexao->conectar()->prepare("DELETE FROM `controlepessoas_table` WHERE id = '" .$_GET['id']."'");
	            if($cst->execute()){
	                return 'ok';
	            }
	            else {
	                return 'erro';
	            }
	        } 
	        catch (PDOException $ex) {
	            return 'error'. $ex->getMessage();
	        }
	    }
	}

?>