$(document).ready(function() {
    //SLIDERS
    $(function() {
        $('.slider-home').bxSlider({useCSS: false});
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
    /*PREGUNTAS VERDADERO Y FALSO*/
    $('#pregunta').click(function() {
        if ($('#falsoq').is(':checked')) {
            $('#respoq').show();
        }
        if ($('#verdaderoq').is(':checked')) {
            $('#respoq').show();
        }
    });
    if($('#chuno').is(':checked')){
        $('#chuno').attr('checked', false);
    }
    
    if($('#chdos').is(':checked')){
        $('#chuno').attr('checked', false);
    }
   
    if($('#chtres').is(':checked')){
        $('#chuno').attr('checked', false);
    }
    
});
