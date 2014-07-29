/*DROPKICK PLUGIN*/
/*JQUERY*/
$(document).ready(function() {
    $('#enviar').click(function() {
        $('#legal-box').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#page').find('input:first').focus();
            }
        });

    });
    $('#checar').click(function() {
        $('form').submit();
        /*
         dataString = "codigo="+$("#pass").val();
         $.ajax({
         type: "POST",
         url: "../dao/codigo.dao.php",
         data: dataString,
         dataType: "json",
         //if received a response from the server
         success: function(data) {
         },
         error: function(jqXHR, textStatus, errorThrown) {
         console.log("Something really bad happened " + textStatus);
         $("#ajaxResponse").html(jqXHR.responseText);
         },
         });
         
         */

    });
});