<?php
	require_once 'Conexao.class.php';
	
	class CadastroPessoasEstranhas {
		private $conexao;

		private $id;
		private $nome;
		private $rg;
		private $OrgaoExpedidor;
		private $HrEntrada;
		private $HrSaida;
		private $destino;
		private $FalarCom;

		public function __construct() {
			$this->conexao = new Conexao();

		}
	    public function QueryInsertOrUpdate($dados) {
	    	try {
	    		
    			$nome = $this->nome = $dados['nome'];
	    		$rg = $this->rg = $dados['rg'];		    	
	    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];		    	
	    		$data = $this->data = $dados['data'];		    	
	    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
	    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
	    		$destino = $this->destino = $dados['destino'];
	   			$FalarCom = $this->FalarCom = $dados['FalarCom'];
		    	
		    	$select = $this->conexao->conectar()->prepare("SELECT * FROM `controlepessoas_table` WHERE `rg` = :rg AND `data` = :data;");
		    	$select->bindValue(":rg", $this->rg, PDO::PARAM_STR);
		        $select->bindValue(":data", $this->data, PDO::PARAM_STR);
		     	$select->execute();
		     	$resultado = $select->fetch();
		    	if ($resultado) {

		    		$StringUpdate = "UPDATE `controlepessoas_table` SET  ";

		    			
		    		// Campos para WHERE 
		    		if (empty($this->rg == false)) {
			    		$rg = $this->rg = $dados['rg'];
		    		}
			    	if (empty($this->data == false)) {
			    		$data = $this->data = $dados['data'];
			    	}


			    	if (empty($this->nome == false)) {
	    				$nome = $this->nome = $dados['nome'];
	    				$StringUpdate .= "`nome` = :nome ,";

		    		}
		    		if (empty($this->OrgaoExpedidor == false)) {
			    		$OrgaoExpedidor = $this->OrgaoExpedidor = $dados['OrgaoExpedidor'];
			  			$StringUpdate .= "`OrgaoExpedidor` = :OrgaoExpedidor ,";
		    		}

			    	if (empty($this->HrEntrada == false)) {
			    		$HrEntrada = $this->HrEntrada = $dados['HrEntrada'];
			    		$StringUpdate .= "`HrEntrada` = :HrEntrada ,";
			    		
			    	}
			    	if(empty($this->HrSaida == false )) {
			    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
			   			$StringUpdate .= "`HrSaida` = :HrSaida , ";
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
			    	$StringUpdate .= " WHERE `rg` = :rg AND `data` = :data";

			        $cst = $this->conexao->conectar()->prepare($StringUpdate);
			       // var_dump($cst);

			        if (empty($this->nome == false)) {
			       		$cst->bindValue(":nome", $nome);
			        }
			        if (empty($this->rg == false)) {
		          	  	$cst->bindValue(":rg", $rg);
			        }	            	
	            	if(empty($this->OrgaoExpedidor == false )) {
	            		$cst->bindValue(":OrgaoExpedidor", $OrgaoExpedidor);
	            	}
	            	if(empty($this->data == false )) {
	            		$cst->bindValue(":data", $data);
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
	            	if (empty($this->FalarCom == false)) {
	            		$cst->bindValue(":FalarCom", $FalarCom);
	            	}
		    		
		           echo "<div id='StatusCadastro'>atualização de cadastro de pessoa estranha feita com sucesso! </div>";
		            if($cst->execute()) {
		                return 'ok';
		            }
		            else {
		                return 'erro';
		        	}
			    }
				
				elseif ($resultado == false) {
		        	$cst = $this->conexao->conectar()->prepare("INSERT INTO `controlepessoas_table` (`nome`, `rg`,`OrgaoExpedidor`, `data`, `HrEntrada`, `HrSaida`, `destino`, `FalarCom`) VALUES ( :nome, :rg, :OrgaoExpedidor, :data, :HrEntrada, :HrSaida, :destino, :FalarCom);");
		        	echo "<div id='StatusCadastro'>cadastro de pessoa estranha feito com sucesso! </div>";
	           		$cst->bindValue(":nome", $this->nome, PDO::PARAM_STR);
	           		$cst->bindValue(":rg", $this->rg, PDO::PARAM_STR);
	            	$cst->bindValue(":OrgaoExpedidor", $this->OrgaoExpedidor, PDO::PARAM_STR);
	            	$cst->bindValue(":data", $this->data, PDO::PARAM_STR);
	            	$cst->bindValue(":HrEntrada", $this->HrEntrada, PDO::PARAM_STR);
	           		$cst->bindValue(":HrSaida", $this->HrSaida, PDO::PARAM_STR);
	           		$cst->bindValue(":destino", $this->destino, PDO::PARAM_STR);		          
	           		$cst->bindValue(":FalarCom", $this->FalarCom, PDO::PARAM_STR);

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