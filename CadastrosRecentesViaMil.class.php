<?php
require_once 'Conexao.class.php';
require_once 'Funcoes.class.php';
	class CadastrosRecentesViaMil { 
		private $conexao;

		private $id;
		private $NomeGuerraMotorista;
		private $NomeGuerraCHVtr;
		private $Viatura;
		private $data;	
		private $OdometroSaida;
		private $OdometroEntrada;
		private $HrSaida;
		private $HrEntrada;	
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
	            $cst = $this->conexao->conectar()->prepare("SELECT id, NomeGuerraMotorista, NomeGuerraCHVtr, Viatura, data, OdometroSaida, OdometroEntrada, HrSaida, HrEntrada, destino FROM `controlevtrmil_table` WHERE data = (SELECT CURRENT_DATE()) AND id ='" .$_GET['id']."'");
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
	        	$NomeGuerraMotorista = $this->NomeGuerraMotorista = $dados['NomeGuerraMotorista'];
	    		$NomeGuerraCHVtr = $this->NomeGuerraCHVtr = $dados['NomeGuerraCHVtr'];
	    		$Viatura = $this->Viatura = $dados['Viatura'];		    	
	    		$data = $this->data = $dados['data'];		    	
	    		$OdometroSaida = $this->OdometroSaida = $dados['OdometroSaida'];
	    		$OdometroEntrada = $this->OdometroEntrada = $dados['OdometroEntrada'];
	    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
	    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
	    		$destino = $this->destino = $dados['destino'];
	    		
	            $StringUpdate = "UPDATE `controlevtrmil_table` SET  ";
	            // Condições
	    		if (empty($this->NomeGuerraMotorista == false)) {
    				$NomeGuerraMotorista = $this->NomeGuerraMotorista = $dados['NomeGuerraMotorista'];
	    		}	
	    		
	    		if (empty($this->NomeGuerraCHVtr == false)) {
		    		$NomeGuerraCHVtr = $this->NomeGuerraCHVtr = $dados['NomeGuerraCHVtr'];
	    		}
	    		if (empty($this->Viatura == false)) {
		    		$Viatura = $this->Viatura = $dados['Viatura'];

	    		}

	    		if (empty($this->data == false)) {
		    		$data = $this->data = $dados['data'];

	    		} // Fim Condições
		    	
		    	

		    	if (empty($this->OdometroSaida == false)) {
		    		$OdometroSaida = $this->OdometroSaida = $dados['OdometroSaida'];
		    		$StringUpdate .= "`OdometroSaida` = :OdometroSaida ,";
		    	}
		    	if (empty($this->OdometroEntrada == false)) {
		    		$OdometroEntrada = $this->OdometroEntrada = $dados['OdometroEntrada'];
		    		$StringUpdate .= "`OdometroEntrada` = :OdometroEntrada ,";
		    	}
		    	if (empty($this->HrSaida == false)) {
		    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
		    		$StringUpdate .= "`HrSaida` = :HrSaida ,";
		    	}

		    	if (empty($this->HrEntrada == false)) {
		    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
		   			$StringUpdate .= "`HrEntrada` = :HrEntrada ,";
		    	}
		    	if(empty($this->destino == false )) {
		    		$destino = $this->destino = $dados['destino'];
		   			$StringUpdate .= "`destino` = :destino , ";
		    	}

		    	
		    	$StringUpdate = substr($StringUpdate, 0, -2);
		    	$StringUpdate .= " WHERE 
		    	`NomeGuerraMotorista` = :NomeGuerraMotorista 
		    	AND `NomeGuerraCHVtr` = :NomeGuerraCHVtr
		    	AND `Viatura` = :Viatura 
		    	AND `data` = :data";

			    $cst = $this->conexao->conectar()->prepare($StringUpdate);
    			// Condições
            	if (empty($this->NomeGuerraMotorista == false)) {
		       		$cst->bindValue(":NomeGuerraMotorista", $NomeGuerraMotorista);
		        }
		        if (empty($this->NomeGuerraCHVtr == false)) {
		       		$cst->bindValue(":NomeGuerraCHVtr", $NomeGuerraCHVtr);
		        }
		        if (empty($this->Viatura == false)) {
		       		$cst->bindValue(":Viatura", $Viatura);
		        }
		        if (empty($this->data == false)) {
	          	  	$cst->bindValue(":data", $data);
		        } // Fim Condições	  



            	if(empty($this->OdometroSaida == false )) {
            		$cst->bindValue(":OdometroSaida", $OdometroSaida);
            	}
            	if(empty($this->OdometroEntrada == false )) {
            		$cst->bindValue(":OdometroEntrada", $OdometroEntrada);
            	}
            	if(empty($this->HrSaida == false )) {
            		$cst->bindValue(":HrSaida", $HrSaida);	    		
            	}
            	if(empty($this->HrEntrada == false )) {
            		$cst->bindValue(":HrEntrada", $HrEntrada);
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
	            $cst = $this->conexao->conectar()->prepare("DELETE FROM `controlevtrmil_table` WHERE id = '" .$_GET['id']."'");
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