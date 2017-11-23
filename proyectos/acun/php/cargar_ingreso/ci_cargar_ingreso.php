<?php
class ci_cargar_ingreso extends acun_ci
{
    protected  $u_a = 'FAEA';
    protected $s__dni=null;
    //---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		$cuadro->set_datos($this->dep('datos')->tabla('asistencia')->get_listado());
	}
        
	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
	}

	//-----------------------------------------------------------------------------------
	//---- formulario -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
          
            //print_r($this->dep('formulario')->ef('dni')->get_estado());
            //$this->dep('formulario')->ef('dni')->get_estado();
            //$this->dep('formulario')->set_solo_lectura('apellido', false);
            //$this->dep('formulario')->set_solo_lectura('aula', false);
            //$this->dep('form')->get_cantidad_dependencias(); set_solo_lectura('id_ef', false);
            //print_r($this->dep('formulario')->ef('dni')->set_cuando_cambia_valor(null));
            if ($this->dep('datos')->esta_cargada()) {
		$form->set_datos($this->dep('datos')->tabla('asistencia')->get());
            }
            if(!is_null($this->dep('fromulario')->ef('dni')->get_estado())){
               // print_r($this->dep('fromulario')->ef('dni')->get_estado());
            }
            else {
                //print_r('no_cargado: '.$this->dep('fromulario')->ef('dni')->get_estado());
            }
            $param='a';
            print_r($this->dep('formulario')->get_parametro($param));
	}
        
        

	function evt__formulario__buscar($datos)
	{
            print_r($this->dep('formulario')->ef('dni')->get_estado());  
        
            //$this->dep('formulario')->et_estado('pepe');
            //print_r($datos);
	}

	function evt__formulario__alta($datos)
	{
		$this->dep('datos')->tabla('asistencia')->set($datos);
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}


	function evt__formulario__cancelar()
	{   
            $this->resetear();
	}

	function resetear()
	{
		//$this->dep('datos')->resetear();
	}

	
	//-----------------------------------------------------------------------------------
	//---- fromulario -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__fromulario(acun_ei_formulario $form)
	{
            //print_r($form);
	}

	function evt__fromulario__buscar($datos)
	{
            if(!is_null($this->dep('fromulario')->ef('dni')->get_estado())){
               // print_r('cargado: '.$this->dep('fromulario')->ef('dni')->get_estado());
            }
            else {
               // print_r('no_cargado: '.$this->dep('fromulario')->ef('dni')->get_estado());
            }
            
            $this->dep('formulario')->ef('dni')->set_estado($datos['dni']);
            if($this->dep('formulario')->ef_tiene_maestros_seteados('nombre')){
                print_r('seteados');
            }
            print_r(toba::memoria()->get_parametros());
            //toba_boton::desactivar();
             //$this->dep('formulario')->
            //print_r($datos);
            
            //return $datos;
            
	}

}
?>