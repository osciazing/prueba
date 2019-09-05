<div class="page-header">
<div class="row" >

<div class="col-sm-12">
<div style="height:500px;overflow-x:hidden;overflow-y:scroll">
  <table class="table" >
 <?php 
  $indata=[];
foreach($serviceDecode as $index=>$empleado){
	?>
	<tr>
	
	  <?php 
	  $cols=[];
	  $vals=[];
	  
	  foreach($empleado as $f=>$v){
		  
			  if($index==0){
			   $cols[]= $f;
			  }
			   $vals[]=$v;
		  
 	  }
	  if(count($cols)>0){
		  echo "<thead>";
		  echo "<tr>";
		foreach( $cols as $c){
			 echo "<th>".$c;
			 echo "</th>";
		}
		 echo "</tr>";
		 echo "</thead>";
	  }
			$color="style='cursor:pointer'";			
			 
		  echo "<tr rel='ver_".$empleado->idremoto."' id='index_".$empleado->id."'  ".$color." >";
		foreach( $vals as $id=>$v){
			
			 echo "<td >".$v;
			 echo "</td>";
		}
		 echo "</tr>";    
	  ?>
	</tr>
	<?php
}
?>
</table>
 </div>
 <a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_nuevo">Agregar</a>
  </div>
<script>
var action={
	selected:[],
	sel:function(){
		jQuery("[rel^='ver_']").off();
		jQuery("[rel^='ver_']").on("click",function(){
			var id=$(this).attr("rel").split("_")[1];
			 $.ajax({
				url: '?mode=consultas&action=get',
				datatype: 'JSON',
				data: {"id":id},
				method: 'POST',
				success: function (result) {
					if(result.respuesta!=0){     
						
						var htmlR=[];
						
						$.each(result.respuesta,function(label,val){
							if(label!="id"){
							htmlR.push('<tr><td><b>'+label+' :</b></td><td><input name="'+label+'" type="text" value="'+val+'" ></td></tr>');
							}
						});
 						$.colorbox({html:'<div style="text-align:left;font-size:18px"><table style="width:100%">'+htmlR.join('')+'</table></div><a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_g_'+result.respuesta.id+'">Guardar</a> <a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_d_'+result.respuesta.id+'">Eliminar</a>',width:600})
						action.eventos(); 
					}
					
				}
			 });
			 
		});
	},
	selall:function(){
		action.selected=[];
		jQuery.each(jQuery("[rel^='add_']"),function(k,d){
			var id=$(d).attr("rel").split("_")[1];
			action.selected[k]=id;
			$(d).attr({"style":"background-color:#82E0AA;cursor:pointer"});
		})
	},
	removeall:function(){
		action.selected=[];
		jQuery.each(jQuery("[rel^='add_']"),function(k,d){
			var id=$(d).attr("rel").split("_")[1];
 			$(d).attr({"style":"cursor:pointer"});
		})
	},
	mostrardatos:function(){
			 $.ajax({
				url: '?mode=consultas&action=get',
				datatype: 'JSON',
				data: {"elements":action.selected.join("|")},
				method: 'POST',
				beforeSend: function (result) {
						//reset();
					   // $(".capaoculta").show();
						//$("#usuarios").html("<option>Seleccione una opción para cambiar permisos</option>")
						Swal.fire({
							title: 'Procesando',
							text: 'Estamos validando la información',
							type: 'info',
							confirmButtonText: 'Aceptar'
						});
						jQuery(".swal2-container").find(".swal2-actions").hide();

				}, success: function (result) {  
					if(result.respuesta==1){
					Swal.fire({
							title: 'Fin del proceso',
							text: 'Exito al guardar',
							type: 'info',
							confirmButtonText: 'Aceptar'
						});
					}
				}
			 });
	},
	guardar:function(id){
		var objects=jQuery("#colorbox").find("[type='text']");
		var send={"id":id};
		$.each(objects,function(k,d){
			var label=jQuery(d).attr("name");
			var value=jQuery(d).val();
			send[label]=value;
 		});
		 $.ajax({
				url: '?mode=consultas&action=edit',
				datatype: 'JSON',
				data: send,
				method: 'POST',
				success: function (result) {  
					if(result.respuesta==1){
					Swal.fire({
							title: 'Fin del proceso',
							text: 'Exito al guardar',
							type: 'info',
							confirmButtonText: 'Aceptar'
						});
						jQuery.colorbox.close();
					}
				}
			 });
	},
	eliminar:function(id){
		var objects=jQuery("#colorbox").find("[type='text']");
		var send={"id":id};
		 
		 $.ajax({
				url: '?mode=consultas&action=del',
				datatype: 'JSON',
				data: send,
				method: 'POST',
				success: function (result) {  
					if(result.respuesta==1){
					Swal.fire({
							title: 'Fin del proceso',
							text: 'Exito al eliminar',
							type: 'info',
							confirmButtonText: 'Aceptar'
						});
						jQuery.colorbox.close();
						jQuery("[id='index_"+id+"']").remove();
					}
				}
			 });
	}, 
	add:function(){
		var objects=jQuery("#colorbox").find("[type='text']");
		var send={};
		$.each(objects,function(k,d){
			var label=jQuery(d).attr("name");
			var value=jQuery(d).val();
			send[label]=value;   
 		});
		 $.ajax({
				url: '?mode=consultas&action=add',
				datatype: 'JSON',
				data: send,
				method: 'POST',
				success: function (result) {  
					if(result.respuesta==1){
					Swal.fire({
							title: 'Fin del proceso',
							text: 'Exito al guardar',
							type: 'info',
							confirmButtonText: 'Aceptar'
						});
						jQuery.colorbox.close();
					}
				}
			 });	},
	nuevo:function(){
		var htmlR=[];
		var elements=['nombre', 'edad','salario','imagen'];
		$.each(elements,function(label,val){
			if(label!="id"){
			htmlR.push('<tr><td><b>'+val+' :</b></td><td><input name="'+val+'" type="text"   ></td></tr>');
			}
		});
		$.colorbox({html:'<div style="text-align:left;font-size:18px"><h2>Nuevo empleado</h2><table style="width:100%">'+htmlR.join('')+'</table></div><a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_add_n">Guardar</a> ',width:600})
		action.eventos(); 
	},	
	eventos:function(){
		jQuery("[rel^='ev_']").off();
		jQuery("[rel^='ev_']").on("click",function(){
			var op=$(this).attr("rel").split("_")[1];
			var id=$(this).attr("rel").split("_")[2];
			if(op=="g"){
				action.guardar(id);
			}
			if(op=="d"){
				action.eliminar(id);
			}
			if(op=="nuevo"){
				action.nuevo();
			}
			if(op=="add"){
				action.add();
			}
		});
	}
	
}
jQuery(function(){
	action.sel();
	action.eventos();
 })
</script>
 