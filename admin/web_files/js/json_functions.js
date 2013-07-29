/**
 * Esta ação serve tanto para incluir quanto para editar
 * @param url - url para onde será enviado os dados
 * @param form - nome do form
 * @param url_final - para onde vai após enviar os dados
 * @param mensagem_botao - array(Enviar, Aguarde..)
 * @param id_botao - id do botão
 * @param classe_div - se for uma div este parametro é informado
 */
function acao(url, form, url_final, mensagem_botao, id_botao, classe_div)
{
    $('#'+id_botao).attr("disabled", true); //desabilita o submit
    $('#'+id_botao).text(mensagem_botao[1]); //muda o valor do botão
	
    //seta a url e os parâmetros a serem usamos pelo PHP    
    var pars = "/rnd/" + Math.random()*4;
	
    //Requisição Ajax
    jQuery.ajax(
    {
        url: url+pars, //URL de destino
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: jQuery('#'+form).serialize(),
        type: 'post',
        dataType: "json", //Tipo de Retorno
        success: function(json)
        {
        	$('.'+classe_div).html('');
            $('.'+classe_div).removeClass(classe_div);
           
            //Se ocorrer tudo certo
            if(json[0]=="1")
            {
                document.location = url_final;
            }
            else
            {
                //libera o botão e manda o valor original
                $('#'+id_botao).attr("disabled", false);
                $('#'+id_botao).text(mensagem_botao[0]);
               
                //Percorre os erros    
                for(var msg_erro in json)
                {
                    erro = $('#'+json[msg_erro]['id_element']);
                    if(classe_div != "")
                    {
                        erro.addClass(classe_div);
                    }
                    else
                    {
                        erro.addClass('invalid-side-note');
                    }
                    erro.html(json[msg_erro]['mensagem']);
                }
            }
        }
    });
}

/**
 * Metodo enviar
 * 
 * Envia o formulário com ou sem arquivo
 * 
 * @param url
 * @param form
 * @param url_final
 * @param mensagem_botao
 * @param id_botao
 * @param classe_div
 */
function enviar(url, form, url_final, mensagem_botao, id_botao, classe_div)
{
    $('#'+id_botao).attr("disabled", true); //desabilita o submit
    $('#'+id_botao).text(mensagem_botao[1]); //muda o valor do botão

    //seta a url e os parâmetros a serem usamos pelo PHP    
    var pars = "/rnd/" + Math.random()*4;
	
    var fd = new FormData();
    
    $("#"+form+" :input").each(function()
    {
        if($(this).attr('name') != undefined)
        {
            if($(this).is('select'))
            {
                fd.append($(this).attr('name'), $(this).val());
            }
        }
      	
        if($(this).attr('name') != undefined)
        {
            if($(this).is('textarea'))
            {
                fd.append($(this).attr('name'), $(this).val());
            }
        }
    });

    $("#"+form+" :text").each(function()
    {
        fd.append($(this).attr('name'), $(this).val());
    });
    
    $("#"+form+" :hidden").each(function()
    {
        if($(this).attr('name') != undefined)
        {
            fd.append($(this).attr('name'), $(this).val());
        }
    });
    
    $("#"+form+" :file").each(function()
    {
        if($(this).attr('name') != undefined)
        {
            fd.append($(this).attr('name'), $("#"+$(this).attr('name'))[0].files[0]);
        }
    });

    $("#"+form+" :radio").each(function()
    {
        if($(this).attr('name') != undefined)
        {
            if ($(this).is(':checked'))
            {
                fd.append($(this).attr('name'), $(this).val());
            }
    		
        }
    });

    $("#"+form+" :checkbox").each(function()
    {
    	if($(this).attr('name') != undefined)
        {
	        if ($(this).is(':checked'))
	        {
	            fd.append($(this).attr('name'), $(this).val());
	        }
        }
    });

    $.ajax({
        type: "POST",
        url: url+pars,
        data: fd,
        processData: false,
        contentType: false,
        success: function(data)
        {
        	$('.'+classe_div).html('');
            $('.'+classe_div).removeClass(classe_div);
	           
            //transforma os dados em objetos
            dados = $.parseJSON(data);

            if(dados['1'] == 1)
            {
                document.location = url_final;
            }
            else
            {
                //libera o botão e manda o valor original
                $('#'+id_botao).attr("disabled", false);
                $('#'+id_botao).text(mensagem_botao[0]);
	               
                //Percorre os erros
                for(var msg_erro in dados)
                {
                    erro = $('#'+dados[msg_erro]['id_element']);
                    if(classe_div != "")
                    {
                        erro.addClass(classe_div);
                    }
                    else
                    {
                        erro.addClass('invalid-side-note');
                    }
                    erro.html(dados[msg_erro]['mensagem']);
                }
            }
        }
    });
}

