<?php
class dt_asistencia extends acun_datos_tabla
{
	function evt__validar_ingreso($fila, $id=null)
	{
	}

	function get_listado()
	{
		$sql = "SELECT
			t_a.id_actividad,
			t_a.dni,
			t_a.fecha_inicio,
			t_a.hora_inicio,
			t_a.observacion,
			t_a.aula
		FROM
			asistencia as t_a
		ORDER BY observacion";
		return toba::db('acun')->consultar($sql);
	}

}
?>