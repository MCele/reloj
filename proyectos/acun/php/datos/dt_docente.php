<?php
class dt_docente extends acun_datos_tabla
{
	function get_descripciones()
	{
		$sql = "SELECT id_docente, nro_docum as dni, nombre,apellido FROM docente ORDER BY apellido";
		return toba::db('mocovi')->consultar($sql);
	}
        function get_descripciones_dni($dni)
	{
		$sql = "SELECT id_docente, nombre,apellido FROM docente "
                        . "WHERE nro_docum = $dni"
                        . "ORDER BY apellido";
		$salida=toba::db('mocovi')->consultar($sql);
                //print_r($salida);
                return $salida[0]['apellido'];
	}
}

?>