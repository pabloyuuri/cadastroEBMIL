<?php
	require_once 'Conexao.class.php';
	class CadastroVtrCivis {
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
	    public function QueryInsertOrUpdate($dados) {
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


		    	$select = $this->conexao->conectar()->prepare("SELECT * FROM `controlevtrcivis_table` WHERE `rg` = :rg AND `data` = :data AND `placa` = :placa;");
		    	$select->bindValue(":rg", $this->rg, PDO::PARAM_STR);
		        $select->bindValue(":data", $this->data, PDO::PARAM_STR);
		        $select->bindValue(":placa", $this->placa, PDO::PARAM_STR);
		     	$select->execute();
		     	$resultado = $select->fetch();
			   	
		    	if ($resultado) {

		    		$StringUpdate = "UPDATE `viaturascivis_table` SET  ";

		    		if(empty($this->placa == false )) {
			    		$placa = $this->placa = $dados['placa'];

			    	}
		    		if (empty($this->rg == false)) {
	    				$rg = $this->rg = $dados['rg'];
	    				
		    		}	
		    		if (empty($this->data == false)) {
			    		$data = $this->data = $dados['data'];
			  	
		    		}
		    		


		    		if (empty($this->NomeMotorista == false)) {
		    			$NomeMotorista = $this->NomeMotorista = $dados['NomeMotorista'];
			    		$StringUpdate .= "`NomeMotorista` = :NomeMotorista ,";
		    		}
			    	
			    	if (empty($this->OrgaoExpedidor == false)) {
			    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];
			    		$StringUpdate .= "`OrgaoExpedidor` = :OrgaoExpedidor ,";


			    	}

			    	if (empty($this->veiculo == false)) {
			    		$veiculo = $this->veiculo = $dados['veiculo'];
			    		$StringUpdate .= "`veiculo` = :veiculo ,";
			    		
			    	}

			    	
			    	

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
			    	
			    	
			    	$StringUpdate = substr($StringUpdate, 0, -2);
			    	$StringUpdate .= " WHERE `rg` = :rg AND `data` = :data AND `placa` = :placa;";

			        $cst = $this->conexao->conectar()->prepare($StringUpdate);
			        var_dump($cst);

			        if (empty($this->NomeMotorista == false)) {
			       		$cst->bindValue(":NomeMotorista", $NomeMotorista);
			        }
			        if(empty($this->rg == false )) {
	            		$cst->bindValue(":rg", $rg);
	            	}
			        if (empty($this->OrgaoExpedidor == false)) {
		          	  	$cst->bindValue(":OrgaoExpedidor", $OrgaoExpedidor);
			        }	            	
	            	if(empty($this->data == false )) {
	            		$cst->bindValue(":data", $data);
	            	}
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
		    		
		           echo "<div id='StatusCadastro'>atualização de cadastro de viatura civil feita com sucesso! </div>";
		            if($cst->execute()) {
		                return 'ok';
		            }
		            else {
		                return 'erro';
		        	}
			    }
				elseif($resultado == false) {
		        	$cst = $this->conexao->conectar()->prepare("INSERT INTO `controlevtrcivis_table` (`NomeMotorista`, `rg`, `OrgaoExpedidor`, `data`, `veiculo`, `placa`,
`HrEntrada`, `HrSaida`, `destino`) VALUES (:NomeMotorista, :rg, :OrgaoExpedidor, :data,
:veiculo, :placa, :HrEntrada, :HrSaida, :destino);");
		          	$cst->bindValue(":NomeMotorista", $this->NomeMotorista, PDO::PARAM_STR);
		          	$cst->bindValue(":rg", $this->rg, PDO::PARAM_STR);
		          	$cst->bindValue(":OrgaoExpedidor", $this->OrgaoExpedidor, PDO::PARAM_STR);
		          	$cst->bindValue(":data", $this->data, PDO::PARAM_STR);
		          	$cst->bindValue(":veiculo", $this->veiculo, PDO::PARAM_STR);
		          	$cst->bindValue(":placa", $this->placa, PDO::PARAM_STR);
		          	$cst->bindValue(":HrEntrada", $this->HrEntrada, PDO::PARAM_STR);
		          	$cst->bindValue(":HrSaida", $this->HrSaida, PDO::PARAM_STR);
		          	$cst->bindValue(":destino", $this->destino, PDO::PARAM_STR);

	          


		          	echo "<div id='StatusCadastro'>cadastro de viatura civil feito com sucesso! </div>";
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