/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//impresion
    window.onload = function() {
	
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