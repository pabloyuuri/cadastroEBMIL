<?php
	require_once 'Conexao.class.php';
	class CadastroVtrMil {
		private $conexao;

		private $id;
		private $NomeGuerraMotorista;
		private $NomeGuerraCHVtr;
		private $Viatura;
		private $data;
		private $OdometroEntrada;
		private $OdometroSaida;
		private $HrSaida;
		private $HrEntrada;
		private $destino;

		public function __construct() {
			$this->conexao = new Conexao();

		}
	    public function QueryInsertOrUpdate($dados) {
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


		    	$select = $this->conexao->conectar()->prepare("SELECT * FROM `controlevtrmil_table` WHERE `NomeGuerraMotorista` = :NomeGuerraMotorista AND `Viatura` = :Viatura AND `data` = :data;");
		    	$select->bindValue(":NomeGuerraMotorista", $this->NomeGuerraMotorista, PDO::PARAM_STR);
		    	$select->bindValue(":Viatura", $this->Viatura, PDO::PARAM_STR);
		        $select->bindValue(":data", $this->data, PDO::PARAM_STR);
		     	$select->execute();
		     	$resultado = $select->fetch();
			   	
		    	if ($resultado) {

		    		$StringUpdate = "UPDATE `controlevtrmil_table` SET  ";

		    		if (empty($this->NomeGuerraMotorista == false)) {
	    				$NomeGuerraMotorista = $this->NomeGuerraMotorista = $dados['NomeGuerraMotorista'];
	    				
		    		}	
		    		
		    		if (empty($this->DivSecao == false)) {
			    		$Viatura = $this->Viatura = $dados['Viatura'];

		    		}

		    		if (empty($this->data == false)) {
			    		$data = $this->data = $dados['data'];
			  	
		    		}
		    		if (empty($this->NomeGuerraCHVtr == false)) {
		    			$NomeGuerraCHVtr = $this->NomeGuerraCHVtr = $dados['NomeGuerraCHVtr'];
			    		$StringUpdate .= "`NomeGuerraCHVtr` = :NomeGuerraCHVtr ,";
		    		}
			    	
			    	if (empty($this->OdometroEntrada == false)) {
			    		$OdometroEntrada = $this->OdometroEntrada = $dados['OdometroEntrada'];
			    		$StringUpdate .= "`OdometroEntrada` = :OdometroEntrada ,";


			    	}

			    	if (empty($this->OdometroSaida == false)) {
			    		$OdometroSaida = $this->OdometroSaida = $dados['OdometroSaida'];
			    		$StringUpdate .= "`OdometroSaida` = :OdometroSaida ,";
			    		
			    	}

			    	
			    	if(empty($this->HrSaida == false )) {
			    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
			   			$StringUpdate .= "`HrSaida` = :HrSaida , ";

			    	}

			    	if (empty($this->HrEntrada == false)) {
			    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
			   			$StringUpdate .= "`HrEntrada` = :HrEntrada ,";

			    	}

			    	if (empty($this->destino == false)) {
			    		$destino = $this->destino = $dados['destino'];
			   			$StringUpdate .= "`destino` = :destino ,";

			    	}
			    	
			    	
			    	$StringUpdate = substr($StringUpdate, 0, -2);
			    	$StringUpdate .= " WHERE `NomeGuerraMotorista` = :NomeGuerraMotorista AND `Viatura` = :Viatura AND `data` = :data;";

			        $cst = $this->conexao->conectar()->prepare($StringUpdate);
			        var_dump($cst);

			        if (empty($this->NomeGuerraMotorista == false)) {
			       		$cst->bindValue(":NomeGuerraMotorista", $NomeGuerraMotorista);
			        }
			        if(empty($this->NomeGuerraCHVtr == false )) {
	            		$cst->bindValue(":NomeGuerraCHVtr", $NomeGuerraCHVtr);
	            	}
			        if (empty($this->Viatura == false)) {
		          	  	$cst->bindValue(":Viatura", $Viatura);
			        }	            	
	            	if(empty($this->data == false )) {
	            		$cst->bindValue(":data", $data);
	            	}
	            	if(empty($this->OdometroEntrada == false )) {
	            		$cst->bindValue(":OdometroEntrada", $OdometroEntrada);	    		
	            	}
	            	if(empty($this->OdometroSaida == false )) {
	            		$cst->bindValue(":OdometroSaida", $OdometroSaida);
	            	}
	            	if(empty($this->HrEntrada == false )) {
	            		$cst->bindValue(":HrEntrada", $HrEntrada);	    		
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
		    		
		           echo "<div id='StatusCadastro'>atualização de cadastro de viatura militar feita com sucesso! </div>";
		            if($cst->execute()) {
		                return 'ok';
		            }
		            else {
		                return 'erro';
		        	}
			    }
				elseif($resultado == false) {
					echo "<div id='StatusCadastro'>cadastro de viatura militar feito com sucesso! </div>";
		        	$cst = $this->conexao->conectar()->prepare("INSERT INTO `controlevtrmil_table` (`NomeGuerraMotorista`, `NomeGuerraCHVtr`, `Viatura`, `data`, `OdometroEntrada`, `OdometroSaida`, `HrSaida`, `HrEntrada`, `destino`) 
		        		VALUES 
		        		( :NomeGuerraMotorista, :NomeGuerraCHVtr, :Viatura, :data, :OdometroEntrada, :OdometroSaida, :HrSaida, :HrEntrada, :destino)");


	           		$cst->bindValue(":NomeGuerraMotorista", $this->NomeGuerraMotorista);
	           		$cst->bindValue(":NomeGuerraCHVtr", $this->NomeGuerraCHVtr);
	           		$cst->bindValue(":Viatura", $this->Viatura);
	            	$cst->bindValue(":data", $this->data);
	            	$cst->bindValue(":OdometroSaida", $this->OdometroSaida);
	            	$cst->bindValue(":OdometroEntrada", $this->OdometroEntrada);
	           		$cst->bindValue(":HrSaida", $this->HrSaida);
	           		$cst->bindValue(":HrEntrada", $this->HrEntrada);  
		          	$cst->bindValue(":destino", $this->destino); 

		            if($cst->execute()) {
		                return 'ok';

		            }
		            else {
		                return 'erro';
		            }
		        }
			}
			catch (PDOException $ex) {
				return 'error' .$ex->getMessage();
			}
		}		
	}
?>