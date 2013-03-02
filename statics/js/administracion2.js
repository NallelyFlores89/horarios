function eliminaAdmin(id){
	liga=base+'index.php/administracion2_c/elimina_admin/'+id
	window.open(liga, 'Elimina admin', 'status=1,width=310,height=320, resizable=0') 
	return 0;
}

$(document).ready(function(){ //Función para realizar la búsqueda sobre la tabla
	$("#kwd_search").keyup(function(){
		if( $(this).val() != "")
		{
			$("#my-table tbody>tr").hide();
			$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
			$("#my-table tbody>tr").show();
		}
	});
});
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});

// function editaAdmin(id){
	// liga=base+'index.php/administracion2_c/edita_admin/'+id
	// window.open(liga, 'Edita admin', 'status=1,width=310,height=320, resizable=0') 
	// return 0;
// }