var image_handling_file  = window.parent.image_handling_file;
var url_padrao   = window.parent.url_padrao;
var altura_crop  = window.parent.altura_crop;
var largura_crop = window.parent.largura_crop;
var altura_cropada = window.parent.altura_cropada;
var largura_cropada = window.parent.largura_cropada;
var arq_din = window.parent.arq_din;
var imagem_edicao = window.parent.imagem_edicao ;




function preview1(img, selection)
{  
	$('#x11').val(selection.x1);
	$('#y11').val(selection.y1);
	$('#x21').val(selection.x2);
	$('#y21').val(selection.y2);
	$('#w1').val(selection.width);
	$('#h1').val(selection.height);
} 

function preview2(img, selection)
{  
	$('#x12').val(selection.x1);
	$('#y12').val(selection.y1);
	$('#x22').val(selection.x2);
	$('#y22').val(selection.y2);
	$('#w2').val(selection.width);
	$('#h2').val(selection.height);
} 

function preview3(img, selection)
{  
	$('#x13').val(selection.x1);
	$('#y13').val(selection.y1);
	$('#x23').val(selection.x2);
	$('#y23').val(selection.y2);
	$('#w3').val(selection.width);
	$('#h3').val(selection.height);
} 
function deleteimage1(large_image, thumbnail_image)
{
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="sucesso")
			{
				$('#nome_img1').val("");
				$('#nome_img_cropada1').val("");
				$('#upload_link1').show();
				$('#todo_conteudo1').hide();
				$('#upload_status1').hide();
			}
			else
			{
				$('#upload_status1').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
	
	
}




function deleteimage2(large_image, thumbnail_image)
{
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="sucesso")
			{
				$('#nome_img2').val("");
				$('#nome_img_cropada2').val("");
				$('#upload_link2').show();
				$('#todo_conteudo2').hide();
				$('#upload_status2').hide();
			}
			else
			{
				$('#upload_status2').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
	
	
}



function deleteimage3(large_image, thumbnail_image)
{
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'a=delete&large_image='+large_image+'&thumbnail_image='+thumbnail_image,
		cache: false,
		success: function(response)
		{
			
			response = unescape(response);
			var response = response.split("|");
			var responseType = response[0];
			var responseMsg = response[1];
			if(responseType=="sucesso")
			{
				$('#nome_img3').val("");
				$('#nome_img_cropada3').val("");
				$('#upload_link3').show();
				$('#todo_conteudo3').hide();
				$('#upload_status3').hide();
			}
			else
			{
				$('#upload_status3').show().html('<h1>Unexpected Error</h1><p>Please try again</p>'+response);
			}
		}
	});
	
	
}

function inicializacaoInclusao(){
	$.ajax({
		type: 'POST',
		url: image_handling_file,
		data: 'reiniciar=Reiniciar',
		cache: false,
		success: function(response){
				
		
			}
		});
		
}

function inicializacaoEdicao(){
	$.ajax({
		type: 'POST',
		url: imagem_edicao,
		data: 'reiniciar=Reiniciar',
		cache: false,
		success: function(response){
				
		
			}
		});
		
}


