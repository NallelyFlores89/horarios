$(document).ready(function(){
 	$('#AdministracionBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	});

 	$('#Administracion2Btn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	});
		
	$('.AgregarHorarioBtn').popupWindow({ 
		windowURL:base+'index.php/agregar_horario_c', 
		scrollbars:'1',
		resizable:'0',
		height:500,
		width:800,
	}); 

	$('.vaciarHorariosBtn').popupWindow({ 
		windowURL:base+'index.php/vaciar_confirm_c', 
		scrollbars:'1',
		resizable:'0',
		height:400,
		width:770,
	});
 	$('#IrRecursosAdminBtn').click(function() {
		 $(this).target = "_blank";
			 window.open($(this).prop('href'));
		     return false;
	}); 	 
})
