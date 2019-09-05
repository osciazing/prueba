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
	  $indata[$index]=$empleado->indata;
	  foreach($empleado as $f=>$v){
		  if($f!="indata"){
			  if($index==0){
			   $cols[]= $f;
			  }
			   $vals[]=$v;
		  }
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
			if($indata[$index]==1){$color=" style='background-color:#82E0AA'";	}
		  echo "<tr rel='add_".$empleado->id."'  ".$color." >";
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
 <a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_sel">Seleccionar todos</a>
 <a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_des">Desseleccionar todos</a>
 <a class="btn btn-primary btn-lg" href="javascript:;" rel="ev_send">Enviar</a>
 </div>
<script>
var action={
	selected:[],
	sel:function(){
		jQuery("[rel^='add_']").off();
		jQuery("[rel^='add_']").on("click",function(){
			var id=$(this).attr("rel").split("_")[1]
			if(action.selected.indexOf(id)==-1){
				action.selected.push(id);
				$(this).attr({"style":"background-color:#82E0AA;cursor:pointer"});
			}else{
				action.selected[action.selected.indexOf(id)]="NA";
				var tempo=action.selected;
				action.selected=[];
				$(this).attr({"style":"cursor:pointer"});
				jQuery.each(tempo,function(k,d){
					action.selected[k]=d;
				});
			}
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
	enviar:function(){
		 $.ajax({
			url: '?mode=importar&action=add',
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
						title: 'FIn del proceso',
						text: 'Exito al guardar',
						type: 'info',
						confirmButtonText: 'Aceptar'
					});
				}
			}
		 });
	},
	eventos:function(){
		jQuery("[rel^='ev_']").on("click",function(){
			var id=$(this).attr("rel").split("_")[1];
			if(id=="sel"){
				action.selall();
			}
			if(id=="des"){
				action.removeall();
			}
			if(id=="send"){
				action.enviar();
			}
		});
	}
	
}
jQuery(function(){
	action.sel();
	action.eventos();
})
</script>
 