$(document).ready(function ()
{

	if($('#flag').val() == 'inclusao'){
		inicializacaoInclusao();
		
		$('#cancelar_upload1').hide();
		$('#todo_conteudo1').hide();	
		
		//FUNÇÃO DE UPLOAD DA IMAGEM ORIGINAL

			new AjaxUpload($('#upload_link1'), {
				action: image_handling_file,
				name: 'image',
				onSubmit: function(file, ext){
					$('#upload_link1').attr('disabled', true);
					$('#upload_link1').text('Aguarde..');
				},
				onComplete: function(file, response){
					$('#upload_link1').attr('disabled', false);
					$('#upload_link1').text('Escolher Imagem');
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{
						
						var current_width   = response[2];
						var current_height  = response[3];
						var nome_da_imagem1 = response[4];
		
						$('#todo_conteudo1').show();
						$('#cancelar_upload1').show();
						$('#upload_link1').hide();
						$('#nome_img1').val(nome_da_imagem1);
						$('#save_thumb1').show();
				
						$('#uploaded_image1').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" />');
		
							var altura_visualizador_original = current_height;
							var largura_visualizador_original = current_width;
							
							$('#uploaded_image1').find('#thumbnail1').width(largura_visualizador_original);
							$('#uploaded_image1').find('#thumbnail1').height(altura_visualizador_original);
							$('#thumbnail_preview1').hide();
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
		
							$('#thumbnail_form1').show();
							$('#upload_link1').attr("disabled", false);
							$('#upload_link1').text("Escolher imagem");
						}else if(responseType=="error"){
							$('#upload_status1').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image1').html('');
							$('#thumbnail_form1').hide();
							$('#upload_link1').attr("disabled", false);
							$('#upload_link1').text("Escolher imagem");
						}else{
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image1').html('');
							$('#thumbnail_form1').hide();
							$('#upload_link1').attr("disabled", false);
							$('#upload_link1').text("Escolher imagem");
						}
				}
			});	

		
		//AÇÃO RESPONSÁVEL PELO SALVAMENTO DA IMAGEM CROPADA
		$('#save_thumb1').click(function() {		
		
			//Pega as coordenadas da imagem
			var x11 = $('#x11').val() ;
			var y11 = $('#y11').val() ;
			var x21 = $('#x21').val() ;
			var y21 = $('#y21').val() ;
			var w1 = $('#w1').val() ;
			var h1 = $('#h1').val() ;
		
			//Se as coordenadas estiverem vazias, o cliente não cropou a imagem, então é retornada uma mensagem pedindo para que seja cropada
			if(x11=="" || y11=="" || x21=="" || y21=="" || w1=="" || h1==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
		
				//Desabilita a área de crop e o botão de salvar
				$('#save_thumb1').attr("disabled", true);
				$('#save_thumb1').text("Aguarde...");
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ disable: true, hide: true }); 
		
				//Manda os dados para o php cropar a imagem e salvar no FTP
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x11+'&y1='+y11+'&x2='+x21+'&y2='+y21+'&w='+w1+'&h='+h1+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){
		
						//Limpa os dados de coordenadas
						$('#x11').val("") ;
						$('#y11').val("") ;
						$('#x21').val("") ;
						$('#y21').val("") ;
						$('#w1').val("")  ;
						$('#h1').val("")  ;
									
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						$("#nome_img_cropada1").val(nome_imagem_cropada);
						$('#cancelar_upload1').hide();
						$('#upload_link1').show();
		
						if(responseType=="success"){
		
							$('#upload_link1').hide();
							$('#upload_status1').show().html('<p>Imagem salva com sucesso!</p>');
							$('#uploaded_image1').html('<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><div id="deletar_imagem1" ><a href="javascript:deleteimage1(\''+responseLargeImage+'\', \''+responseThumbImage+'\');" >Deletar Imagem</a></div>');							
							$('#thumbnail_form1').hide();
							$('#save_thumb1').attr("disabled", false);
							$('#save_thumb1').text("Salvar");
							$('#save_thumb1').hide();
		
						}else{
							 $('#x11').val("") ;
							 $('#y11').val("") ;
							 $('#x21').val("") ;
							 $('#y21').val("") ;
							 $('#w1').val("")  ;
							 $('#h1').val("")  ;
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
							$('#save_thumb1').attr("disabled", false);	
							$('#save_thumb1').text("Salvar");					
							
						}
					}
				});
				
				return false;
			}
		
		});
		
		$('#cancelar_upload1').click(function(){
			var valorImagemOriginal1 =  $('#nome_img1').val();	
			$('#cancelar_upload1').attr("disabled", true);
			$('#cancelar_upload1').text("Aguarde...");
			$('#nome_img1').val("");
			$('#nome_img_cropada1').val("");
			$('#x11').val("") ;
			$('#y11').val("") ;
			$('#x21').val("") ;
			$('#y21').val("") ;
			$('#w1').val("")  ;
			$('#h1').val("")  ;
			
			$.ajax({
				type: 'post',
				data: 'flag=cancelar&campo='+valorImagemOriginal1,
				url: image_handling_file,
				success: function(retorno){
					$('#nome_img1').val("");
					$('#nome_img_cropada1').val("");
					$('#upload_link1').show();
					$('#todo_conteudo1').hide();
					$('#upload_status1').hide();
					$('#cancelar_upload1').hide();
					$('#cancelar_upload1').attr("disabled", false);
					$('#cancelar_upload1').text("Cancelar");
				}
			});		
		
		});
		
		
		//Segundo idioma
		
		$('#cancelar_upload2').hide();
		$('#todo_conteudo2').hide();	
		
		//FUNÇÃO DE UPLOAD DA IMAGEM ORIGINAL
		if($('#upload_link2').length > 0){
			new AjaxUpload($('#upload_link2'), {
				action: image_handling_file,
				name: 'image',
				onSubmit: function(file, ext){
					$('#upload_link2').attr('disabled', true);
					$('#upload_link2').text('Aguarde..');
				},
				onComplete: function(file, response){
					$('#upload_link2').attr('disabled', false);
					$('#upload_link2').text('Escolher Imagem');
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{
						
						var current_width   = response[2];
						var current_height  = response[3];
						var nome_da_imagem2 = response[4];
		
						$('#todo_conteudo2').show();
						$('#cancelar_upload2').show();
						$('#upload_link2').hide();
						$('#nome_img2').val(nome_da_imagem2);
						$('#save_thumb2').show();
				
						$('#uploaded_image2').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" />');
		
							var altura_visualizador_original = current_height;
							var largura_visualizador_original = current_width;
							
							$('#uploaded_image2').find('#thumbnail2').width(largura_visualizador_original);
							$('#uploaded_image2').find('#thumbnail2').height(altura_visualizador_original);
							$('#thumbnail_preview2').hide();
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
		
							$('#thumbnail_form2').show();
							$('#upload_link2').attr("disabled", false);
							$('#upload_link2').text("Escolher imagem");
						}else if(responseType=="error"){
							$('#upload_status2').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image2').html('');
							$('#thumbnail_form2').hide();
							$('#upload_link2').attr("disabled", false);
							$('#upload_link2').text("Escolher imagem");
						}else{
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image2').html('');
							$('#thumbnail_form2').hide();
							$('#upload_link2').attr("disabled", false);
							$('#upload_link2').text("Escolher imagem");
						}
				}
			});	
		}
		
		//AÇÃO RESPONSÁVEL PELO SALVAMENTO DA IMAGEM CROPADA
		$('#save_thumb2').click(function() {		
		
			//Pega as coordenadas da imagem
			var x12 = $('#x12').val() ;
			var y12 = $('#y12').val() ;
			var x22 = $('#x22').val() ;
			var y22 = $('#y22').val() ;
			var w2 = $('#w2').val() ;
			var h2 = $('#h2').val() ;
		
			//Se as coordenadas estiverem vazias, o cliente não cropou a imagem, então é retornada uma mensagem pedindo para que seja cropada
			if(x12=="" || y12=="" || x22=="" || y22=="" || w2=="" || h2==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
		
				//Desabilita a área de crop e o botão de salvar
				$('#save_thumb2').attr("disabled", true);
				$('#save_thumb2').text("Aguarde...");
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ disable: true, hide: true }); 
		
				//Manda os dados para o php cropar a imagem e salvar no FTP
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x12+'&y1='+y12+'&x2='+x22+'&y2='+y22+'&w='+w2+'&h='+h2+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){
		
						//Limpa os dados de coordenadas
						$('#x12').val("") ;
						$('#y12').val("") ;
						$('#x22').val("") ;
						$('#y22').val("") ;
						$('#w2').val("")  ;
						$('#h2').val("")  ;
									
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						$("#nome_img_cropada2").val(nome_imagem_cropada);
						$('#cancelar_upload2').hide();
						$('#upload_link2').show();
		
						if(responseType=="success"){
		
							$('#upload_link2').hide();
							$('#upload_status2').show().html('<p>Imagem salva com sucesso!</p>');
							$('#uploaded_image2').html('<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><div id="deletar_imagem2" ><a href="javascript:deleteimage2(\''+responseLargeImage+'\', \''+responseThumbImage+'\');" >Deletar Imagem</a></div>');							
							$('#thumbnail_form2').hide();
							$('#save_thumb2').attr("disabled", false);
							$('#save_thumb2').text("Salvar");
							$('#save_thumb2').hide();
		
						}else{
							 $('#x12').val("") ;
							 $('#y12').val("") ;
							 $('#x22').val("") ;
							 $('#y22').val("") ;
							 $('#w2').val("")  ;
							 $('#h2').val("")  ;
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
							$('#save_thumb2').attr("disabled", false);	
							$('#save_thumb2').text("Salvar");					
							
						}
					}
				});
				
				return false;
			}
		
		});
		
		$('#cancelar_upload2').click(function(){
			var valorImagemOriginal2 =  $('#nome_img2').val();	
			$('#cancelar_upload2').attr("disabled", true);
			$('#cancelar_upload2').text("Aguarde...");
			$('#nome_img2').val("");
			$('#nome_img_cropada2').val("");
			 $('#x12').val("") ;
			 $('#y12').val("") ;
			 $('#x22').val("") ;
			 $('#y22').val("") ;
			 $('#w2').val("")  ;
			 $('#h2').val("")  ;
			 
			$.ajax({
				type: 'post',
				data: 'flag=cancelar&campo='+valorImagemOriginal2,
				url: image_handling_file,
				success: function(retorno){
					$('#nome_img2').val("");
					$('#nome_img_cropada2').val("");
					$('#upload_link2').show();
					$('#todo_conteudo2').hide();
					$('#upload_status2').hide();
					$('#cancelar_upload2').hide();
					$('#cancelar_upload2').attr("disabled", false);
					$('#cancelar_upload2').text("Cancelar");
				}
			});		
		
		});
		
		//terceiro idioma
		$('#cancelar_upload3').hide();
		$('#todo_conteudo3').hide();	
		
		//FUNÇÃO DE UPLOAD DA IMAGEM ORIGINAL
		if($('#upload_link3').length> 0){
			new AjaxUpload($('#upload_link3'), {
				action: image_handling_file,
				name: 'image',
				onSubmit: function(file, ext){
					$('#upload_link3').attr('disabled', true);
					$('#upload_link3').text('Aguarde..');
				},
				onComplete: function(file, response){
					$('#upload_link3').attr('disabled', false);
					$('#upload_link3').text('Escolher Imagem');
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{
						
						var current_width   = response[2];
						var current_height  = response[3];
						var nome_da_imagem3 = response[4];
		
						$('#todo_conteudo3').show();
						$('#cancelar_upload3').show();
						$('#upload_link3').hide();
						$('#nome_img3').val(nome_da_imagem3);
						$('#save_thumb3').show();
				
						$('#uploaded_image3').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" />');
		
							var altura_visualizador_original = current_height;
							var largura_visualizador_original = current_width;
							
							$('#uploaded_image3').find('#thumbnail3').width(largura_visualizador_original);
							$('#uploaded_image3').find('#thumbnail3').height(altura_visualizador_original);
							$('#thumbnail_preview3').hide();
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
		
							$('#thumbnail_form3').show();
							$('#upload_link3').attr("disabled", false);
							$('#upload_link3').text("Escolher imagem");
						}else if(responseType=="error"){
							$('#upload_status3').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image3').html('');
							$('#thumbnail_form3').hide();
							$('#upload_link3').attr("disabled", false);
							$('#upload_link3').text("Escolher imagem");
						}else{
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image3').html('');
							$('#thumbnail_form3').hide();
							$('#upload_link3').attr("disabled", false);
							$('#upload_link3').text("Escolher imagem");
						}
				}
			});	
		}
		
		//AÇÃO RESPONSÁVEL PELO SALVAMENTO DA IMAGEM CROPADA
		$('#save_thumb3').click(function() {		
		
			//Pega as coordenadas da imagem
			var x13 = $('#x13').val() ;
			var y13 = $('#y13').val() ;
			var x23 = $('#x23').val() ;
			var y23 = $('#y23').val() ;
			var w3 = $('#w3').val() ;
			var h3 = $('#h3').val() ;
		
			//Se as coordenadas estiverem vazias, o cliente não cropou a imagem, então é retornada uma mensagem pedindo para que seja cropada
			if(x13=="" || y13=="" || x23=="" || y23=="" || w3=="" || h3==""){
				alert("Primeiro você precisa recortar a imagem");
				return false;
			
			}else{
		
				//Desabilita a área de crop e o botão de salvar
				$('#save_thumb3').attr("disabled", true);
				$('#save_thumb3').text("Aguarde...");
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ disable: true, hide: true }); 
		
				//Manda os dados para o php cropar a imagem e salvar no FTP
				$.ajax({
					type: 'POST',
					url: image_handling_file,
					data: 'save_thumb_inc=Save Thumbnail&x1='+x13+'&y1='+y13+'&x2='+x23+'&y2='+y23+'&w='+w3+'&h='+h3+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){
		
						//Limpa os dados de coordenadas
						$('#x13').val("") ;
						$('#y13').val("") ;
						$('#x23').val("") ;
						$('#y23').val("") ;
						$('#w3').val("")  ;
						$('#h3').val("")  ;
									
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nome_imagem_cropada = response[3];
						$("#nome_img_cropada3").val(nome_imagem_cropada);
						$('#cancelar_upload3').hide();
						$('#upload_link3').show();
		
						if(responseType=="success"){
		
							$('#upload_link3').hide();
							$('#upload_status3').show().html('<p>Imagem salva com sucesso!</p>');
							$('#uploaded_image3').html('<img src="'+url_padrao+responseThumbImage+'" alt="Thumbnail Image"  /><br /><div id="deletar_imagem3" ><a href="javascript:deleteimage3(\''+responseLargeImage+'\', \''+responseThumbImage+'\');" >Deletar Imagem</a></div>');							
							$('#thumbnail_form3').hide();
							$('#save_thumb3').attr("disabled", false);
							$('#save_thumb3').text("Salvar");
							$('#save_thumb3').hide();
		
						}else{
							$('#x13').val("") ;
							$('#y13').val("") ;
							$('#x23').val("") ;
							$('#y23').val("") ;
							$('#w3').val("")  ;
							$('#h3').val("")  ;	
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
							$('#save_thumb3').attr("disabled", false);	
							$('#save_thumb3').text("Salvar");					
							
						}
					}
				});
				
				return false;
			}
		
		});
		
		$('#cancelar_upload3').click(function(){
			var valorImagemOriginal3 =  $('#nome_img3').val();	
			$('#cancelar_upload3').attr("disabled", true);
			$('#cancelar_upload3').text("Aguarde...");
			$('#nome_img3').val("");
			$('#nome_img_cropada3').val("");
			$('#x13').val("") ;
			$('#y13').val("") ;
			$('#x23').val("") ;
			$('#y23').val("") ;
			$('#w3').val("")  ;
			$('#h3').val("")  ;
			
			$.ajax({
				type: 'post',
				data: 'flag=cancelar&campo='+valorImagemOriginal3,
				url: image_handling_file,
				success: function(retorno){
					$('#nome_img3').val("");
					$('#nome_img_cropada3').val("");
					$('#upload_link3').show();
					$('#todo_conteudo3').hide();
					$('#upload_status3').hide();
					$('#cancelar_upload3').hide();
					$('#cancelar_upload3').attr("disabled", false);
					$('#cancelar_upload3').text("Cancelar");
				}
			});		
		
		});
		

		
		
	}else{
		inicializacaoEdicao();
		$('#cancelar_upload1').hide();
		$('#cancelar_recropagem1').hide();
		$('#salvar_recropagem1').hide();
		
		
		
		var imagem_cropada1  = $('#nome_img_cropada1').val();
		
		if(imagem_cropada1 != ""){
			$('#imagem_cropada_ftp1').html('<img src="'+arq_din+imagem_cropada1+'">');
			$('#deletar1').attr('disabled', false);
			$('#editar1').attr('disabled', false);
			$('#nova_imagem1').attr('disabled', true);
			 
		}else{
			$('#deletar1').attr('disabled', true);
			$('#editar1').attr('disabled', true);
			$('#nova_imagem1').attr('disabled', false);
		}



		
		//Ação do botão de deletar
		$('#deletar1').click(function(){
			$('#deletar1').attr("disabled", true);
			$('#deletar1').text("Aguarde...");
			var nome_imagem_original1 = $('#nome_img1').val();
			var nome_imagem_cropada1 = $('#nome_img_cropada1').val();		
			var id = $('#id1').val() ;
			
			if(nome_imagem_original1 == ""){
				alert("Não há imagem para ser deletada!!");
				$('#deletar1').attr("disabled", false);
				$('#deletar1').text("Deletar imagem atual");
			}else{
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original1+'&nome_imagem_cropada='+nome_imagem_cropada1+'&id='+id,
					cache: false,
					success: function(response){
							$('#nome_img1').val("");
						    $('#nome_img_cropada1').val("");
						    $('#uploaded_image1').empty();
						    $('#imagem_cropada_ftp1').hide();
							$('#editar1').attr('disabled', true);
							$('#deletar1').text("Deletar imagem atual");
							$('#nova_imagem1').attr('disabled', false);
							
							
					}
				});
			}
			
		
		});
		
		//Ação do botão de editar
		$('#editar1').click( function (){
			
			
			$('#todo_conteudo1').hide();
			$('#save_thumb1').hide();
			$('#cancelar_recropagem1').show();
			
			var valor_inicial_campo_original = $('#nome_img1').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada1').val();
			
			
			if(valor_inicial_campo_original == ""){	
				alert("Não há imagem para editar!!");

			}else{
				var imagem_original1 = $('#nome_img1').val();
				var imagem_cropada1  = $('#nome_img_cropada1').val();
				
				$('#uploaded_image1').show(); 
				$('#thumbnail_form1').show();
				$('#todo_conteudo1').show();					
				$('#uploaded_image1').html('<img src="'+arq_din+imagem_original1+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" />');
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
				$('#thumbnail_form1').show();
				$('#imagem_cropada_ftp1').hide();
				$('#salvar_recropagem1').show();
				$('#deletar1').hide();
				$('#editar1').hide();
				$('#nova_imagem1').hide();
				
			}
		});
		
		//AÇÃO DE UPLOAD DA IMAGEM ORIGINAL
			new AjaxUpload($('#nova_imagem1'), {
				action: imagem_edicao,
				name: 'image',
				onSubmit: function(file, ext){
					$('#nova_imagem1').attr('disabled', true);
					$('#nova_imagem1').text('Aguarde..');
				},
				onComplete: function(file, response){
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{

							var current_width   = response[2];
							var current_height  = response[3];
							var nome_da_imagem1 = response[4];

							$('#save_thumb1').show();
							$('#nova_imagem1').attr("disabled", false);
							$('#nova_imagem1').text("Inserir imagem");
							$('#nova_imagem1').hide();
							$('#uploaded_image1').show();
							$('#cancelar_upload1').show();
							$('#nome_img1').val(nome_da_imagem1);
							$('#todo_conteudo1').show();
							$('#uploaded_image1').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail1" alt="Create Thumbnail" />');
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
							$('#trocar1').text("Escolher imagem");
							
					}else if(responseType=="error"){
							$('#nova_imagem1').attr("disabled", false);
							$('#nova_imagem1').text("Inserir imagem");
							$('#upload_status1').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image1').html('');
							$('#thumbnail_form1').hide();
					}else{
							$('#nova_imagem1').attr("disabled", false);
							$('#nova_imagem1').text("Inserir imagem");
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image1').html('');
							$('#thumbnail_form1').hide();
					}


				}

			});


		
		
		
		//Faz o salvamento da recropagem da imagem
		$('#salvar_recropagem1').click(function(){
			$('#salvar_recropagem1').attr("disabled", true); 
			$('#salvar_recropagem1').text('Aguarde..');
			
			var x11 = $('#x11').val();
			var y11 = $('#y11').val();
			var x21 = $('#x21').val();
			var y21 = $('#y21').val();
			var w1 = $('#w1').val();
			var h1 = $('#h1').val();
			
			if(x11=="" || y11=="" || x21=="" || y21=="" || w1=="" || h1==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#salvar_recropagem1').attr("disabled", false); 
				$('#salvar_recropagem1').text('Salvar Recropagem');
				return false;
			}else{
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ disable: true, hide: true }); 
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'salvar_recropagem=salvar&x1='+x11+'&y1='+y11+'&x2='+x21+'&y2='+y21+'&w='+w1+'&h='+h1+'&imagem_original_banco='+$('#nome_img1').val()+'&imagem_cropada_banco='+$('#nome_img_cropada1').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){						
						$('#salvar_recropagem1').attr("disabled", false); 
						$('#salvar_recropagem1').text('Salvar recropagem');
						
						var resposta = response.split('|');
						responseType = resposta[0];
						nomeImagem = resposta[3];
						$('#x11').val("");
						$('#y11').val("");
						$('#x21').val("");
						$('#y21').val("");
						$('#w1').val("");
						$('#h1').val("");
						if(responseType=="success"){
							$('#cancelar_recropagem1').show();
							$('#nome_img_cropada1').val(nomeImagem);
							var id = $('#id1').val();
							var  nome_img_original = $('#nome_img1').val();
							var  nome_img_cropada = $('#nome_img_cropada1').val();
						
								$('#uploaded_image1').hide(); 
								$('#thumbnail_form1').hide();
								$('#todo_conteudo1').hide();
								$('#salvar_recropagem1').hide();
								$('#imagem_cropada_ftp1').empty();
								$('#imagem_cropada_ftp1').show();
								$('#imagem_cropada_ftp1').html('<img src="'+arq_din+nome_img_cropada+'">');	
								$('#cancelar_recropagem1').hide();
								$('#deletar1').show();
								$('#editar1').show();
								$('#nova_imagem1').show();
													
								alert("imagem salva com sucesso!!");
						
							
						}else{
							$('#x11').val("");
							$('#y11').val("");
							$('#x21').val("");
							$('#y21').val("");
							$('#w1').val("");
							$('#h1').val("");
							$('#cancelar_recropagem1').show();
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
							
						}
					}
				});
			
			}
			
			
		});
		
		
		
		//botão de salvamento do crop na edição
		$('#save_thumb1').click(function(){
			$('#save_thumb1').attr("disabled", true); 
			$('#save_thumb1').text('Aguarde..');
			var nome_img_original = $('#nome_img1').val();
			var nome_img_cropada = $('#nome_img_cropada1').val();
			if(nome_img_cropada == ""){
				var flag_inclusao_banco = true;
			}else{
				var flag_inclusao_banco = false;
			}
						
			var x11 = $('#x11').val();
			var y11 = $('#y11').val();
			var x21 = $('#x21').val();
			var y21 = $('#y21').val();
			var w1 = $('#w1').val();
			var h1 = $('#h1').val();
			
			if(x11=="" || y11=="" || x21=="" || y21=="" || w1=="" || h1==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#save_thumb1').attr("disabled", false); 
				$('#save_thumb1').text("Salvar");
				return false;
			
			}else{
		
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ disable: true, hide: true }); 
		
				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x11+'&y1='+y11+'&x2='+x21+'&y2='+y21+'&w='+w1+'&h='+h1+'&imagem_original_banco='+$('#nome_img1').val()+'&imagem_cropada_banco='+$('#nome_img_cropada1').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada+'&recropar=true',
					cache: false,
					success: function(response){
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
						$('#save_thumb1').attr("disabled", false); 
						$('#save_thumb1').text('Salvar');
						$('#cancelar_upload1').hide();
						$('#x11').val("");
						$('#y11').val("");
						$('#x21').val("");
						$('#y21').val("");
						$('#w1').val("");
						$('#h1').val("");
						if(responseType=="success"){

							$('#deletar1').show();
							$('#editar1').show();
							
							
							$('#nome_img_cropada1').val(nomeImagem);
							var id = $('#id1').val();
							var  nome_img_original = $('#nome_img1').val();
							var  nome_img_cropada = $('#nome_img_cropada1').val();
						
							if(flag_inclusao_banco == false){
								$('#uploaded_image1').hide(); 
								$('#thumbnail_form1').hide();
								$('#todo_conteudo1').hide();
								$('#imagem_cropada_ftp1').empty();
								$('#imagem_cropada_ftp1').show();
								$('#imagem_cropada_ftp1').html('<img src="'+arq_din+nome_img_cropada+'">');
								alert("imagem salva com sucesso!!");
							}
						
							if(flag_inclusao_banco == true){
								
								$.ajax({
									type: 'POST',
									url: imagem_edicao,
									data: 'inclusao_banco=inclusao&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
									cache: false,
									success: function(response){
										$('#uploaded_image1').hide(); 
										$('#thumbnail_form1').hide();
										$('#todo_conteudo1').hide();
										$('#imagem_cropada_ftp1').empty();
										$('#imagem_cropada_ftp1').show();
										$('#imagem_cropada_ftp1').html('<img src="'+arq_din+nome_img_cropada+'">');
										alert("imagem salva com sucesso!!");
									}
								});
							
							}
							$('#editar1').attr('disabled', false);
							$('#deletar1').attr('disabled', false);
							$('#nova_imagem1').attr('disabled', true);
							$('#nova_imagem1').show();
							
							
						}else{
							$('#upload_status1').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image1').find('#thumbnail1').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview1 }); 
							$('#thumbnail_form1').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 				
			return false;
			}
			 
			
			
			
		});

		$('#cancelar_upload1').click(function(){
			var valorImagemOriginal1 =  $('#nome_img1').val();
			$('#x11').val("");
			$('#y11').val("");
			$('#x21').val("");
			$('#y21').val("");
			$('#w1').val("");
			$('#h1').val("");
			$.ajax({
				type: 'POST',
				url: imagem_edicao,
				data: 'cancelar_upload=cancelar&imagem_original='+valorImagemOriginal1,
				cache: false,
				success: function(response){
					$('#cancelar_upload1').hide();
					$('#nome_img1').val("");
					$('#nome_img_cropada1').val("");
					$('#todo_conteudo1').hide();
					$('#nova_imagem1').show();
				}
			});

			
			

		});

		$('#cancelar_recropagem1').click(function(){
				var  nome_img_cropada = $('#nome_img_cropada1').val();
				$('#cancelar_recropagem1').hide();	
				$('#uploaded_image1').hide(); 
				$('#thumbnail_form1').hide();
				$('#todo_conteudo1').hide();
				$('#salvar_recropagem1').hide();
				$('#imagem_cropada_ftp1').empty();
				$('#imagem_cropada_ftp1').show();
				$('#imagem_cropada_ftp1').html('<img src="'+arq_din+nome_img_cropada+'">');
				$('#deletar1').show();
				$('#editar1').show();
				$('#nova_imagem1').show();
				$('#x11').val("");
				$('#y11').val("");
				$('#x21').val("");
				$('#y21').val("");
				$('#w1').val("");
				$('#h1').val("");
					
		
		});

		//SEGUNDO IDIOMA
		$('#cancelar_upload2').hide();
		$('#cancelar_recropagem2').hide();
		$('#salvar_recropagem2').hide();
		
		
		
		var imagem_cropada2  = $('#nome_img_cropada2').val();
		
		if(imagem_cropada2 != ""){
			$('#imagem_cropada_ftp2').html('<img src="'+arq_din+imagem_cropada2+'">');
			$('#deletar2').attr('disabled', false);
			$('#editar2').attr('disabled', false);
			$('#nova_imagem2').attr('disabled', true);
			 
		}else{
			$('#deletar2').attr('disabled', true);
			$('#editar2').attr('disabled', true);
			$('#nova_imagem2').attr('disabled', false);
		}



		
		//Ação do botão de deletar
		$('#deletar2').click(function(){
			$('#deletar2').attr("disabled", true);
			$('#deletar2').text("Aguarde...");
			var nome_imagem_original2 = $('#nome_img2').val();
			var nome_imagem_cropada2 = $('#nome_img_cropada2').val();		
			var id = $('#id2').val() ;
			
			if(nome_imagem_original2 == ""){
				alert("Não há imagem para ser deletada!!");
				$('#deletar2').attr("disabled", false);
				$('#deletar2').text("Deletar imagem atual");
			}else{
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original2+'&nome_imagem_cropada='+nome_imagem_cropada2+'&id='+id,
					cache: false,
					success: function(response){
							$('#nome_img2').val("");
						    $('#nome_img_cropada2').val("");
						    $('#uploaded_image2').empty();
						    $('#imagem_cropada_ftp2').hide();
							$('#editar2').attr('disabled', true);
							$('#deletar2').text("Deletar imagem atual");
							$('#nova_imagem2').attr('disabled', false);
							
							
					}
				});
			}
			
		
		});
		
		//Ação do botão de editar
		$('#editar2').click( function (){
			
			
			$('#todo_conteudo2').hide();
			$('#save_thumb2').hide();
			$('#cancelar_recropagem2').show();
			
			var valor_inicial_campo_original = $('#nome_img2').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada2').val();
			
			
			if(valor_inicial_campo_original == ""){	
				alert("Não há imagem para editar!!");

			}else{
				var imagem_original2 = $('#nome_img2').val();
				var imagem_cropada2  = $('#nome_img_cropada2').val();
				
				$('#uploaded_image2').show(); 
				$('#thumbnail_form2').show();
				$('#todo_conteudo2').show();					
				$('#uploaded_image2').html('<img src="'+arq_din+imagem_original2+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" />');
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
				$('#thumbnail_form2').show();
				$('#imagem_cropada_ftp2').hide();
				$('#salvar_recropagem2').show();
				$('#deletar2').hide();
				$('#editar2').hide();
				$('#nova_imagem2').hide();
				
			}
		});
		
		//AÇÃO DE UPLOAD DA IMAGEM ORIGINAL
		if($('#nova_imagem2').length> 0){
			new AjaxUpload($('#nova_imagem2'), {
				action: imagem_edicao,
				name: 'image',
				onSubmit: function(file, ext){
					$('#nova_imagem2').attr('disabled', true);
					$('#nova_imagem2').text('Aguarde..');
				},
				onComplete: function(file, response){
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{

							var current_width   = response[2];
							var current_height  = response[3];
							var nome_da_imagem2 = response[4];

							$('#save_thumb2').show();
							$('#nova_imagem2').attr("disabled", false);
							$('#nova_imagem2').text("Inserir imagem");
							$('#nova_imagem2').hide();
							$('#uploaded_image2').show();
							$('#cancelar_upload2').show();
							$('#nome_img2').val(nome_da_imagem2);
							$('#todo_conteudo2').show();
							$('#uploaded_image2').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail2" alt="Create Thumbnail" />');
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
							$('#trocar2').text("Escolher imagem");
							
					}else if(responseType=="error"){
							$('#nova_imagem2').attr("disabled", false);
							$('#nova_imagem2').text("Inserir imagem");
							$('#upload_status2').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image2').html('');
							$('#thumbnail_form2').hide();
					}else{
							$('#nova_imagem2').attr("disabled", false);
							$('#nova_imagem2').text("Inserir imagem");
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image2').html('');
							$('#thumbnail_form2').hide();
					}


				}

			});

		}
		
		
		
		//Faz o salvamento da recropagem da imagem
		$('#salvar_recropagem2').click(function(){
			$('#salvar_recropagem2').attr("disabled", true); 
			$('#salvar_recropagem2').text('Aguarde..');
			
			var x12 = $('#x12').val();
			var y12 = $('#y12').val();
			var x22 = $('#x22').val();
			var y22 = $('#y22').val();
			var w2 = $('#w2').val();
			var h2 = $('#h2').val();
			
			if(x12=="" || y12=="" || x22=="" || y22=="" || w2=="" || h2==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#salvar_recropagem2').attr("disabled", false); 
				$('#salvar_recropagem2').text('Salvar Recropagem');
				return false;
			}else{
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ disable: true, hide: true }); 
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'salvar_recropagem=salvar&x1='+x12+'&y1='+y12+'&x2='+x22+'&y2='+y22+'&w='+w2+'&h='+h2+'&imagem_original_banco='+$('#nome_img2').val()+'&imagem_cropada_banco='+$('#nome_img_cropada2').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){						
						$('#salvar_recropagem2').attr("disabled", false); 
						$('#salvar_recropagem2').text('Salvar recropagem');
						
						var resposta = response.split('|');
						responseType = resposta[0];
						nomeImagem = resposta[3];
						$('#x12').val("");
						$('#y12').val("");
						$('#x22').val("");
						$('#y22').val("");
						$('#w2').val("");
						$('#h2').val("");
						
						if(responseType=="success"){
							$('#cancelar_recropagem2').show();
							$('#nome_img_cropada2').val(nomeImagem);
							var id = $('#id2').val();
							var  nome_img_original = $('#nome_img2').val();
							var  nome_img_cropada = $('#nome_img_cropada2').val();
						
								$('#uploaded_image2').hide(); 
								$('#thumbnail_form2').hide();
								$('#todo_conteudo2').hide();
								$('#salvar_recropagem2').hide();
								$('#imagem_cropada_ftp2').empty();
								$('#imagem_cropada_ftp2').show();
								$('#imagem_cropada_ftp2').html('<img src="'+arq_din+nome_img_cropada+'">');	
								$('#cancelar_recropagem2').hide();
								$('#deletar2').show();
								$('#editar2').show();
								$('#nova_imagem2').show();
													
								alert("imagem salva com sucesso!!");
						
							
						}else{
							$('#cancelar_recropagem2').show();
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
							
						}
					}
				});
			
			}
			
			
		});
		
		
		
		//botão de salvamento do crop na edição
		$('#save_thumb2').click(function(){
			$('#save_thumb2').attr("disabled", true); 
			$('#save_thumb2').text('Aguarde..');
			var nome_img_original = $('#nome_img2').val();
			var nome_img_cropada = $('#nome_img_cropada2').val();
			if(nome_img_cropada == ""){
				var flag_inclusao_banco = true;
			}else{
				var flag_inclusao_banco = false;
			}
						
			var x12 = $('#x12').val();
			var y12 = $('#y12').val();
			var x22 = $('#x22').val();
			var y22 = $('#y22').val();
			var w2 = $('#w2').val();
			var h2 = $('#h2').val();
			
			if(x12=="" || y12=="" || x22=="" || y22=="" || w2=="" || h2==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#save_thumb2').attr("disabled", false); 
				$('#save_thumb2').text('Salvar');
				return false;
			
			}else{
		
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ disable: true, hide: true }); 
		
				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x12+'&y1='+y12+'&x2='+x22+'&y2='+y22+'&w='+w2+'&h='+h2+'&imagem_original_banco='+$('#nome_img2').val()+'&imagem_cropada_banco='+$('#nome_img_cropada2').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada+'&recropar=true',
					cache: false,
					success: function(response){
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
						$('#save_thumb2').attr("disabled", false); 
						$('#save_thumb2').text('Salvar');
						$('#cancelar_upload2').hide();
						$('#x12').val("");
						$('#y12').val("");
						$('#x22').val("");
						$('#y22').val("");
						$('#w2').val("");
						$('#h2').val("");
						if(responseType=="success"){

							$('#deletar2').show();
							$('#editar2').show();
							
							
							$('#nome_img_cropada2').val(nomeImagem);
							var id = $('#id2').val();
							var  nome_img_original = $('#nome_img2').val();
							var  nome_img_cropada = $('#nome_img_cropada2').val();
						
							if(flag_inclusao_banco == false){
								$('#uploaded_image2').hide(); 
								$('#thumbnail_form2').hide();
								$('#todo_conteudo2').hide();
								$('#imagem_cropada_ftp2').empty();
								$('#imagem_cropada_ftp2').show();
								$('#imagem_cropada_ftp2').html('<img src="'+arq_din+nome_img_cropada+'">');
								alert("imagem salva com sucesso!!");
							}
						
							if(flag_inclusao_banco == true){
								
								$.ajax({
									type: 'POST',
									url: imagem_edicao,
									data: 'inclusao_banco=inclusao&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
									cache: false,
									success: function(response){
										$('#uploaded_image2').hide(); 
										$('#thumbnail_form2').hide();
										$('#todo_conteudo2').hide();
										$('#imagem_cropada_ftp2').empty();
										$('#imagem_cropada_ftp2').show();
										$('#imagem_cropada_ftp2').html('<img src="'+arq_din+nome_img_cropada+'">');
										alert("imagem salva com sucesso!!");
									}
								});
							
							}
							$('#editar2').attr('disabled', false);
							$('#deletar2').attr('disabled', false);
							$('#nova_imagem2').attr('disabled', true);
							$('#nova_imagem2').show();
							
							
						}else{
							$('#upload_status2').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image2').find('#thumbnail2').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview2 }); 
							$('#thumbnail_form2').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 				
			return false;
			}
			 
			
			
			
		});

		$('#cancelar_upload2').click(function(){
			var valorImagemOriginal2 =  $('#nome_img2').val();
			$('#x12').val("");
			$('#y12').val("");
			$('#x22').val("");
			$('#y22').val("");
			$('#w2').val("");
			$('#h2').val("");
			$.ajax({
				type: 'POST',
				url: imagem_edicao,
				data: 'cancelar_upload=cancelar&imagem_original='+valorImagemOriginal2,
				cache: false,
				success: function(response){
					$('#cancelar_upload2').hide();
					$('#nome_img2').val("");
					$('#nome_img_cropada2').val("");
					$('#todo_conteudo2').hide();
					$('#nova_imagem2').show();
				}
			});

			
			

		});

		$('#cancelar_recropagem2').click(function(){
				var  nome_img_cropada = $('#nome_img_cropada2').val();
				$('#cancelar_recropagem2').hide();	
				$('#uploaded_image2').hide(); 
				$('#thumbnail_form2').hide();
				$('#todo_conteudo2').hide();
				$('#salvar_recropagem2').hide();
				$('#imagem_cropada_ftp2').empty();
				$('#imagem_cropada_ftp2').show();
				$('#imagem_cropada_ftp2').html('<img src="'+arq_din+nome_img_cropada+'">');
				$('#deletar2').show();
				$('#editar2').show();
				$('#nova_imagem2').show();
				$('#x12').val("");
				$('#y12').val("");
				$('#x22').val("");
				$('#y22').val("");
				$('#w2').val("");
				$('#h2').val("");
					
		
		});

		//TERCEIRO IDIOMA
		$('#cancelar_upload3').hide();
		$('#cancelar_recropagem3').hide();
		$('#salvar_recropagem3').hide();
		
		
		
		var imagem_cropada3  = $('#nome_img_cropada3').val();
		
		if(imagem_cropada3 != ""){
			$('#imagem_cropada_ftp3').html('<img src="'+arq_din+imagem_cropada3+'">');
			$('#deletar3').attr('disabled', false);
			$('#editar3').attr('disabled', false);
			$('#nova_imagem3').attr('disabled', true);
			 
		}else{
			$('#deletar3').attr('disabled', true);
			$('#editar3').attr('disabled', true);
			$('#nova_imagem3').attr('disabled', false);
		}



		
		//Ação do botão de deletar
		$('#deletar3').click(function(){
			$('#deletar3').attr("disabled", true);
			$('#deletar3').text("Aguarde...");
			var nome_imagem_original3 = $('#nome_img3').val();
			var nome_imagem_cropada3 = $('#nome_img_cropada3').val();		
			var id = $('#id3').val() ;
			
			if(nome_imagem_original3 == ""){
				alert("Não há imagem para ser deletada!!");
				$('#deletar3').attr("disabled", false);
				$('#deletar3').text("Deletar imagem atual");
			}else{
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'deletar=Deletar&nome_imagem_original='+nome_imagem_original3+'&nome_imagem_cropada='+nome_imagem_cropada3+'&id='+id,
					cache: false,
					success: function(response){
							$('#nome_img3').val("");
						    $('#nome_img_cropada3').val("");
						    $('#uploaded_image3').empty();
						    $('#imagem_cropada_ftp3').hide();
							$('#editar3').attr('disabled', true);
							$('#deletar3').text("Deletar imagem atual");
							$('#nova_imagem3').attr('disabled', false);
							
							
					}
				});
			}
			
		
		});
		
		//Ação do botão de editar
		$('#editar3').click( function (){
			
			
			$('#todo_conteudo3').hide();
			$('#save_thumb3').hide();
			$('#cancelar_recropagem3').show();
			
			var valor_inicial_campo_original = $('#nome_img3').val();
			var valor_inicial_campo_cropada  = $('#nome_img_cropada3').val();
			
			
			if(valor_inicial_campo_original == ""){	
				alert("Não há imagem para editar!!");

			}else{
				var imagem_original3 = $('#nome_img3').val();
				var imagem_cropada3  = $('#nome_img_cropada3').val();
				
				$('#uploaded_image3').show(); 
				$('#thumbnail_form3').show();
				$('#todo_conteudo3').show();					
				$('#uploaded_image3').html('<img src="'+arq_din+imagem_original3+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" />');
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
				$('#thumbnail_form3').show();
				$('#imagem_cropada_ftp3').hide();
				$('#salvar_recropagem3').show();
				$('#deletar3').hide();
				$('#editar3').hide();
				$('#nova_imagem3').hide();
				
			}
		});
		
		//AÇÃO DE UPLOAD DA IMAGEM ORIGINAL
		if($('#nova_imagem3').length> 0){

			new AjaxUpload($('#nova_imagem3'), {
				action: imagem_edicao,
				name: 'image',
				onSubmit: function(file, ext){
					$('#nova_imagem3').attr('disabled', true);
					$('#nova_imagem3').text('Aguarde..');
				},
				onComplete: function(file, response){
					response = unescape(response);
					var response = response.split("|");
					var responseType = response[0];
					var responseMsg = response[1];
					
					if(responseType=="success")
					{

							var current_width   = response[2];
							var current_height  = response[3];
							var nome_da_imagem3 = response[4];

							$('#save_thumb3').show();
							$('#nova_imagem3').attr("disabled", false);
							$('#nova_imagem3').text("Inserir imagem");
							$('#nova_imagem3').hide();
							$('#uploaded_image3').show();
							$('#cancelar_upload3').show();
							$('#nome_img3').val(nome_da_imagem3);
							$('#todo_conteudo3').show();
							$('#uploaded_image3').html('<img src="'+url_padrao+responseMsg+'" style="float: left; margin-right: 10px;" id="thumbnail3" alt="Create Thumbnail" />');
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
							$('#trocar3').text("Escolher imagem");
							
					}else if(responseType=="error"){
							$('#nova_imagem3').attr("disabled", false);
							$('#nova_imagem3').text("Inserir imagem");
							$('#upload_status3').show().html('<h1>Erro</h1><p>'+responseMsg+'</p>');
							$('#uploaded_image3').html('');
							$('#thumbnail_form3').hide();
					}else{
							$('#nova_imagem3').attr("disabled", false);
							$('#nova_imagem3').text("Inserir imagem");
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image3').html('');
							$('#thumbnail_form3').hide();
					}


				}

			});

		}
		
		
		
		//Faz o salvamento da recropagem da imagem
		$('#salvar_recropagem3').click(function(){
			$('#salvar_recropagem3').attr("disabled", true); 
			$('#salvar_recropagem3').text('');
			
			var x13 = $('#x13').val();
			var y13 = $('#y13').val();
			var x23 = $('#x23').val();
			var y23 = $('#y23').val();
			var w3 = $('#w3').val();
			var h3 = $('#h3').val();
			
			if(x13=="" || y13=="" || x23=="" || y23=="" || w3=="" || h3==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#salvar_recropagem3').attr("disabled", false); 
				$('#salvar_recropagem3').text('Salvar Recropagem');
				return false;
			}else{
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ disable: true, hide: true }); 
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'salvar_recropagem=salvar&x1='+x13+'&y1='+y13+'&x2='+x23+'&y2='+y23+'&w='+w3+'&h='+h3+'&imagem_original_banco='+$('#nome_img3').val()+'&imagem_cropada_banco='+$('#nome_img_cropada3').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada,
					cache: false,
					success: function(response){
						$('#x13').val("");
						$('#y13').val("");
						$('#x23').val("");
						$('#y23').val("");
						$('#w3').val("");
						$('#h3').val("");
						$('#salvar_recropagem3').attr("disabled", false); 
						$('#salvar_recropagem3').text('Salvar recropagem');
						
						var resposta = response.split('|');
						responseType = resposta[0];
						nomeImagem = resposta[3];
						
						if(responseType=="success"){
							$('#cancelar_recropagem3').show();
							$('#nome_img_cropada3').val(nomeImagem);
							var id = $('#id3').val();
							var  nome_img_original = $('#nome_img3').val();
							var  nome_img_cropada = $('#nome_img_cropada3').val();
						
								$('#uploaded_image3').hide(); 
								$('#thumbnail_form3').hide();
								$('#todo_conteudo3').hide();
								$('#salvar_recropagem3').hide();
								$('#imagem_cropada_ftp3').empty();
								$('#imagem_cropada_ftp3').show();
								$('#imagem_cropada_ftp3').html('<img src="'+arq_din+nome_img_cropada+'">');	
								$('#cancelar_recropagem3').hide();
								$('#deletar3').show();
								$('#editar3').show();
								$('#nova_imagem3').show();
													
								alert("imagem salva com sucesso!!");
						
							
						}else{
							$('#cancelar_recropagem3').show();
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							//reactivate the imgareaselect plugin to allow another attempt.
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
							
						}
					}
				});
			
			}
			
			
		});
		
		
		
		//botão de salvamento do crop na edição
		$('#save_thumb3').click(function(){
			$('#save_thumb3').attr("disabled", false); 
			$('#save_thumb3').text('Salvar');
			var nome_img_original = $('#nome_img3').val();
			var nome_img_cropada = $('#nome_img_cropada3').val();
			if(nome_img_cropada == ""){
				var flag_inclusao_banco = true;
			}else{
				var flag_inclusao_banco = false;
			}
						
			var x13 = $('#x13').val();
			var y13 = $('#y13').val();
			var x23 = $('#x23').val();
			var y23 = $('#y23').val();
			var w3 = $('#w3').val();
			var h3 = $('#h3').val();
			
			if(x13=="" || y13=="" || x23=="" || y23=="" || w3=="" || h3==""){
				alert("Primeiro você precisa recortar a imagem");
				$('#save_thumb3').attr("disabled", true); 
				$('#save_thumb3').text('Aguarde..');
				return false;
			
			}else{
		
				//hide the selection and disable the imgareaselect plugin
				$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ disable: true, hide: true }); 
		
				//Insere no ftp a imagem cropada
				$.ajax({
					type: 'POST',
					url: imagem_edicao,
					data: 'save_thumb_edt=Save Thumbnail&x1='+x13+'&y1='+y13+'&x2='+x23+'&y2='+y23+'&w='+w3+'&h='+h3+'&imagem_original_banco='+$('#nome_img3').val()+'&imagem_cropada_banco='+$('#nome_img_cropada3').val()+'&altura_cropada='+altura_cropada+'&largura_cropada='+largura_cropada+'&recropar=true',
					cache: false,
					success: function(response){
						$('#x13').val("");
						$('#y13').val("");
						$('#x23').val("");
						$('#y23').val("");
						$('#w3').val("");
						$('#h3').val("");
						response = unescape(response);
						var response = response.split("|");
						var responseType = response[0];
						var responseLargeImage = response[1];
						var responseThumbImage = response[2];
						var nomeImagem = response[3];
						$('#save_thumb3').attr("disabled", false); 
						$('#save_thumb3').text('Salvar');
						$('#cancelar_upload3').hide();
		
						if(responseType=="success"){

							$('#deletar3').show();
							$('#editar3').show();
							
							
							$('#nome_img_cropada3').val(nomeImagem);
							var id = $('#id3').val();
							var  nome_img_original = $('#nome_img3').val();
							var  nome_img_cropada = $('#nome_img_cropada3').val();
						
							if(flag_inclusao_banco == false){
								$('#uploaded_image3').hide(); 
								$('#thumbnail_form3').hide();
								$('#todo_conteudo3').hide();
								$('#imagem_cropada_ftp3').empty();
								$('#imagem_cropada_ftp3').show();
								$('#imagem_cropada_ftp3').html('<img src="'+arq_din+nome_img_cropada+'">');
								alert("imagem salva com sucesso!!");
							}
						
							if(flag_inclusao_banco == true){
								
								$.ajax({
									type: 'POST',
									url: imagem_edicao,
									data: 'inclusao_banco=inclusao&campo_imagem_original='+nome_img_original+'&campo_imagem_cropada='+nome_img_cropada+'&id='+id,
									cache: false,
									success: function(response){
										$('#uploaded_image3').hide(); 
										$('#thumbnail_form3').hide();
										$('#todo_conteudo3').hide();
										$('#imagem_cropada_ftp3').empty();
										$('#imagem_cropada_ftp3').show();
										$('#imagem_cropada_ftp3').html('<img src="'+arq_din+nome_img_cropada+'">');
										alert("imagem salva com sucesso!!");
									}
								});
							
							}
							$('#editar3').attr('disabled', false);
							$('#deletar3').attr('disabled', false);
							$('#nova_imagem3').attr('disabled', true);
							$('#nova_imagem3').show();
							
							
						}else{
							$('#upload_status3').show().html('<h1>Erro inesperado</h1><p>Por favor tente novamente</p>'+response);
							$('#uploaded_image3').find('#thumbnail3').imgAreaSelect({ aspectRatio: '1:'+altura_crop/largura_crop, onSelectChange: preview3 }); 
							$('#thumbnail_form3').show();
						}
					}
				});
				
				//Insere no banco o nome da imagem original e da imagem cropada 				
			return false;
			}
			 
			
			
			
		});

		$('#cancelar_upload3').click(function(){
			var valorImagemOriginal3 =  $('#nome_img3').val();
			$('#x13').val("");
			$('#y13').val("");
			$('#x23').val("");
			$('#y23').val("");
			$('#w3').val("");
			$('#h3').val("");
			$.ajax({
				type: 'POST',
				url: imagem_edicao,
				data: 'cancelar_upload=cancelar&imagem_original='+valorImagemOriginal3,
				cache: false,
				success: function(response){
					$('#cancelar_upload3').hide();
					$('#nome_img3').val("");
					$('#nome_img_cropada3').val("");
					$('#todo_conteudo3').hide();
					$('#nova_imagem3').show();
				}
			});

			
			

		});

		$('#cancelar_recropagem3').click(function(){
				$('#x13').val("");
				$('#y13').val("");
				$('#x23').val("");
				$('#y23').val("");
				$('#w3').val("");
				$('#h3').val("");
				var  nome_img_cropada = $('#nome_img_cropada3').val();
				$('#cancelar_recropagem3').hide();	
				$('#uploaded_image3').hide(); 
				$('#thumbnail_form3').hide();
				$('#todo_conteudo3').hide();
				$('#salvar_recropagem3').hide();
				$('#imagem_cropada_ftp3').empty();
				$('#imagem_cropada_ftp3').show();
				$('#imagem_cropada_ftp3').html('<img src="'+arq_din+nome_img_cropada+'">');
				$('#deletar3').show();
				$('#editar3').show();
				$('#nova_imagem3').show();
					
		
		});
		
	
		
	
	}
	
	
	


});

