function ventanaEliminaProfr(num_emp){
	liga=base+'index.php/administracion_c/elimina_profesor/'+num_emp
	window.open(liga, 'Elimina Profesor', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEliminaGrupo(grupo){
	liga=base+'index.php/administracion_c/elimina_grupo/'+grupo
	window.open(liga, 'Elimina Grupo', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEliminaUea(claveuea){
	liga=base+'index.php/administracion_c/elimina_uea/'+claveuea
	window.open(liga, 'Elimina UEA', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEdita(num_empleado,grupo,clave, siglas, lab){
	liga=base+'index.php/administracion_c/edita/'+num_empleado+'/'+grupo+'/'+clave+'/'+siglas+'/'+lab
	window.open(liga, 'Edita', 'status=1,width=900,height=520, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaLabo(grupo,lab){
	liga=base+'index.php/administracion_c/cambia_labo/'+grupo+'/'+lab
	window.open(liga, 'Edita', 'status=1,width=400,height=420, resizable=0, scrollbars=1') 
	return 0;
}