/**
 * se for um span é utilizado este método
 * @param classe - nome da classe
 */
function LimpaSpan(classe)
{
    todos_elementos = $('span').get();
	
    for (var i=0; i<todos_elementos.length; i++)
    {
        var el = todos_elementos[i];
		
        if (el.className == classe)
        {
            span = $('#'+el.id);
            span.removeClass('invalid-side-note');
            span.html('');
        }
    }
}

/**
 * se for uma div é utilizado este método
 * @param classe - nome da classe
 */
function LimpaDiv(classe)
{
    todos_elementos = $('div').get();
	
    for (var i=0; i<todos_elementos.length; i++)
    {
        var el = todos_elementos[i];
		
        if (el.className == classe)
        {
            div = $('#'+el.id);
            div.removeClass(classe);
            div.html('');
        }
    }
}

/**
 * exclusão de um registro
 * @param url - url para enviar o cod_id para o banco e ser excluido
 * @param url_direcionamento - url final para onde vai após a exclusão
 * @param msg_pegunta - pergunta a ser feita se deseja excluir ou não
 */
function exclusao(url, url_direcionamento, msg_pegunta)
{
    if(confirm(msg_pegunta))
    {
        //deixa o botão opaco
        $(".delete").css({
            opacity: 0.5
        });
		
        //remove a ação onclick para não ficar clicando
        $(".delete").removeAttr("onclick");
		
        //seta a url e os parâmetros a serem usamos pelo PHP             
        var pars = "/rnd/" + Math.random()*4;

        //Requisição Ajax
        jQuery.ajax(
        {
            url: url+pars, //URL de destino
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            type: 'post',
            dataType: "json", //Tipo de Retorno
            success: function(json)
            {
                //Verifica a resposta do JSON
                if(json[0] == "1")
                {
                    document.location = url_direcionamento;
                }
            }
        });
    }
}

/**
 * quando clica no checkbox para editar a senha
 */
function checkSenha()
{
    if($('input[name=check_senha]').prop('checked') == true)
    {
        $("#senhas").show('slow');
        $("#txt_senha").removeAttr('disabled');
        $("#txt_confirma_senha").removeAttr('disabled');
    }
    else
    {
        $("#senhas").hide('slow');
        $("#txt_senha").attr('disabled','disabled');
        $("#txt_confirma_senha").attr('disabled','disabled');

        $("#txt_senha").val('');
        $("#txt_confirma_senha").val('');
    }
}

/**
 * verifica o campo de login ao digital em admin/usuarios/incluir e admin/usuarios/editar
 * @param url
 * @param campo
 * @param txt_login
 * @param cod_id
 */
function verificaLogin(url, campo, campo_msg_erro, txt_login, cod_id_tipo)
{
    var pars = "/rnd/" + Math.random() * 4;
    var valores = null;
	
    if(txt_login != '' && cod_id_tipo == undefined)
    {
        valores = "&"+campo+"="+txt_login;
    }
    else if(txt_login != '' && cod_id_tipo != '')
    {
        valores = "&"+campo+"="+txt_login+"&cod_id_tipo="+cod_id_tipo;
    }
	
    jQuery.ajax(
    {
        url: url+pars, //URL de destino
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        data: valores,
        type: 'post',
        dataType: "json", //Tipo de Retorno
        success: function(json)
        {
            if(json[0] == 1)
            {
                $("#"+campo_msg_erro).html(json[1]);
                $('#'+campo).val("");
            }
            else
            {
                $("#"+campo_msg_erro).html('');
            }
        }
    });
}

