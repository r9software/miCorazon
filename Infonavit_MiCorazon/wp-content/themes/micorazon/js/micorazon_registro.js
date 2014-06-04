/*DROPKICK PLUGIN*/
$(function() {
    $('.default').dropkick();
});
/*JQUERY*/
$(document).ready(function() {
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
            e.preventDefault();
        }
    });
    /*CUESTIONARIO Paso1 pregunta 2*/
    $('#glucosa-si').click(function() {
        if ($('#glucosa-si').is(':checked')) {
            $('#glucosa-value').show();
        }
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
            e.preventDefault();
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
            e.preventDefault();
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
    /*COMPARE DROPDOWN VALUES*/
    $('#sig-mot').click(function() {
        if ($("#motivacion1").val() === $("#motivacion2").val()) {
            alert("Revisa tu selección, no puedes repetir opciones de la lista.");
        }
        else if ($("#motivacion2").val() === $("#motivacion3").val()) {
            alert("Revisa tu selección, no puedes repetir opciones de la lista.");
        }
        else if ($("#motivacion1").val() === $("#motivacion3").val()) {
            alert("Revisa tu selección, no puedes repetir opciones de la lista.");
        }
        else{
            window.location.href = "perfil/";
        }
    });
});