<?php

include "cabecalho.php";

$id = $_SESSION['id'];

if (isset($_GET['pet']) and isset($_GET['pacote']) and isset($_GET['passeador'])) {
    
    $idPet = $_GET['pet'];
    $idPacote = $_GET['pacote'];
    $idPasseador = $_GET['passeador'];

    $sqlCadastraPet = "INSERT INTO servico (id_passeador, id_pacote, id_pet, id_cliente, ativo) VALUES ($idPasseador,$idPacote,$idPet,$id,1)";

    if (mysqli_query($conn,$sqlCadastraPet)) {
        echo '<script type="text/javascript">'; 
        echo "alert('O serviço foi contratado!');"; 
        echo 'window.location.href = "http://www.petline.com.br/pagamento.php?pacote=$idPacote";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">'; 
        echo "alert('Não foi possivel contratar o serviço, contate o Administrador');"; 
        echo 'window.location.href = "http://www.petline.com.br/lista_passeador.php";';
        echo '</script>';
    }
}else{
    echo '<script type="text/javascript">'; 
    echo "alert('Não foi possivel contratar o serviço, contate o Administrador');"; 
    echo 'window.location.href = "http://www.petline.com.br/lista_passeador.php";';
    echo '</script>';
}

?>