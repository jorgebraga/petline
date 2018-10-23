<?php include "cabecalho.php"; ?>

<div class="container">
    <div class="page-header"><h2>Pagamento</h2> </div>
    <form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html"> <!-- Declaração do formulário --> 
        <!-- Campos obrigatórios -->  
        <input name="receiverEmail" type="hidden" value="passeios.petline@gmail.com">  
        <input name="currency" type="hidden" value="BRL">  

        <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
        <input name="itemId1" type="hidden" value="0001">  
        <input name="itemDescription1" type="hidden" value="Notebook Prata">  
        <input name="itemAmount1" type="hidden" value="24300.00">  
        <input name="itemQuantity1" type="hidden" value="1">  
        <input name="itemWeight1" type="hidden" value="1000">  
        <input name="itemId2" type="hidden" value="0002">  
        <input name="itemDescription2" type="hidden" value="Notebook Rosa">  
        <input name="itemAmount2" type="hidden" value="25600.00">  
        <input name="itemQuantity2" type="hidden" value="2">  
        <input name="itemWeight2" type="hidden" value="750">  

        <!-- Código de referência do pagamento no seu sistema (opcional) -->  
        <input name="reference" type="hidden" value="REF1234">

        <!-- Dados do comprador (opcionais) -->  
        <input name="senderName" type="hidden" value="José Comprador">  
        <input name="senderAreaCode" type="hidden" value="11">  
        <input name="senderPhone" type="hidden" value="56273440">  
        <input name="senderEmail" type="hidden" value="comprador@uol.com.br">  

        <!-- submit do form (obrigatório) -->  
        <input alt="Pague com PagSeguro" name="submit"  type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>
    </form>
    <div class="col-md-6" align="left">
        <a href="http://www.petline.com.br/lista_passeador.php" class="btn btn-primary">Voltar</a>
    </div>
</div>

<?php include "rodape.php"; ?>