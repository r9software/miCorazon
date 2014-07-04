
/*DROPKICK PLUGIN*/


$(function() {
    $('.default').dropkick();
});
/*JQUERY*/
$(document).ready(function() {
    $('#sig2x').click(function() {
         var bandera = true;
        if ($('#raciones-fruta').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#raciones-verdura').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#frecuencia-empanizado').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#frecuencia-azucaradas').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#frecuencia-sal').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if (bandera) {
            $('#tabs').tabs( "option", "active", 2 );
        }
    });
    $('#sig3x').click(function() {
        var bandera = true;
        if ($('#nivel-estres').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#actividades-fisicas').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
        if ($('#hora-sueno').val() == 'default') {
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                }
            });
        }
         if (bandera) {
         $('#tabs').tabs( "option", "active", 3 );
        }
    });
    $('#sig4x').click(function() {
        var bandera = true;
        if(!$("input[name='fumas']:checked").length > 0){
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus()
                }
            });
        }
        if(!$("input[name='familiar-directo']:checked").length > 0){
            bandera=false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus()
                }
            });
        }
        if ($('#fumas-si').is(':checked')) {
            if ($('#frecuencia-fumas').val() == 'default') {
                bandera=false;
                $('#aviso7').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso7').find('input:first').focus();
                    }
                });
            }
            if ($('#frecuencia-fumas2').val() == 'default') {
                bandera=false;
                $('#aviso7').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso7').find('input:first').focus();
                    }
                });
            }

        }
        if (bandera) {
          $('#myform').submit();
        }
    });
    /*VALIDACIONES NUMERICAS*/
    $("#cifra-presion-sistolico").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#cifra-presion-sistolico').val('');
                }
            });
        }
    });
    $("#cifra-presion-diastolico").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#cifra-presion-diastolico').val('');
                }
            });
        }
    });
    $("#cifra-glucosa").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#cifra-glucosa').val('');
                }
            });
        }
    });
    $("#cifra-trigliceridos").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso6').find('input:first').focus();
                    $('#cifra-trigliceridos').val('');
                }
            });
        }
    });
    $("#cifra-colesterol").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso6').find('input:first').focus();
                    $('#cifra-colesterol').val('');
                }
            });
        }
    });
    $("#cintura-cifra").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso6').find('input:first').focus();
                    $('#cintura-cifra').val('');
                }
            });
        }
    });
    $("#peso").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#peso').val('');
                }
            });
        }
    });
    $("#altura").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus();
                    $('#altura').val('');
                }
            });
        }
    });
    

    

    $("#peso").keyup(function(e) {
        altura = parseFloat($('#altura').val());
        peso = parseFloat($('#peso').val());
        dataString = "altura=" + altura + "&peso=" + peso;

        $.ajax({
            type: "POST",
            url: "/imc-json",
            data: dataString,
            dataType: "json",
            //if received a response from the server
            success: function(data) {
                //our country code was correct so we have some information to display
                if (data.success) {
                    $("#res").text("IMC: " + parseFloat(data.imc).toFixed(2));
                    imc = parseFloat(data.imc).toFixed(2);
                    $('input[name="imc"]').attr('value',imc);
                    if (imc < 19)
                    {
                        $("#resimc").text("Tu indice de masa corporal, es muy bajo. Visita un especialista.");
                    }else if(imc >=19 && imc<25){
                        $("#resimc").text("Tienes un peso saludable.");
                    }
                    else if (imc >= 25)
                    {
                        //determinamos el exceso en peso y definimos el comentario
                        $("#resimc").text("Considera empezar un programa de pérdida de peso.");
                    }
                }
                //display error message
                else {
                    $("#res").text("IMC: " + 0);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something really bad happened " + textStatus);
                $("#ajaxResponse").html(jqXHR.responseText);
       },
        });

    });
    
    
    $("#altura").keyup(function(e) {
        altura = parseFloat($('#altura').val());
        peso = parseFloat($('#peso').val());
        dataString = "altura=" + altura + "&peso=" + peso;

        $.ajax({
            type: "POST",
            url: "/imc-json",
            data: dataString,
            dataType: "json",
            //if received a response from the server
            success: function(data) {
                //our country code was correct so we have some information to display
                if (data.success) {
                    $("#res").text("IMC: " + parseFloat(data.imc).toFixed(2));
                    imc = parseFloat(data.imc).toFixed(2);
                    $('input[name="imc"]').attr('value',imc);
                    if (imc < 19)
                    {
                        $("#resimc").text("Tu &iacute;ndice de masa corporal, es muy bajo. Visita un especialista.");
                    }else if(imc >=19 && imc<25){
                        $("#resimc").text("Tienes un peso saludable.");
                    }
                    else if (imc >= 25)
                    {
                        //determinamos el exceso en peso y definimos el comentario
                        $("#resimc").text("Considera empezar un programa de pérdida de peso.");
                    }
                }
                //display error message
                else {
                    $("#res").text("IMC: " + 0);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Something really bad happened " + textStatus);
                $("#ajaxResponse").html(jqXHR.responseText);
            },
        });

    });
    /*CUESTIONARIO VALIDACIÓN PASO1*/

    var bandera = true;
    $('#sig1x').click(function() {
        if (!$("input[name='presion']:checked").length > 0 || !$("input[name='glucosa']:checked").length > 0 || !$("input[name='trigliceridos']:checked").length > 0) {
            bandera = false;
            $('#aviso4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso4').find('input:first').focus()
                }
            });
        }
        if ($('#presion-si').is(':checked')) {
            if ($('#cifra-presion-sistolico').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            }
        }
        if ($('#cintura-si').is(':checked')) {
            if ($('#cifra-cintura').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            }
        }
        if ($('#glucosa-si').is(':checked')) {

            if ($('#cifra-glucosa').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            }
        }
        if ($('#trigliceridos-si').is(':checked')) {

            if ($('#cifra-trigliceridos').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            }
        }
        if ($('#altura').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            
        }
        if ($('#peso').val().length == 0) {
                bandera = false;
                $('#aviso5').lightbox_me({
                    centered: true,
                    onLoad: function() {
                        $('#aviso5').find('input:first').focus()
                    }
                });
            
        }
        
        
        
        if (bandera) {
        $('#tabs').tabs( "option", "active", 1 );
        }

    });

    /*REGISTRO VALIDACIÓN ALERT*/
    $('#buttonsubmit').click(function() {
        if ($('#terminos').is(':checked')) {
            $('#myform').submit();

        } else {
            $('#alert-terminos').show();
            return false;
        }
    });
    /*CUESTIONARIO Paso1 pregunta 1*/
    $('#presion-si').click(function() {
        if ($('#presion-si').is(':checked')) {
            $('#presion-value').show();
        }
    });
    $('#presion-no').click(function() {
        if ($('#presion-no').is(':checked')) {
            $('#presion-value').hide();
            $('#aviso1').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso1').find('input:first').focus()
                }
            });
        }
    });
    $('#cintura-no').click(function() {
        if ($('#cintura-no').is(':checked')) {
            $('#cintura-value').hide();
            $('#aviso8').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso8').find('input:first').focus()
                }
            });
        }
    });
    /*CUESTIONARIO Paso1 pregunta 2*/
    $('#glucosa-si').click(function() {
        if ($('#glucosa-si').is(':checked')) {
            $('#glucosa-value').show();
        }
    });
    $('#cintura-si').click(function() {
        if ($('#cintura-si').is(':checked')) {
            $('#cintura-value').show();
        }
    });
    $('#sis-dias').click(function() {
        $('#tabla1').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#tabla1').find('input:first').focus()
                }
            });
    });
    $('#link-gluc').click(function() {
        $('#tabla2').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#tabla2').find('input:first').focus()
                }
            });
    });
    $('#link-trig').click(function() {
        $('#tabla3').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#tabla3').find('input:first').focus()
                }
            });
    });
    $('#link-cole').click(function() {
        $('#tabla4').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#tabla4').find('input:first').focus()
                }
            });
    });
    $('#glucosa-no').click(function() {
        if ($('#glucosa-no').is(':checked')) {
            $('#glucosa-value').hide();
            $('#aviso2').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso2').find('input:first').focus()
                }
            });
        }
    });
    /*CUESTIONARIO Paso1 pregunta 3*/
    $('#trigliceridos-si').click(function() {
        if ($('#trigliceridos-si').is(':checked')) {
            $('#trigliceridos-value').show();
        }
    });
    $('#trigliceridos-no').click(function() {
        if ($('#trigliceridos-no').is(':checked')) {
            $('#trigliceridos-value').hide();
            $('#aviso3').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso3').find('input:first').focus()
                }
            });
        }
    });
    /*CUESTIONARIO Paso4 pregunta 1*/
    $('#fumas-si').click(function() {
        if ($('#fumas-si').is(':checked')) {
            $('#fumas-value').show();
            $('#cigarros-diarios').show();
        }
    });
    $('#fumas-no').click(function() {
        if ($('#fumas-no').is(':checked')) {
            $('#fumas-value').hide();
            $('#cigarros-diarios').hide();
        }
    });
    /*CUESTIONARIO Paso4 pregunta 2*/
    $('#familiar-directo-si').click(function() {
        if ($('#familiar-directo-si').is(':checked')) {
            $('#familiar-directo').show();
        }
    });
    $('#familiar-directo-no').click(function() {
        if ($('#familiar-directo-no').is(':checked')) {
            $('#familiar-directo').hide();
        }
    });
    /*LIGHTBOX PERFIL*/
    /*fact1 Presión arterial alto */
    $('#light-fact1-alto').click(function() {
        $('#text-fact1-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact1-alto').find('input:first').focus()
            }
        });
    });
    $('#light-muybajoimc-alto').click(function() {
        $('#text-muybajoimc-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact1-alto').find('input:first').focus()
            }
        });
    });
    $('#light-desconocidog-alto').click(function() {
        $('#text-desconocidog-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-bajo').find('input:first').focus()
            }
        });
    });
    $('#light-desconocidopa-alto').click(function() {
        $('#text-desconocidopa-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-bajo').find('input:first').focus()
            }
        });
    });
    $('#light-desconocidot-alto').click(function() {
        $('#text-desconocidot-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-bajo').find('input:first').focus()
            }
        });
    });
    $('#light-desconocidoc-alto').click(function() {
        $('#text-desconocidoc-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-bajo').find('input:first').focus()
            }
        });
    });
    /*fact1 Presión arterial medio */
    $('#light-fact1-medio').click(function() {
        $('#text-fact1-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact1-medio').find('input:first').focus()
            }
        });
    });
    /*fact1 Presión arterial bajo */
    $('#light-fact1-bajo').click(function() {
        $('#text-fact1-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact1-bajo').find('input:first').focus()
            }
        });
    });
    /*fact2 Glucosa alto */
    $('#light-fact2-alto').click(function() {
        $('#text-fact2-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact2-alto').find('input:first').focus()
            }
        });
    });
    /*fact2 Glucosa medio */
    $('#light-fact2-medio').click(function() {
        $('#text-fact2-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact2-medio').find('input:first').focus()
            }
        });
    });
    /*fact2 Glucosa bajo */
    $('#light-fact2-bajo').click(function() {
        $('#text-fact2-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact2-bajo').find('input:first').focus()
            }
        });
    });

    /*fact3 Trigliceridos alto */
    $('#light-fact3-alto').click(function() {
        $('#text-fact3-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact3-alto').find('input:first').focus()
            }
        });
    });
    /*fact3 Trigliceridos medio */
    $('#light-fact3-medio').click(function() {
        $('#text-fact3-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact3-medio').find('input:first').focus()
            }
        });
    });
    /*fact3 Trigliceridos bajo */
    $('#light-fact3-bajo').click(function() {
        $('#text-fact3-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact3-bajo').find('input:first').focus()
            }
        });
    });

    /*fact4 Colesterol alto */
    $('#light-fact4-alto').click(function() {
        $('#text-fact4-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact4-alto').find('input:first').focus()
            }
        });
    });
    /*fact4 Colesterol medio */
    $('#light-fact4-medio').click(function() {
        $('#text-fact4-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact4-medio').find('input:first').focus()
            }
        });
    });
    /*fact4 Colesterol bajo */
    $('#light-fact4-bajo').click(function() {
        $('#text-fact4-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact4-bajo').find('input:first').focus()
            }
        });
    });

    /*fact5 peso IMC alto */
    $('#light-fact5-alto').click(function() {
        $('#text-fact5-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact5-alto').find('input:first').focus()
            }
        });
    });
    /*fact5 peso IMC medio */
    $('#light-fact5-medio').click(function() {
        $('#text-fact5-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact5-medio').find('input:first').focus()
            }
        });
    });
    /*fact5 peso IMC bajo */
    $('#light-fact5-bajo').click(function() {
        $('#text-fact5-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact5-bajo').find('input:first').focus()
            }
        });
    });

    /*fact6 Nutrición alto */
    $('#light-fact6-alto').click(function() {
        $('#text-fact6-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact6-alto').find('input:first').focus()
            }
        });
    });
    /*fact6 Nutrición medio */
    $('#light-fact6-medio').click(function() {
        $('#text-fact6-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact6-medio').find('input:first').focus()
            }
        });
    });
    /*fact6 Nutrición bajo */
    $('#light-fact6-bajo').click(function() {
        $('#text-fact6-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact6-bajo').find('input:first').focus()
            }
        });
    });

    /*fact7 Estrés alto */
    $('#light-fact7-alto').click(function() {
        $('#text-fact7-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-alto').find('input:first').focus()
            }
        });
    });
    /*fact6 Estrés medio */
    $('#light-fact7-medio').click(function() {
        $('#text-fact7-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-medio').find('input:first').focus()
            }
        });
    });
    /*fact6 Estrés bajo */
    $('#light-fact7-bajo').click(function() {
        $('#text-fact7-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact7-bajo').find('input:first').focus()
            }
        });
    });

    /*fact8 Estrés alto */
    $('#light-fact8-alto').click(function() {
        $('#text-fact8-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact8-alto').find('input:first').focus()
            }
        });
    });
    /*fact8 Estrés medio */
    $('#light-fact8-medio').click(function() {
        $('#text-fact8-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact8-medio').find('input:first').focus()
            }
        });
    });
    /*fact8 Estrés bajo */
    $('#light-fact8-bajo').click(function() {
        $('#text-fact8-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact8-bajo').find('input:first').focus()
            }
        });
    });

    /*fact9 Sueño alto */
    $('#light-fact9-alto').click(function() {
        $('#text-fact9-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact9-alto').find('input:first').focus()
            }
        });
    });
    /*fact9 Sueño medio */
    $('#light-fact9-medio').click(function() {
        $('#text-fact9-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact9-medio').find('input:first').focus()
            }
        });
    });
    /*fact9 Sueño bajo */
    $('#light-fact9-bajo').click(function() {
        $('#text-fact9-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact9-bajo').find('input:first').focus()
            }
        });
    });

    /*fact10 Tabaquismo alto */
    $('#light-fact10-alto').click(function() {
        $('#text-fact10-alto').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact10-alto').find('input:first').focus()
            }
        });
    });
    /*fact10 Tabaquismo medio */
    $('#light-fact10-medio').click(function() {
        $('#text-fact10-medio').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact10-medio').find('input:first').focus()
            }
        });
    });
    /*fact9 Tabaquismo bajo */
    $('#light-fact10-bajo').click(function() {
        $('#text-fact10-bajo').lightbox_me({
            centered: true,
            onLoad: function() {
                $('#text-fact10-bajo').find('input:first').focus()
            }
        });
    });
    $("#cifra-colesterol").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso6').find('input:first').focus();
                    $('#cifra-glucosa').val('');
                }
            });
        }
    });
     $("#cifra-cintura").keypress(function(e) {
        //SI NO ES NUMERICO...
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $('#aviso6').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso6').find('input:first').focus();
                    $('#cifra-cintura').val('');
                }
            });
        }
    });
