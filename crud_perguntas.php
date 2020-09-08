<?php include("headers.php"); ?>
<br>
<br>
<br>
<br>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerenciar Perguntas e Respostas</title>
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/jquery.bootgrid.min.js"></script>

<link href="css/style.css" rel="stylesheet">
</head>

<body>
<br>
	<div class="container">
      <div class="">
        <h2>Gerenciar Perguntas e Respostas</h2>
        <div class="col-sm-8">
		<div >
			<div class="pull"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Adicionar</button></div></div>
      <div class="table-responsive ">
		<table id="perguntas_grid" class="table table-condensed table-hover table-striped" width="100%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
					<th data-column-id="pergunta">Pergunta</th>
					<th data-column-id="resposta_certa">Resposta Certa</th>
					<th data-column-id="resposta_errada">Resposta Errada</th>
          <th data-column-id="feedback_certo">Feedback Certo</th>
          <th data-column-id="feedback_errado">Feedback Errada</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Comandos</th>
				</tr>
			</thead>
		</table>
    </div>
    </div>
      </div>
    </div>
	
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Pergunta</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="nova_pergunta" class="control-label">Pergunta:</label>
                    <input type="text" class="form-control" id="nova_pergunta" name="nova_pergunta"/>
                  </div>
                  <div class="form-group">
                    <label for="nova_resposta_certa" class="control-label">Resposta Certa:</label>
                    <input type="text" class="form-control" id="nova_resposta_certa" name="nova_resposta_certa"/>
                  </div>
				  <div class="form-group">
                    <label for="nova_resposta_errada" class="control-label">Resposta Errada:</label>
                    <input type="text" class="form-control" id="nova_resposta_errada" name="nova_resposta_errada"/>
                  </div>
                  <div class="form-group">
                    <label for="novo_feedback_certo" class="control-label">Feedback Certo:</label>
                    <input type="text" class="form-control" id="novo_feedback_certo" name="novo_feedback_certo"/>
                  </div>
                  <div class="form-group">
                    <label for="novo_feedback_errado  " class="control-label">Feedback Errado:</label>
                    <input type="text" class="form-control" id="novo_feedback_errado" name="novo_feedback_errado"/>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="btn_add" class="btn btn-primary">Salvar</button>
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Pergunta</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="editar_id" id="editar_id">
                  <div class="form-group">
                    <label for="editar_pergunta" class="control-label">Pergunta:</label>
                    <input type="text" class="form-control" id="editar_pergunta" name="editar_pergunta"/>
                  </div>
                  <div class="form-group">
                    <label for="editar_resposta_certa" class="control-label">Resposta Certa:</label>
                    <input type="text" class="form-control" id="editar_resposta_certa" name="editar_resposta_certa"/>
                  </div>
				  <div class="form-group">
                    <label for="editar_resposta_errada" class="control-label">Resposta Errada:</label>
                    <input type="text" class="form-control" id="editar_resposta_errada" name="editar_resposta_errada"/>
                  </div>
                  <div class="form-group">
                    <label for="editar_feedback_certo" class="control-label">Feedback Certo:</label>
                    <input type="text" class="form-control" id="editar_feedback_certo" name="editar_feedback_certo"/>
                  </div>
                  <div class="form-group">
                    <label for="editar_feedback_errado" class="control-label">Feedback Errado:</label>
                    <input type="text" class="form-control" id="editar_feedback_errado" name="editar_feedback_errado"/>
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Salvar</button>
            </div>
			</form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#perguntas_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "response_perguntas.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_pergunta = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log (g_pergunta);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                $('#editar_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#editar_pergunta').val(ele.siblings(':nth-of-type(2)').html());
                                $('#editar_resposta_certa').val(ele.siblings(':nth-of-type(3)').html());
                                $('#editar_resposta_errada').val(ele.siblings(':nth-of-type(4)').html());                                
                                $('#editar_feedback_certo').val(ele.siblings(':nth-of-type(5)').html());
                                $('#editar_feedback_errado').val(ele.siblings(':nth-of-type(6)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('response_perguntas.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback), 
										$("#perguntas_grid").bootgrid('reload');
                                }); 
								//$(this).parent('tr').remove();
								//$("#perguntas_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",  
				  url: "response_perguntas.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response_perguntas)  
				  {
					$('#'+action+'_model').modal('hide');
					$("#perguntas_grid").bootgrid('reload');
				  }   
				});
			}
			
			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			  ajaxAction('edit');
			});
});



</script>

<footer class="text-center vermelho textoBranco">
        <div class="row">
            <div class="col-sm">
                <p>47 988475547<br>
                    contatokikids@gmail.com</p>
            </div>
            <div class="col-sm">
                <p>Todos os direitos reservados
                  <br><img src="img/logo.png" 
                    style="height:40px; vertical-align: middle">
                    <br>2020</p>
            </div>
            <div class="col-sm">
                <p>Jaraguá do Sul | Santa Catarina<br>
                    Affonso Nicoluzzi, 653</p>
            </div>
        </div>
</footer>