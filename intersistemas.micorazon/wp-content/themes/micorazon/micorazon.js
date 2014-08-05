$(document).ready(function() {
    //SLIDERS
    $(function() {
        $('.slider-home').bxSlider({useCSS: false, auto:true});
        $('.recetario').bxSlider({useCSS: false, controls: false});
    });
    $('#cssmenu > ul > li ul').each(function(index, element) {
        var count = $(element).find('li').length;
        $(element).closest('li').children('a');
    });
    
    $('#cssmenu > ul > li > a').click(function() {

        var checkElement = $(this).next();

        $('#cssmenu li').removeClass('active');
        $(this).closest('li').addClass('active');

        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('fast');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#cssmenu ul ul:visible').slideUp('fast');
            checkElement.slideDown('fast');
        }

        if ($(this).closest('li').find('ul').children().length == 0) {
            return true;
        } else {
            return false;
        }

    });

        $('#cssmenu2 > ul > li ul').each(function(index, element) {
        var count = $(element).find('li').length;
        $(element).closest('li').children('a');
    });
    
    $('#cssmenu2 > ul > li > a').click(function() {

        var checkElement = $(this).next();

        $('#cssmenu2 li').removeClass('active');
        $(this).closest('li').addClass('active');

        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('fast');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#cssmenu2 ul ul:visible').slideUp('fast');
            checkElement.slideDown('fast');
        }

        if ($(this).closest('li').find('ul').children().length == 0) {
            return true;
        } else {
            return false;
        }

    });
    /*PREGUNTAS VERDADERO Y FALSO*/
    $('#pregunta').click(function() {
        if ($('#falsoq').is(':checked')) {
            $('#respoq').show();
        }
        if ($('#verdaderoq').is(':checked')) {
            $('#respoq').show();
        }
    });
    if($('#chuno').click(function(){
        dataString = "chuno=true";

        $.ajax({
            type: "POST",
            url: "/actividad-dao",
            data: dataString,
            dataType: "json",
            //if received a response from the server
            success: function(data) {
                //our country code was correct so we have some information to display
                if (data.success) {
                    $('input#chuno').attr("disabled", true);
                }
                //display error message
                else {
                   $('input#chuno').attr("disabled", true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something really bad happened " + textStatus);
                $("#ajaxResponse").html(jqXHR.responseText);
                $('input#chuno').attr("disabled", true);
       },
        });
        $('input#chuno').attr("disabled", true);
    }));
    
    if($('input#chdos').click(function(){
        dataString = "chdos=true";

        $.ajax({
            type: "POST",
            url: "/actividad-dao",
            data: dataString,
            dataType: "json",
            //if received a response from the server
            success: function(data) {
                //our country code was correct so we have some information to display
                if (data.success) {
                    $('input#chdos').attr("disabled", true);
                }
                //display error message
                else {
                   $('input#chdos').attr("disabled", true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something really bad happened " + textStatus);
                $("#ajaxResponse").html(jqXHR.responseText);
                $('input#chdos').attr("disabled", true);
       },
        });
        $('input#chdos').attr("disabled", true);
    }));
   
    if($('#chtres').click(function(){
        dataString = "chtres=true";

        $.ajax({
            type: "POST",
            url: "/actividad-dao",
            data: dataString,
            dataType: "json",
            //if received a response from the server
            success: function(data) {
                //our country code was correct so we have some information to display
                if (data.success) {
                    $('input#chtres').attr("disabled", true);
                }
                //display error message
                else {
                   $('input#chtres').attr("disabled", true);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something really bad happened " + textStatus);
                $("#ajaxResponse").html(jqXHR.responseText);
                $('input#chtres').attr("disabled", true);
       },
        });
        $('input#chtres').attr("disabled", true);
    }));
    $(function() {
        $("#tabs").tabs();
    });
    $("#lun-aero").keypress(function(e) {
        
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            alert("entre");
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-aero').val('');
                }
            });
        }
    });
    
});