//paso 1 pregunta 4
    $('#colesterol-si').click(function() {
        if ($('#colesterol-si').is(':checked')) {
            $('#colesterol-value').show();
        }
    });
    $('#colesterol-no').click(function() {
        if ($('#colesterol-no').is(':checked')) {
            $('#colesterol-value').hide();
            $('#aviso7').lightbox_me({
                centered: true,
                onLoad: function() {
                    $('#aviso7').find('input:first').focus()
                }
            });
        }
    });
    /*MOTIVACIONES*/
    var checkBoxes = $('.motivaciones input[type=checkbox]');
    checkBoxes.click(function() {
        validateCheckboxes();
    });
    $('#count').change(function() {
        // Only neave the first N items checked (where N = number of items allowed)
        checkBoxes.filter(':checked:gt(' + ($(this).val() - 1) + ')').attr('checked', false);
        validateCheckboxes();
    });
    function validateCheckboxes() {
        // If the number of checked items exceeds the number allowed
        if (checkBoxes.filter(':checked').length >= $('#count').val()) {
            // Disable all un-checked boxes...
            checkBoxes.not(':checked').attr('disabled', true);
        } else {
            // We haven't hit out limit yet; make sure the checkboxes are still enabled
            checkBoxes.attr('disabled', false);
        }
    };
    
    /*COMPARE DROPDOWN VALUES*/
    $('#sig-mot').click(function() {
        if (checkBoxes.filter(':checked').length  < 3) {
            alert("Revisa tu selección, debes seleccionar 3 de la lista.");
            
        }
        else {
            $('#motivacion1').val(checkBoxes.filter(':checked').eq(0).val());
            $('#motivacion2').val(checkBoxes.filter(':checked').eq(1).val());
            $('#motivacion3').val(checkBoxes.filter(':checked').eq(2).val());
            $('#motivaciones-form').submit();
        }
    });
    
});