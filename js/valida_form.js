$ (document).ready(function(){

    $('#descricao').hide();

    $("#perfil" ).change(function() {
        if ( $("#perfil" ).val() == "pas") {
            $('#descricao').show();
        }else{
            $('#descricao').hide();
        }
    });

    $("#salvar").click(function(){

        var cont = 0;
        if ($("#nome").val() == "") {
    
            alert("É necessario preencher o nome");
            $("#nome").focus();
            cont++;
            return false;
        }

        if ($("#sobrenome").val() == "") {
    
            alert("É necessario preencher o sobrenome");
            $("#sobrenome").focus();
            cont++;
            return false;
        }

        if ($("#email").val() == "") {
    
            alert("É necessario preencher o email");
            $("#email").focus();
            cont++;
            return false;
        }else{
            var email = $('input[name=email]').val();
            if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
                // valid email
              } else {
                alert("Formato de email invalido");
                $("#email").focus();
                cont++;
                return false;
            }
        }

        if ($("#dt_nascimento").val() == "") {
    
            alert("É necessario preencher a Data de Nascimento");
            $("#dt_nascimento").focus();
            cont++;
            return false;
        }
        
        if ($("#telefone").val() == "") {
    
            alert("É necessario preencher o telefone");
            $("#telefone").focus();
            cont++;
            return false;
        }

        if ($("#rg").val() == "") {
    
            alert("É necessario preencher o RG");
            $("#rg").focus();
            cont++;
            return false;
        }
        
        if ($("#cpf").val() == "") {
    
            alert("É necessario preencher o CPF");
            $("#cpf").focus();
            cont++;
            return false;
        }

        if ($("#cep").val() == "") {
    
            alert("É necessario preencher o CEP");
            $("#cep").focus();
            cont++;
            return false;
        }

        if ($("#login").val() == "") {
    
            alert("É necessario preencher a login");
            $("#login").focus();
            cont++;
            return false;
        }


        if($("#senhaAlteracao").length > 0){
            if ($("#senhaAlteracao").val() != "") {

                if ($("#senhaAlteracao").val() != $("#senhaAlteracao2").val()) {
        
                    alert("As senhas não conferem");
                    $("#senhaAlteracao").val('');
                    $("#senhaAlteracao2").val('');
                    $("#senhaAlteracao").focus();
                    cont++;
                    //return false;
                }
            }
        }else{
            if ($("#senha").val() == "") {
    
                alert("É necessario preencher a senha");
                $("#senha").focus();
                cont++;
                return false;
            }else{
               if ($('#senha').val().length < 8){
                    alert("A senha deve ser maior que 8 digitos");
                    $("#senha").focus();
                    cont++;
                    return false;
               }
            }
    
            if ($("#senha2").val() == "") {
        
                alert("É necessario confirmar a senha");
                $("#senha2").focus();
                cont++;
                return false;
            }
    
            if ($("#senha").val() != $("#senha2").val()) {
        
                alert("As senhas não conferem");
                $("#senha").val('');
                $("#senha2").val('');
                $("#senha").focus();
                cont++;
                return false;
            }

        }
        
        if ($("#perfil").val() == "0") {
    
            alert("É necessario selecionar um perfil");
            $("#perfil").focus();
            cont++;
            return false;
        }

        if ($("#perfil").val() == "pas") {

            if ($("#descricao").val() == "") {
                alert("É necessario preencher a descrição");
                $("#descricao").focus();
                cont++;
                return false;
            }
        }
        
        if (cont == 0) {
           $("#cadastro_usuario").submit();
        }
    })
});