<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarProvincias()
	{
		$consulta = parent::consulta("SELECT *FROM provincia");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$provincias = array();
			while($provincia = parent::fetch_assoc($consulta))
			{
				$code = $provincia["idProvincia"];
				$name = $provincia["nomProvincia"];				
				$provincias[$code]=$name;
			}
			return $provincias;
		}
		else
		{
			return false;
		}
	}
	function cargarCantones()
	{
		$consulta = parent::consulta("SELECT  *FROM canton WHERE idProvincia  = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$cantones = array();
			while($canton = parent::fetch_assoc($consulta))
			{
				$code = $canton["idCanton"];
				$name = $canton["nomCanton"];				
				$cantones[$code]=$name;
			}
			return $cantones;
		}
		else
		{
			return false;
		}
	}
		
	function cargarDistritos()
	{
		$consulta = parent::consulta("SELECT *FROM distrito WHERE idCanton = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$distritos = array();
			while($distrito = parent::fetch_assoc($consulta))
			{
				$code = $distrito["idDistrito"];
				$name = $distrito["nomDistrito"];				
				$distritos[$code]=$name;
			}
			return $distritos;
		}
		else
		{
			return false;
		}
	}	
}
?>