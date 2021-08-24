<?php
	require_once 'Conexao.class.php';
	class Cadastro {
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

	    public function QueryInsertOrUpdate($dados) {
	    	try {
	    		
	    			$NomeGuerra = $this->NomeGuerra = $dados['NomeGuerra'];
		    		$DivSecao = $this->DivSecao = $dados['DivSecao'];
		    		$data = $this->data = $dados['data'];		    	
		    		$HrChegada = $this->HrChegada = $dados['HrChegada'];		    	
		    		$SaidaAlmoco = $this->SaidaAlmoco = $dados['SaidaAlmoco'];
		    		$RetornoAlmoco = $this->RetornoAlmoco = $dados['RetornoAlmoco'];
		    		$HrSaida = $this->HrSaida = $dados['HrSaida'];
		   		
		    	

		    	$select = $this->conexao->conectar()->prepare("SELECT * FROM `controlemil_table` WHERE `NomeGuerra` = :NomeGuerra AND `data` = :data;");
		    	$select->bindValue(":NomeGuerra", $this->NomeGuerra, PDO::PARAM_STR);
		        $select->bindValue(":data", $this->data, PDO::PARAM_STR);
		     	$select->execute();
		     	$resultado = $select->fetch();
			   	
		    	if ($resultado) {

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
			       // var_dump($cst);

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
		    		
		           echo "<div id='StatusCadastro'>atualização de cadastro feita com sucesso! </div>";
		            if($cst->execute()) {
		                return 'ok';
		            }
		            else {
		                return 'erro';
		        	}
			    }
				elseif($resultado == false) {
					echo "<div id='StatusCadastro'>cadastro feito com sucesso! </div>";
		        	$cst = $this->conexao->conectar()->prepare("INSERT INTO `controlemil_table` (`NomeGuerra`, `DivSecao`,`data`, `HrChegada`, `SaidaAlmoco`, `RetornoAlmoco`, `HrSaida`) VALUES ( :NomeGuerra, :DivSecao, :data, :HrChegada, :SaidaAlmoco, :RetornoAlmoco, :HrSaida);");
	           		$cst->bindValue(":NomeGuerra", $this->NomeGuerra, PDO::PARAM_STR);
	           		$cst->bindValue(":DivSecao", $this->DivSecao, PDO::PARAM_STR);
	            	$cst->bindValue(":data", $this->data, PDO::PARAM_STR);
	            	$cst->bindValue(":HrChegada", $this->HrChegada, PDO::PARAM_STR);
	            	$cst->bindValue(":SaidaAlmoco", $this->SaidaAlmoco, PDO::PARAM_STR);
	           		$cst->bindValue(":RetornoAlmoco", $this->RetornoAlmoco, PDO::PARAM_STR);
	           		$cst->bindValue(":HrSaida", $this->HrSaida, PDO::PARAM_STR);  
		          
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