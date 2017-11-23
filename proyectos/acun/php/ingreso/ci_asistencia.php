<?php
class ci_asistencia extends acun_ci
{
    protected  $nombre_tabla = 'asistencia';
	//-----------------------------------------------------------------------------------
	//---- Configuraciones --------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	/**
	 * Ventana de extensi�n para configurar la pantalla. Se ejecuta previo a la configuraci�n de los componentes pertenecientes a la pantalla 
	 * por lo que es ideal por ejemplo para ocultarlos en base a una condici�n din�mica, ej. $pant->eliminar_dep("tal") 
	 * @param toba_ei_pantalla $pantalla
	 */
	/*function conf__pant_edicion(toba_ei_pantalla $pantalla)
	{
            return ($this->get_info_pantalla($this->get_pantalla_inicial()));
	}
*/
	//-----------------------------------------------------------------------------------
	//---- formulario -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	/**
	 * Permite cambiar la configuraci�n del formulario previo a la generaci�n de la salida
	 * El formato del carga debe ser array(<campo> => <valor>, ...)
	 */	
		
        function conf__formulario(acun_ei_formulario $form) {
            if ($this->dep('datos')->esta_cargada()) {
                $form->set_datos($this->dep('datos')->tabla($this->nombre_tabla)->get());
            }
        }
    /**
	 * Atrapa la interacci�n del usuario con el bot�n asociado
	 * @param array $datos Estado del componente al momento de ejecutar el evento. 
         * El formato es el mismo que en la carga de la configuraci�n
	 */
	
    function evt__formulario__guardar($datos){
        /*
         * todo: el periodo por defecto
         */
        $this->dep('datos')->tabla($this->nombre_tabla)->set($datos);
        $this->dep('datos')->sincronizar();
        $this->resetear();
    }


    function evt__formulario__cancelar() {
        $this->resetear();     
    }

    function resetear() {
        $this->dep('datos')->resetear();
        //$this->set_pantalla('pant_cuadro');
    }


}

?>