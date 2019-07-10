function cambiarValoresSelects(idpadre, idhijo){
	var valuepadre = $("#"+idpadre).val();

	$.ajax({
            data: { "idpadre":valuepadre, "idhijo":idhijo},
            type: "POST",
            url: "../class/ajaxResults.php",

            success: function(data) {
             //alert(data);
             $("#"+idhijo).html(data);

             //$("#"+idhijo).append('<option value=1>My option</option>');
            }
         });
}



