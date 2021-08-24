<?php
require_once '../classes/Conexao.class.php';
require_once '../classes/CadastrosRecentesViaCivis.class.php';
require_once '../classes/Funcoes.class.php';
    $objCadastro = new CadastrosRecentesViaCivis();
    $objFcs = new Funcoes();
    $conexao = new Conexao();

if(isset($_POST['btCadastrar'])){
    if($objCadastro->queryInsert($_POST) == 'ok'){
        header();
    }else{
        echo "Erro em cadastrar";
    }
}

if(isset($_POST['btAlterar'])){
    if($objCadastro->queryUpdate($_POST) == 'ok'){
        header('location: ?acao=edit&id='.$objFcs->base64($_POST['id'],1));
    }else{
        echo "Erro em alterar";
    }
}
    
if(isset($_GET['acao'])) {
    switch($_GET['acao']) {
        case 'edit': 
        if ($id = $objCadastro->querySeleciona($_GET['id'])) { 
             
        }
        break;

        case 'delete': 
                if($id = $objCadastro->queryDelete($_GET['id']) == 'ok'){
                    echo '<script>    </script>';
                }
                else {
                    echo "Erro em deletar";
                }
        
        break;
    }

                
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/CadastrosRecentes.css" media="screen" />
    <title>Cadastros Recentes</title>
    <meta charset="utf-8">
</head>
<body>

    
    <?php
        require_once '../classes/Conexao.class.php';
        $conexao = new Conexao();
        $select = $conexao->conectar()->prepare("SELECT *FROM controlevtrcivis_table WHERE `data` = (SELECT CURRENT_DATE())"); 
        $select->execute();
    ?>
    <div id="lista">
        <table border="1" style="width: 80%; margin-left: auto; margin-right: auto; text-align: center;" >
            <tr>
                <th style="width:300px">MOTORISTA</th>
                <th style="width: 300px;">N° IDENTIF.</th   >
                <th style="width: 100px;">ORGÃO EXPEDIDOR</th>
                <th style="width: 200px;">DATA</th>
                <th>VEÍCULO</th>
                <th>PLACA</th>
                <th>H0RÁRIO ENTRADA</th> 
                <th>HORÁRIO SAÍDA</th>
                <th>DESTINO</th>
                <th>EDITAR</th>
                <th>EXCLUIR</th>
            </tr>
            <?php while($rst = $select->fetch(PDO::FETCH_ASSOC)) { ?>
            <div>
                <?php echo "<tr> "; ?>
                <?php echo "<td>". $rst['NomeMotorista']."</td>"; ?>
                <?php echo "<td>". $rst['rg']."</td>"; ?>
                <?php echo "<td>". $rst['OrgaoExpedidor']."</td>"; ?>
                <?php echo "<td>". $rst['data']."</td>"; ?>
                <?php echo "<td>". $rst['veiculo']."</td>"; ?> 
                <?php echo "<td>". $rst['placa']."</td>"; ?>
                <?php echo "<td>". $rst['HrEntrada']."</td>"; ?> 
                <?php echo "<td>". $rst['HrSaida']."</td>"; ?> 
                <?php echo "<td>". $rst['destino']."</td>"; ?>
                
                <td id="editar">
                    <div id="editar">
                        <a href="?acao=edit&id=<?=$rst['id']?>" title="Editar dados">
                            <img class="editar" src="../imgs/ico-editar.png" alt="Editar" />
                        </a>
                    </div>
                </td>
                
                <td class="excluir">
                    <a href="?acao=delete&id=<?=$rst['id']?>" title="Excluir esse dado" onclick="return confirm('Excluir Registro?')"><img src="../imgs/ico-excluir.png" width="16" height="16" alt="Excluir"></a>
                </td>
                <?php echo "</tr>"; ?> 
                <?php } ?>
            </div>
        </table>
    </div>
    


<style>
        
        .modal-container {
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,.5);
            position: fixed;
            top: 0px;
            left: 0px;
            z-index: 2000;
            justify-content: center;
            align-items: center;

        }
}

        .modal-container.mostrar {
            
        }

        .modal {
            display: flex;
            background: white;
            width: 60%;
            min-width: 300px;
            padding: 40px;
                    border: 10px solid #0f4979;
            box-shadow: 0 0 0 10px white;
            position: relative;
        }

        @keyframes modal {
            from {
                opacity: 0;
                transform: translate3d(0, -60px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .mostrar .modal {
            animation: modal .3s;
        }

        .fechar {
            position: absolute;
            font-size: 1.2em;
            top: -30px;
            right: -30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 4px solid white;
            background: black;
            color: white;
            font-family: monospace;
            cursor: pointer;
            box-shadow: 0 4px 4px 0 black;
        }
    </style>

    
    <div id="ModalContainer" class="modal-container">
        <div class="mostrar">
            <div class="modal">
                <button id="fechar" onclick="FecharModal()" class="fechar">x</button>
                <table style="font-family: Arial;">
                    <form method="POST">
                        <caption><h3 style="font-family: monospace;">Alterar Registro</h3></caption>
                        <tr>
                            <th>
                                Nome de Guerra:
                            </th>                                                                                                                   
                            <td>
                                <input type="text" name="NomeMotorista" readonly="true" required="" value="<?=$objFcs->tratarCaracter((isset($id['NomeMotorista']))?($id['NomeMotorista']):(''), 1)?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                N° Identif.:
                            </th>
                            <td>
                                <input type="text" name="rg" value="<?=$objFcs->tratarCaracter((isset($id['rg']))?($id['rg']):(''), 1)?>"><br>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                OrgaoExpedidor:
                            </th>
                            <td>
                                <input type="text" name="OrgaoExpedidor"  value="<?=$objFcs->tratarCaracter((isset($id['OrgaoExpedidor']))?($id['OrgaoExpedidor']):(''), 1)?>"><br>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Data
                            </th>
                            <td>
                                <input type="text" required="true" name="data"  value="<?php echo date("Y-m-d"); ?>" readonly="true">
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Veículo:
                            </th>
                            <td><input type="text" name="veiculo"  value="<?=$objFcs->tratarCaracter((isset($id['veiculo']))?($id['veiculo']):(''), 2)?>"><br>
                            </td>
                        </tr>


                        <tr>
                            <th>
                                Placa:
                            </th>
                            <td>
                                <input type="number" name="placa"  value="<?=$objFcs->tratarCaracter((isset($id['placa']))?($id['placa']):(''), 2)?>"><br>
                            </td>
                        </tr>

                        
                        <tr>
                            <th>
                                Horario de Entrada:
                            </th>
                            <td>
                                <input type="time" name="HrEntrada"  value="<?=$objFcs->tratarCaracter((isset($id['HrEntrada']))?($id['HrEntrada']):(''), 2)?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Horario de Saída:
                            </th>
                            <td>
                                <input type="time" name="HrSaida"  value="<?=$objFcs->tratarCaracter((isset($id['HrSaida']))?($id['HrSaida']):(''), 2)?>"><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Destino:
                            </th>
                            <td>
                                <input type="text" name="destino"  value="<?=$objFcs->tratarCaracter((isset($id['destino']))?($id['destino']):(''), 2)?>"><br>
                            </td>
                        </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    <input type="submit" name="<?=(isset($_GET['acao']) == 'edit')?('btAlterar'):('btCadastrar')?>" value="<?=(isset($_GET['acao']) == 'edit')?('Alterar'):('Cadastrar')?>">
                                    <input type="hidden" name="id" value="<?=(isset($id['acao']))?($objFcs->base64($id['id'], 1)):('')?>">
                                </td>
                    </form>
                </table>
            </div>
        </div>
    </div>
<script>
        

        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);

        document.getElementById('ModalContainer').style.display = "none";

        if (!urlParams.get('id') ) {
            document.getElementById('ModalContainer').style.display = "none";
        }
        else if(urlParams.get('acao') === 'edit'){
            alterar();
        }

        function alterar() {
            document.getElementsByClassName('mostrar');
            document.getElementById('ModalContainer').style.display = "flex";
        }
        
        function FecharModal() {
            document.getElementById('ModalContainer').style.display = "none";
        }

        function excluir() {

            document.getElementsByClassName('mostrar').style.display = "none";
            
        }
    

</script>
</body>
</html>