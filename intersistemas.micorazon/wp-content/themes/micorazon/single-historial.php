<?php
/*
 * @package micorazon
  Template Name: Historial
 */
?>
<?php get_header(); ?>
<div class="content">
	<div <?php post_class('post'); ?>>
            <div class="cont-t">
                            <h3 class="semana">Semana del 15 al 30 de Junio de 2014</h3>
            <h1 class="histo"><?php	the_title();?></h1>
            </div>

                <table border="0" class="historial">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th class="comi">Comí 5 raciones</th>
                            <th class="movi">Me moví 10 minutos</th>
                            <th class="dormi">Dormí 8 horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>Martes</td>
                            <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>Mi&eacute;rcoles</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>Jueves</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>Viernes</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>S&aacute;bado</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                        <tr>
                            <td>Domingo</td>
                             <td class="center"><span class="ok"></span></td>
                            <td class="center"><span class="no"></span></td>
                            <td class="center"><span class="ok"></span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="semanas">
                    <a href="#" class="prev">Semana 1</a>
                     <a href="#" class="next">Semana 2</a>
                </div>

	</div>
</div>
</div><!--main-->
<?php get_sidebar(); ?>
 <div class="clear"></div>
</div><!--page-->
<?php get_footer(); ?>