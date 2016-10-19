<?php
/**
* Plugin Name: WooCommerce Regiones de Chile
* Plugin URI: http://woocommerce.com/products/woocommerce-extension/
* Description: Plugins para agregar las regiones a woocommerce y ocultar el codigo postal
* Version: 1.0.0
* Author: Javier Alexis
* Author URI: http://javierdev.cl/
*
* Copyright: © 2016 Javier Alexis Parra.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/


//Verifica woocommerce activado
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    add_filter( 'woocommerce_states', 'woo_regiones' );
    add_filter( 'woocommerce_checkout_fields', 'woo_campos_text' );
    add_filter( 'woocommerce_checkout_fields', 'woo_campos' );

    //Declarar regiones
    function woo_regiones( $estado ) {
        $estado['CL'] = array(
            "0" => "Región Metropolitana",
            "1" => "XV Arica y Parinacota",
            "2" => "I Tarapacá",
            "3" => "II Antofagasta",
            "4" => "III Atacama",
            "5" => "IV Coquimbo",
            "6" => "V Valparaíso",
            "7" => "VI O'Higgins",
            "8" => "VII Maule",
            "9" => "VIII Biobío",
            "10" => "IX La Araucanía",
            "11" => "XIV Los Ríos",
            "12" => "X Los Lagos",
            "13" => "XI Aysén",
            "14" => "XII Magallanes y Antártica",
        );
        return $estado;
    }

    //Remplazar campos
    function woo_campos_text( $campos ) {

        $campos['billing']['billing_state']['placeholder'] = 'Seleccionar una Región';
        $campos['billing']['billing_state']['label'] = 'Seleccionar una Región';

        $campos['billing']['shipping']['placeholder'] = 'Seleccionar una Región';
        $campos['billing']['shipping']['label'] = 'Seleccionar una Región';

        return $campos;
    }

    //Ocultar codigo postal
    function woo_campos( $campos ) {
        unset($campos['billing']['billing_postcode']);
        return $campos;
    }

}
?>
