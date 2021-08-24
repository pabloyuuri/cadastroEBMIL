<?php
require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';
	class CadastrosRecentesViaCivis { 
		private $conexao;

		private $id;
		private $NomeMotorista;
		private $rg;
		private $OrgaoExpedidor;
		private $data;	
		private $veiculo;
		private $placa;
		private $HrEntrada;
		private $HrSaida;	
		private $destino;	

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
	            $cst = $this->conexao->conectar()->prepare("SELECT id, NomeMotorista, rg, OrgaoExpedidor, data, veiculo, placa, HrEntrada, HrSaida, destino FROM `controlevtrcivis_table` WHERE data = (SELECT CURRENT_DATE()) AND id ='" .$_GET['id']."'");
	            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
	            $cst->execute();
	            return $cst->fetch();
	        } 
	        catch (PDOException $ex) {
	            return 'error '.$ex->getMessage();
	        }
	    }
				    
	    public function queryUpdate($dados) {
	        try {
	        	$NomeMotorista = $this->NomeMotorista = $dados['NomeMotorista'];
	    		$rg = $this->rg = $dados['rg'];
	    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];		    	
	    		$data = $this->data = $dados['data'];		    	
	    		$veiculo = $this->veiculo = $dados['veiculo'];
	    		$placa = $this->placa = $dados['placa'];
	    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
	    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
	    		$destino = $this->destino = $dados['destino'];
	    		
	            $StringUpdate = "UPDATE `controlevtrcivis_table` SET  ";
	            // Condições
	    		if (empty($this->NomeMotorista == false)) {
    				$NomeMotorista = $this->NomeMotorista = $dados['NomeMotorista'];
    				$StringUpdate .= "`NomeMotorista` = :NomeMotorista ,";
	    		}	
	    		
	    		if (empty($this->rg == false)) {
		    		$rg = $this->rg = $dados['rg'];
		    		$StringUpdate .= "`rg` = :rg ,";
	    		}
	    		if (empty($this->OrgaoExpedidor == false)) {
		    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];
		    		$StringUpdate .= "`OrgaoExpedidor` = :OrgaoExpedidor ,";

	    		}

	    		if (empty($this->data == false)) {
		    		$data = $this->data = $dados['data'];

	    		} // Fim Condições
		    	
		    	

		    	if (empty($this->veiculo == false)) {
		    		$veiculo = $this->veiculo = $dados['veiculo'];
		    		$StringUpdate .= "`veiculo` = :veiculo ,";
		    	}
		    	if (empty($this->placa == false)) {
		    		$placa = $this->placa = $dados['placa'];
		    		$StringUpdate .= "`placa` = :placa ,";
		    	}
		    	
		    	if (empty($this->HrEntrada == false)) {
		    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
		   			$StringUpdate .= "`HrEntrada` = :HrEntrada ,";
		    	}
		    	if (empty($this->HrSaida == false)) {
		    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
		    		$StringUpdate .= "`HrSaida` = :HrSaida ,";
		    	}
		    	if(empty($this->destino == false )) {
		    		$destino = $this->destino = $dados['destino'];
		   			$StringUpdate .= "`destino` = :destino , ";
		    	}

		    	
		    	$StringUpdate = substr($StringUpdate, 0, -2);
		    	$StringUpdate .= " WHERE `data` = (SELECT CURRENT_DATE()) AND `id` = '" .$_GET['id']."'";

			    $cst = $this->conexao->conectar()->prepare($StringUpdate);
    			// Condições
            	if (empty($this->NomeMotorista == false)) {
		       		$cst->bindValue(":NomeMotorista", $NomeMotorista);
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



            	if(empty($this->veiculo == false )) {
            		$cst->bindValue(":veiculo", $veiculo);
            	}
            	if(empty($this->placa == false )) {
            		$cst->bindValue(":placa", $placa);
            	}
            	if(empty($this->HrEntrada == false )) {
            		$cst->bindValue(":HrEntrada", $HrEntrada);
            	}
            	if(empty($this->HrSaida == false )) {
            		$cst->bindValue(":HrSaida", $HrSaida);	    		
            	}
            	if(empty($this->destino == false )) {
            		$cst->bindValue(":destino", $destino);
            	}

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
	            $cst = $this->conexao->conectar()->prepare("DELETE FROM `controlevtrcivis_table` WHERE id = '" .$_GET['id']."'");
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