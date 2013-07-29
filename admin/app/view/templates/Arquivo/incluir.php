{view}include file="{view}$HEAD{/view}"{/view}

<script>
function enviar(url, form, url_final, mensagem_botao, id_botao, classe_div)
{
	$('#'+id_botao).attr("disabled", true); //desabilita o submit
	$('#'+id_botao).text(mensagem_botao[1]); //muda o valor do botão

	//seta a url e os parâmetros a serem usamos pelo PHP    
	var pars = "/rnd/" + Math.random()*4;
	
    var fd = new FormData();

    $("#"+form+" :input").each(function()
  	{
      	if($(this).is('select'))
      	{
      		fd.append($(this).attr('name'), $(this).val());
      	}
      	
      	if($(this).is('textarea'))
      	{
      		fd.append($(this).attr('name'), $(this).val());
      	}
    });

    $("#"+form+" :text").each(function()
   	{
    	fd.append($(this).attr('name'), $(this).val());
    });
    
    $("#"+form+" :file").each(function()
    {
        fd.append($(this).attr('name'), $("#"+$(this).attr('name'))[0].files[0]);
    });

    $("#"+form+" :radio").each(function()
   	{
    	fd.append($(this).attr('name'), $(this).val());
   	});

    $("#"+form+" :checkbox").each(function()
   	{
    	fd.append($(this).attr('name'), $(this).val());
    });

    $.ajax({
	    type: "POST",
	    url: url+pars,
	    data: fd,
	    processData: false,
	    contentType: false,
	    success: function(data)
	    {
	    	if(classe_div != "")
	        {
	            //limpa o div com os erros
	            LimpaDiv(classe_div);
	        }
	        else
	        {
	           //limpa o span com os erros
	           LimpaSpan('invalid-side-note');
	        }
	           
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
</script>

<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[68]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[70]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm" id="frm" method="post" action="javascript:enviar('{view}$URL_DEFAULT{/view}arquivo/incluir', 'frm', '{view}$URL_DEFAULT{/view}arquivo/incluir', new Array('Enviar','Aguarde...'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm" id="frm" method="post" enctype="multipart/form-data" action="{view}$URL_DEFAULT{/view}arquivo/incluir">-->
		    <input type="file" id="afile" name="afile" /><br/>
		    <div id="msg_afile"></div><br/><br/>
		    
		    <input type="text" id="txt_titulo" name="txt_titulo" /><br/>
		    <div id="msg_txt_titulo"></div><br/><br/>
		    
		    <input type="text" id="texto2" name="texto2" value="teste2" /><br/>
		    
		    <textarea id="text_area" name="text_area"></textarea><br/>
		    <select name="seleciona" id="seleciona">
		    	<option value="">Seleciona</option>
		    	<option value="1">1</option>
		    </select>
		    <input type="radio" name="rad" id="radi" />
		    <input type="checkbox" name="aaa" id="aaa">
		    <button type="submit" id="btn_enviar">Enviar</button>
		</form>
	</div>


<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
<script>CFInstall.check({mode: 'overlay'});</script>
<![endif]-->

{view}include file="{view}$FOOTER{/view}"{/view}