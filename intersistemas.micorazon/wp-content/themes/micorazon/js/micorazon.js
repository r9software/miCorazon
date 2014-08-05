$(document).ready(function() {
    //SLIDERS
    $(function() {
        $('.slider-home').bxSlider({useCSS: false, auto: true});
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
        $('#cssmenu3 > ul > li ul').each(function(index, element) {
        var count = $(element).find('li').length;
        $(element).closest('li').children('a');
    });

    $('#cssmenu3 > ul > li > a').click(function() {

        var checkElement = $(this).next();

        $('#cssmenu3 li').removeClass('active');
        $(this).closest('li').addClass('active');

        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('fast');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#cssmenu3 ul ul:visible').slideUp('fast');
            checkElement.slideDown('fast');
        }

        if ($(this).closest('li').find('ul').children().length == 0) {
            return true;
        } else {
            return false;
        }

    });

    $('#cssmenu4 > ul > li ul').each(function(index, element) {
        var count = $(element).find('li').length;
        $(element).closest('li').children('a');
    });

    $('#cssmenu4 > ul > li > a').click(function() {

        var checkElement = $(this).next();

        $('#cssmenu4 li').removeClass('active');
        $(this).closest('li').addClass('active');

        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('fast');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#cssmenu4 ul ul:visible').slideUp('fast');
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
            $('#pregunta').hide();
        }
        if ($('#verdaderoq').is(':checked')) {
            $('#respoq').show();
            $('#pregunta').hide();
        }
        
    });
    $("#peso-inicial").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#peso-inicial').val('');
                }
            });
        }
    });
     $("#peso-hoy").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#peso-hoy').val('');
                }
            });
        }
    });
    
    $("#peso-hoy").keyup(function(e) {
        hoy = parseFloat($('#peso-hoy').val());
        if(hoy<0){
            hoy=0;}
        inicial = parseFloat($('#peso-inicial').val());
        if(inicial<0){
            inicial=0;}
        $('#cambio-peso').val(inicial-hoy);
    });
    $("#peso-inicial").keyup(function(e) {
        hoy = parseFloat($('#peso-hoy').val());
        if(hoy<0)
            hoy=0;
        inicial = parseFloat($('#peso-inicial').val());
        if(inicial<0)
            inicial=0;
        $('#cambio-peso').val(inicial-hoy);
    });
    if ($('#chuno').click(function() {
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
    }))
        ;

    if ($('input#chdos').click(function() {
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
    }))
        ;

    if ($('#chtres').click(function() {
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
    }))
        ;
    $(function() {
        $("#tabs").tabs();
    });
    $("#lun-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-aero').val('');
                }
            });
        }

    });
    //lunes suma
    $("#lun-aero").keyup(function(e) {
        aero = Number($('#lun-aero').val());
        est = 0;
        fue = 0;
        if ($('#lun-est').val().length > 0) {
            est = Number($('#lun-est').val());
        }
        if ($('#lun-fue').val().length > 0) {
            fue = Number($('#lun-fue').val());
        }
        totl = aero + est + fue;
        $('#lun-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#lun-est").keyup(function(e) {
        aero = 0;
        est = Number($('#lun-est').val());
        fue = 0;
        if ($('#lun-aero').val().length > 0) {
            aero = Number($('#lun-aero').val());
        }
        if ($('#lun-fue').val().length > 0) {
            fue = Number($('#lun-fue').val());
        }
        totl = aero + est + fue;
        $('#lun-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#lun-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#lun-fue').val());
        if ($('#lun-aero').val().length > 0) {
            aero = Number($('#lun-aero').val());
        }
        if ($('#lun-est').val().length > 0) {
            est = Number($('#lun-est').val());
        }
        totl = aero + est + fue;
        $('#lun-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //martes
    $("#mar-aero").keyup(function(e) {
        aero = Number($('#mar-aero').val());
        est = 0;
        fue = 0;
        if ($('#mar-est').val().length > 0) {
            est = Number($('#mar-est').val());
        }
        if ($('#mar-fue').val().length > 0) {
            fue = Number($('#mar-fue').val());
        }
        totl = aero + est + fue;
        $('#mar-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#mar-est").keyup(function(e) {
        aero = 0;
        est = Number($('#mar-est').val());
        fue = 0;
        if ($('#mar-aero').val().length > 0) {
            aero = Number($('#mar-aero').val());
        }
        if ($('#mar-fue').val().length > 0) {
            fue = Number($('#mar-fue').val());
        }
        totl = aero + est + fue;
        $('#mar-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#mar-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#mar-fue').val());
        if ($('#mar-aero').val().length > 0) {
            aero = Number($('#mar-aero').val());
        }
        if ($('#mar-est').val().length > 0) {
            est = Number($('#mar-est').val());
        }
        totl = aero + est + fue;
        $('#mar-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //miercoles
    $("#mier-aero").keyup(function(e) {
        aero = Number($('#mier-aero').val());
        est = 0;
        fue = 0;
        if ($('#mier-est').val().length > 0) {
            est = Number($('#mier-est').val());
        }
        if ($('#mier-fue').val().length > 0) {
            fue = Number($('#mier-fue').val());
        }
        totl = aero + est + fue;
        $('#mier-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#mier-est").keyup(function(e) {
        aero = 0;
        est = Number($('#mier-est').val());
        fue = 0;
        if ($('#mier-aero').val().length > 0) {
            aero = Number($('#mier-aero').val());
        }
        if ($('#mier-fue').val().length > 0) {
            fue = Number($('#mier-fue').val());
        }
        totl = aero + est + fue;
        $('#mier-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#mier-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#mier-fue').val());
        if ($('#mier-aero').val().length > 0) {
            aero = Number($('#mier-aero').val());
        }
        if ($('#mier-est').val().length > 0) {
            est = Number($('#mier-est').val());
        }
        totl = aero + est + fue;
        $('#mar-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //JUEVES
    $("#jue-aero").keyup(function(e) {
        aero = Number($('#jue-aero').val());
        est = 0;
        fue = 0;
        if ($('#jue-est').val().length > 0) {
            est = Number($('#jue-est').val());
        }
        if ($('#jue-fue').val().length > 0) {
            fue = Number($('#jue-fue').val());
        }
        totl = aero + est + fue;
        $('#jue-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#jue-est").keyup(function(e) {
        aero = 0;
        est = Number($('#jue-est').val());
        fue = 0;
        if ($('#jue-aero').val().length > 0) {
            aero = Number($('#jue-aero').val());
        }
        if ($('#jue-fue').val().length > 0) {
            fue = Number($('#jue-fue').val());
        }
        totl = aero + est + fue;
        $('#jue-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#jue-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#jue-fue').val());
        if ($('#jue-aero').val().length > 0) {
            aero = Number($('#jue-aero').val());
        }
        if ($('#jue-est').val().length > 0) {
            est = Number($('#jue-est').val());
        }
        totl = aero + est + fue;
        $('#jue-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //viernes
    $("#vie-aero").keyup(function(e) {
        aero = Number($('#vie-aero').val());
        est = 0;
        fue = 0;
        if ($('#vie-est').val().length > 0) {
            est = Number($('#vie-est').val());
        }
        if ($('#vie-fue').val().length > 0) {
            fue = Number($('#vie-fue').val());
        }
        totl = aero + est + fue;
        $('#vie-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#vie-est").keyup(function(e) {
        aero = 0;
        est = Number($('#vie-est').val());
        fue = 0;
        if ($('#vie-aero').val().length > 0) {
            aero = Number($('#vie-aero').val());
        }
        if ($('#vie-fue').val().length > 0) {
            fue = Number($('#vie-fue').val());
        }
        totl = aero + est + fue;
        $('#vie-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#vie-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#vie-fue').val());
        if ($('#vie-aero').val().length > 0) {
            aero = Number($('#vie-aero').val());
        }
        if ($('#vie-est').val().length > 0) {
            est = Number($('#vie-est').val());
        }
        totl = aero + est + fue;
        $('#vie-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //sabado
    $("#sguardar").click(function(e) {
        bandera = true;
        if ($('#lun-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#lun-est').val().length <= 0) {
            bandera = false;
        } else if ($('#lun-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#mar-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#mar-est').val().length <= 0) {
            bandera = false;
        } else if ($('#mar-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#mier-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#mier-est').val().length <= 0) {
            bandera = false;
        } else if ($('#mier-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#jue-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#jue-est').val().length <= 0) {
            bandera = false;
        } else if ($('#jue-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#vie-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#vie-est').val().length <= 0) {
            bandera = false;
        } else if ($('#vie-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#sab-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#sab-est').val().length <= 0) {
            bandera = false;
        } else if ($('#sab-fue').val().length <= 0) {
            bandera = false;
        } else if ($('#dom-aero').val().length <= 0) {
            bandera = false;
        } else if ($('#dom-est').val().length <= 0) {
            bandera = false;
        } else if ($('#dom-fue').val().length <= 0) {
            bandera = false;
        }

        if (bandera) {
            $('#formsa').submit();
        } else {
            $('#aviso5').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-est').val('');
                }
            });
        }
    });
    $("#pesoguardar").click(function(e) {
        bandera = true;
        
        if (bandera) {
            $('#formpeso').submit();
        } else {
            $('#aviso5').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-est').val('');
                }
            });
        }
    });
    $("#horasguardar").click(function(e) {
        bandera = true;
        
        if (bandera) {
            $('#formhoras').submit();
        } else {
            $('#aviso5').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-est').val('');
                }
            });
        }
    });
    $('.actividades-select').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
   /*
    $("#raf").click(function(e) {
        window.open("../../actividad/registro-de-actividad-fisica/");
		
    });
    $("#rpa").click(function(e) {
        window.open("../../actividad/registro-de-peso-y-alimentacion/");
		
    });
    $("#ds").click(function(e) {
        window.open("../../actividad/duerme-bien/");
		
    });*/
    
    $("#Conoce").click(function(e) {
        $('#tabla1').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                   
                }
            });
    });
    $("#sab-aero").keyup(function(e) {
        aero = Number($('#sab-aero').val());
        est = 0;
        fue = 0;
        if ($('#sab-est').val().length > 0) {
            est = Number($('#sab-est').val());
        }
        if ($('#sab-fue').val().length > 0) {
            fue = Number($('#sab-fue').val());
        }
        totl = aero + est + fue;
        $('#sab-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#sab-est").keyup(function(e) {
        aero = 0;
        est = Number($('#sab-est').val());
        fue = 0;
        if ($('#sab-aero').val().length > 0) {
            aero = Number($('#sab-aero').val());
        }
        if ($('#sab-fue').val().length > 0) {
            fue = Number($('#sab-fue').val());
        }
        totl = aero + est + fue;
        $('#sab-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#sab-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#sab-fue').val());
        if ($('#sab-aero').val().length > 0) {
            aero = Number($('#vie-aero').val());
        }
        if ($('#sab-est').val().length > 0) {
            est = Number($('#sab-est').val());
        }
        totl = aero + est + fue;
        $('#sab-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    //domingo
    $("#dom-aero").keyup(function(e) {
        aero = Number($('#dom-aero').val());
        est = 0;
        fue = 0;
        if ($('#dom-est').val().length > 0) {
            est = Number($('#dom-est').val());
        }
        if ($('#dom-fue').val().length > 0) {
            fue = Number($('#dom-fue').val());
        }
        totl = aero + est + fue;
        $('#dom-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#dom-est").keyup(function(e) {
        aero = 0;
        est = Number($('#dom-est').val());
        fue = 0;
        if ($('#dom-aero').val().length > 0) {
            aero = Number($('#dom-aero').val());
        }
        if ($('#dom-fue').val().length > 0) {
            fue = Number($('#dom-fue').val());
        }
        totl = aero + est + fue;
        $('#dom-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#dom-fue").keyup(function(e) {
        aero = 0;
        est = 0;
        fue = Number($('#dom-fue').val());
        if ($('#dom-aero').val().length > 0) {
            aero = Number($('#dom-aero').val());
        }
        if ($('#dom-est').val().length > 0) {
            est = Number($('#dom-est').val());
        }
        totl = aero + est + fue;
        $('#dom-tot').text("" + totl);
        tot = Number($('#lun-tot').text()) + Number($('#mar-tot').text()) + Number($('#mier-tot').text()) + Number($('#jue-tot').text()) + Number($('#vie-tot').text()) + Number($('#sab-tot').text()) + Number($('#dom-tot').text())
        $('#sumatot').text("" + tot);
    });
    $("#lun-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-est').val('');
                }
            });
        }
    });
    $("#lun-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#lun-fue').val('');
                }
            });
        }
    });
    $("#mar-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mar-aero').val('');
                }
            });
        }
    });
    $("#mar-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mar-est').val('');
                }
            });
        }
    });
    $("#mar-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mar-fue').val('');
                }
            });
        }
    });
    $("#mier-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mier-aero').val('');
                }
            });
        }
    });
    $("#mier-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mier-est').val('');
                }
            });
        }
    });
    $("#mier-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#mier-fue').val('');
                }
            });
        }
    });
    $("#jue-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#jue-aero').val('');
                }
            });
        }
    });
    $("#jue-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#jue-est').val('');
                }
            });
        }
    });
    $("#jue-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#jue-fue').val('');
                }
            });
        }
    });
    $("#vie-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#vie-aero').val('');
                }
            });
        }
    });
    $("#vie-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#vie-est').val('');
                }
            });
        }
    });
    $("#vie-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#vie-fue').val('');
                }
            });
        }
    });
    $("#sab-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#sab-aero').val('');
                }
            });
        }
    });
    $("#sab-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#sab-est').val('');
                }
            });
        }
    });
    $("#sab-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#sab-fue').val('');
                }
            });
        }
    });
    $("#dom-aero").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#dom-aero').val('');
                }
            });
        }
    });
    $("#dom-est").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#dom-est').val('');
                }
            });
        }
    });
    $("#dom-fue").keypress(function(e) {
        //SI NO ES NUMERICO...
        var keynum = e.which;
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {


            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso5').find('input:first').focus();
                    $('#dom-fue').val('');
                }
            });
        }
    });
    //impresion
    function imprimir()
	{
            var printVersion = $('.perfil-box').clone();
            // Eliminamos los elementos indeseables a través de jQuery. En este caso sólo uno.
            // Creamos el contenido del documento que se va a imprimir.
            var printContent = $('head').html() + '<div class="printVersion">' + printVersion.html() + '</div>'; 

            // Establecemos la nueva ventana.
            var windowUrl = 'about:blank'; 
            var createdAt = new Date(); 
            var windowName = 'printScreen' + createdAt.getTime(); 
            var printWindow = window.open(windowUrl, windowName, 'resizable=1,scrollbars=1,left=500,top=000,width=868'); 
            printWindow.document.write(printContent); 

            printWindow.document.close(); 
        
            // Establecemos el foco.
            printWindow.focus(); 
        
            // Lanzamos la impresión.
            printWindow.print();   
	}
});
