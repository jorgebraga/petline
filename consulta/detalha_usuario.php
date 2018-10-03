<script>

    function validateNumber(evt) {
        var e = evt || window.event;
        var key = e.keyCode || e.which;

        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
        // numbers   
        key >= 48 && key <= 57 ||
        // Numeric keypad
        key >= 96 && key <= 105 ||
        // Backspace and Tab and Enter
        key == 8 || key == 9 || key == 13 ||
        // Home and End
        key == 35 || key == 36 ||
        // left and right arrows
        key == 37 || key == 39 ||
        // Del and Ins
        key == 46 || key == 45) {
            // input is VALID
        }
        else {
            // input is INVALID
            e.returnValue = false;
            if (e.preventDefault) e.preventDefault();
        }
    }

</script>

<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>

<script type="text/javascript">

function VerificaCPF () {
    if (vercpf(document.cadastro_usuario.cpf.value)) 
    { //CPF valido
    }else {
        alert('CPF NÃO VÁLIDO');
        document.cadastro_usuario.cpf.value="";
        document.cadastro_usuario.cpf.focus();
    }

}

function vercpf (cpf) {

    cpf = cpf.replace('.','');
    cpf = cpf.replace('.','');
    cpf = cpf.replace('-','');

    if (cpf.length == 0){
        return true;
    }else{
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
    return false;
    add = 0;
    for (i=0; i < 9; i ++)
    add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
    rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
    return false;
    add = 0;
    for (i = 0; i < 10; i ++)
    add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
    rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
    return false;
    return true;
    }
}

</script>

<?php
    include "../cabecalho.php";

    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];

        $sqlConsultaUsuario = "SELECT nome, sobrenome, email, dt_nascimento, telefone, rg, cpf, cep, rua, cidade, bairro, uf FROM usuario WHERE id = $id";
        $resultadoConsultaUsuario = mysqli_query($conn,$sqlConsultaUsuario);
        $contadorConsultaUsuario = mysqli_num_rows($resultadoConsultaUsuario);

        if ($contadorConsultaUsuario != 0) {

            while ($linhaUsuario = $resultadoConsultaUsuario -> fetch_array(MYSQLI_ASSOC)) {
                $nome = utf8_encode($linhaUsuario['nome']);
                $sobrenome = utf8_encode($linhaUsuario['sobrenome']);
                $email = $linhaUsuario['email'];
                $dt_nascimento = $linhaUsuario['dt_nascimento'];
                $telefone = $linhaUsuario['telefone'];
                $rg = $linhaUsuario['rg'];
                $cpf = $linhaUsuario['cpf'];
                $cep = $linhaUsuario['cep'];
                $rua = utf8_encode($linhaUsuario['rua']);
                $cidade = utf8_encode($linhaUsuario['cidade']);
                $bairro = utf8_encode($linhaUsuario['bairro']);
                $uf = utf8_encode($linhaUsuario['uf']);

            }
        }
    }
?>

    <div class="container">

        <div class="col-md-12">

            <div class="page-header">
                <h2>Altere as Informações</h2>
            </div>
<?php
    echo "<form action='http://www.petline.com.br/cadastra_usuario.php?id=$id' method='post' name='cadastro_usuario' id='cadastro_usuario'>";
?>
            <div class="form-row">

                <div class="col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" maxlength="255" id="nome" value='<?php echo $nome; ?>'>
                </div>

                <div class="col-md-6">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome" maxlength="255" id="sobrenome" value='<?php echo $sobrenome; ?>'>
                </div>

            </div>

             <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" onblur="validacaoEmail(event)" maxlength="60" size='65' value='<?php echo $email; ?>'>
            </div>

            <div class="form-group col-md-6">
                <label for="dt_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento" value=<?php echo $dt_nascimento; ?>>
            </div>

            <div class="form-group col-md-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" maxlength="50" id="telefone" onkeydown="validateNumber(event);" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value='<?php echo $telefone; ?>'>
                <script type="text/javascript">$("#telefone").mask("(00) 00000-0009");</script>
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" name="rg" maxlength="20" id="rg" onkeydown=validateNumber(event); pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value='<?php echo $rg; ?>'>
                    <script type="text/javascript">$("#rg").mask("00.000.000-9");</script>
                </div>

                <div class="col-md-6">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" name="cpf" size="14" maxlength="11" id="cpf" onkeydown="validateNumber(event);" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" onblur="VerificaCPF();" value='<?php echo $cpf; ?>'>
                    <script type="text/javascript">$("#cpf").mask("000.000.000-00");</script>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" size="10" maxlength="9"  class="form-control" onkeydown="validateNumber(event);" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" onblur="pesquisacep(this.value);" value='<?php echo $cep; ?>'>
                    <script type="text/javascript">$("#cep").mask("00000-000");</script>
                </div>
                <div class="form-group col-md-6">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" id="rua"  class="form-control" value='<?php echo $rua; ?>'>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro"  class="form-control" value='<?php echo $bairro; ?>'>
                </div>
            </div>

            <div class="form-group col-md-8">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" maxlength="255" id="cidade" value='<?php echo $cidade; ?>'>
            </div>

            <div class="form-group col-md-4">
                <label for="uf">Estado</label>
                <input type="text" class="form-control" name="uf" maxlength="2" id="uf" value='<?php echo $uf; ?>'>
            </div>

            <div class="form-group col-md-6">
                <label for="senhaAlteracao">Senha</label>
                <input type="password" class="form-control" name="senhaAlteracao" maxlength="50" id="senhaAlteracao" placeholder="Mantenha em branco para não alterar a senha">
            </div>

            <div class="form-group col-md-6">
                <label for="senhaAlteracao2">Confirme Sua Senha</label>
                <input type="password" class="form-control" name="senhaAlteracao2" maxlength="50" id="senhaAlteracao2" placeholder="Mantenha em branco para não alterar a senha">
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <p><textarea class="form-control" name="descricao" id="descricao" cols="148" rows="10" placeholder="Descrição"></textarea></p>
                </div>
            </div>

            <div class="form-row">

                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" id="salvar"> Salvar </button>
                </div>

                <div class="col-md-6" align="right">
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>

            </div>

        </form>
    </div>

<?php
include "../rodape.php";
?>