/**
 * Se o usuário não tiver permissão ele voltar para o login
 * @param url - url de retorno
 */
function voltar(url)
{
    document.location.replace(url);
}

/**
 * Quando o usuário digita o cep, resgatando o endereço, cidade, estado, bairro.
 * Primeiro entra nesta função, após entra em getCidade
 * @param url - url para onde será feita a requisição dos dados do cep
 * @param urlCidades - url para onde será feita a requisição dos dados das cidades
 * @param valor_cep - valor digitado no input
 * @param campo_erro - nome do campo de erro
 * @param campo_endereco - nome do campo de endereço
 * @param campo_bairro - nome do campo de bairro
 * @param campo_estado - nome do campo de estado
 * @param campo_cidade - nome do campo de cidade
 * @param div_cidade - nome da div cidade
 */
function getCep(url, urlCidades, valor_cep, campo_erro, campo_endereco, campo_bairro, campo_estado, campo_cidade, div_cidade)
{
    //Verifica se o cep possui de 8 a mais caracteres
    if (valor_cep.length >= 8)
    {
        //seta a url e os parâmetros a serem usamos pelo PHP	  		
        var pars = "/rnd/" + Math.random() * 4;

        //Requisição Ajax
        jQuery.ajax({
            url : url + pars, //URL de destino
            contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
            data : "&txt_cep=" + valor_cep,
            type : 'post',
            dataType : "json", //Tipo de Retorno
            success : function(json)
            {
                //Verifica se deu resposta			
                if (json.length > 0)
                {
                    //Joga a resposta nos textfields		
                    $('#'+campo_endereco).val(json[0]);
                    $('#'+campo_bairro).val(json[1]);

                    //Seleciona o estado encontrado
                    $("#"+campo_estado+" option[value='" + json[3] + "']").attr("selected", true);

                    //Busca as cidades conforme o estado selecionado
                    getCidade(urlCidades, json[3], campo_cidade, div_cidade, json[2]);

                    //limpa o campo de erro
                    $('#'+campo_erro).html('');
                }
                else
                {
                    //popula o campo de erro
                    $('#'+campo_erro).html('CEP não encontrado');
                }
            }
        });
    }
}

/**
 * Busca as cidades conforme o estado selecionado
 * @param url - url para envio do codigo da cidade
 * @param combo_value
 * @param combo_name
 * @param div_cidades
 * @param cidade_selecionada
 */
function getCidade(url, combo_value, combo_name, div_cidades, cidade_selecionada)
{
    //seta a url e os parâmetros a serem usamos pelo PHP	  		
    var pars = "/rnd/" + Math.random() * 4;

    //utiliza objeto Ajax da biblioteca Prototype
    //Requisição Ajax
    $.ajax({
        url : url + pars, //URL de destino
        contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
        data : "&cod_uf=" + combo_value,
        type : 'post',
        dataType : "json", //Tipo de Retorno
        success : function(json)
        {
            if (json.length > 0)
            {
                //Verifica se deu resposta			
                var quantidade_cidades = json.length;

                //Monta a combo com o estado selecionado
                var combo_atualizada = "<select name='" + combo_name + "' id='" + combo_name + "'>";

                //Opção em branco
                combo_atualizada += "<option value=''>--Selecione--</option>";

                //popula a combo com as cidades do estado selecionado
                for(var i = 0; i < quantidade_cidades; i++)
                {
                    //Verifica se esta é a cidade selecionada
                    if ((cidade_selecionada != "undefined" || cidade_selecionada != null) && json[i]['cod_id'] == cidade_selecionada)
                    {
                        //Atribui a propriedade selected na combo
                        var seleciona_cidade = "selected='selected'";
                    }
                    else
                    {
                        //Limpa a variavel para não inserir selected nas demais options
                        seleciona_cidade = "";
                    }

                    //Adiciona os valores na combo 
                    combo_atualizada += "<option value='" + json[i]['cod_id'] + "' "+ seleciona_cidade + ">"+ json[i]['txt_cidade'] + "</option>";
                }
                //Fecha a combo
                combo_atualizada += "</select>";

                //Joga a combo na respectiva div				   
                $('#' + div_cidades).html(combo_atualizada);
            }
        }
    });
}