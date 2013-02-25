function ventanaEliminaGrupo(idgrupo){
	liga=base+'index.php/administracion_c/elimina_grupo/'+idgrupo
	window.open(liga, 'Elimina Grupo', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEliminaUea(claveuea){
	liga=base+'index.php/administracion_c/elimina_uea/'+claveuea
	window.open(liga, 'Elimina UEA', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

function ventanaEdita(id, siglas){
	liga=base+'index.php/administracion_c/edita/'+id+'/'+siglas
	window.open(liga, 'Edita', 'status=1,width=900,height=520, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaLabo(idgrupo,lab){
	liga=base+'index.php/administracion_c/cambia_labo/'+idgrupo+'/'+lab
	window.open(liga, 'Edita', 'status=1,width=300,height=420, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaProfe(idgrupo, idprofesor){
	liga=base+'index.php/administracion_c/cambiaProfe/'+idgrupo+'/'+idprofesor
	window.open(liga, 'Edita', 'status=1,width=400,height=420, resizable=0, scrollbars=1') 
	return 0;
}

function ventanaCambiaHora(idgrupo, siglas, idlab){
	liga=base+'index.php/administracion_c/cambiaHora/'+idgrupo+'/'+siglas+'/'+idlab
	window.open(liga, 'Edita', 'status=1,width=900,height=400, resizable=0, scrollbars=1') 
	return 0;
}

$(document).ready(function(){
	// Write on keyup event of keyword input element
	$("#kwd_search").keyup(function(){
		// When value of the input is not blank
		if( $(this).val() != "")
		{
			// Show only matching TR, hide rest of them
			$("#my-table tbody>tr").hide();
			$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#my-table tbody>tr").show();
		}
	});
});
// jQuery expression for case-insensitive filter
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});