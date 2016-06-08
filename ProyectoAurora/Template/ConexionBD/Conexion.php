<?php
class  Conexion{
	//var $cadena;
	//var $con;
	//var $result;


	function conex(){
		$cadena = "host = 'localhost' port ='5432' dbname = 'BaseWaze' user = 'postgres' ";
		//usar la funcion  pg_connect

		$con = pg_connect($cadena)or die("Error en la Consulta SQL");
		//echo"Conexion Exitosa<hr />";
		return $con;
	}
	
	function tipo_Reportes($fechaIni,$fechaFin,$reporte){
		$arreglo = array();	#crear un arreglo	
		$con = self::conex();
		//consulta sql
		$sql = "select start_time  from reportes where start_time >= '$fechaIni' 
		       and start_time <= '$fechaFin' and lower(_type) like '%$reporte%' group by start_time  order by start_time";
		
		#print_r($sql); //para saber mi mi query esta bien echo
		
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");

		//obtener num de resultados con pg_num_rows
		$cont = pg_num_rows($result);

		//recorrer con el while los resultados obtenidos
		while ($row = pg_fetch_array($result)){
			#array_push($arreglo,$row["start_time"]);#agregar los resultados del query en el $arreglo
			#$type=$row["_type"];#agregar los resultados del query en el $arreglo
			$time=$row["start_time"];
			$arreglo[] = array('time'=>$time);
		}
		pg_close($con);
		#$json_string = json_encode($arreglo);
		#echo $json_string;
		#pg_close($con);
		#return $arreglo;
		#print_r($arreglo);#imprimir el contenido del arreglo 
		#$row = pg_fetch_all($result);
		#print_r ($row[0]['count']);#esto es para sacar el valor numerico 
		return $arreglo;
	}
	
	function tipo_Reportes_Cantidad($fechaIni,$fechaFin,$reporte){
		$arreglo = array();	#crear un arreglo
		$con = self::conex();
		//consulta sql
		$sql = "select count(start_time)as cantidad from reportes where start_time >= '$fechaIni'
		and start_time <= '$fechaFin' and lower(_type) like '%$reporte%' group by start_time  order by start_time";
	
		#print_r($sql); //para saber mi mi query esta bien echo
	
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");
	
				//obtener num de resultados con pg_num_rows
				$cont = pg_num_rows($result);
	
				//recorrer con el while los resultados obtenidos
				while ($row = pg_fetch_array($result)){
					#array_push($arreglo,$row["cantidad"]);#agregar los resultados del query en el $arreglo
				    $cant=$row["cantidad"];#agregar los resultados del query en el $arreglo
				#$time=$row["start_time"];
				   $arreglo[] = array('cantidad'=>$cant);
				}
				pg_close($con);
				#$json_string = json_encode($arreglo);
				#echo $json_string;
				#pg_close($con);
				#return $arreglo;
				#print_r($arreglo);#imprimir el contenido del arreglo
				#$row = pg_fetch_all($result);
				#print_r ($row[0]['count']);#esto es para sacar el valor numerico
				return $arreglo;
	}
	
	/*function todosReportes($fechaIni,$fechaFin){
		$arreglo = array();	#crear un arreglo
		$con = self::conex();
		//consulta sql
		$sql = "select start_time as cantidad from reportes where start_time >= '$fechaIni'
		and start_time <= '$fechaFin' group by start_time order by start_time";
	
		#print_r($sql); //para saber mi mi query esta bien echo
	
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");
	
				//obtener num de resultados con pg_num_rows
				$cont = pg_num_rows($result);
	
				//recorrer con el while los resultados obtenidos
				while ($row = pg_fetch_array($result)){
				array_push($arreglo,$row["cantidad"]);#agregar los resultados del query en el $arreglo
				}
				#pg_close($con);
				#return $arreglo;
				#print_r($arreglo);#imprimir el contenido del arreglo
				#$row = pg_fetch_all($result);
				#print_r ($row[0]['count']);#esto es para sacar el valor numerico
				return $arreglo;
	
	
	
	}*/
	
	function todos_Reportes($fechaIni,$fechaFin){
		$arreglo = array();	#crear un arreglo
		$con = self::conex();
		//consulta sql
		$sql = "select start_time from reportes where start_time >= '$fechaIni' 
		       and start_time <= '$fechaFin' group by start_time order by start_time" ;
		
		#print_r($sql); //para saber mi mi query esta bien echo
		
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");
		
		//obtener num de resultados con pg_num_rows
		$cont = pg_num_rows($result);
		
		//recorrer con el while los resultados obtenidos
		while ($row = pg_fetch_array($result)){
			#$type=$row["_type"];#agregar los resultados del query en el $arreglo
			$time=$row["start_time"];
			$arreglo[] = array('time'=>$time);
		}
		
		pg_close($con);
		#return $arreglo;
		#print_r($arreglo);#imprimir el contenido del arreglo
		#$row = pg_fetch_all($result);
		#print_r ($row[0]['count']);#esto es para sacar el valor numerico
		return $arreglo;
		
		
	}
	
	function todos_Reportes_Cantidad($fechaIni,$fechaFin){
		$arreglo = array();	#crear un arreglo
		$con = self::conex();
		//consulta sql
		$sql = "select count(start_time)as cantidad from reportes where start_time >= '$fechaIni'
		and start_time <= '$fechaFin' group by start_time order by start_time" ;
	
		#print_r($sql); //para saber mi mi query esta bien echo
	
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");
	
				//obtener num de resultados con pg_num_rows
				$cont = pg_num_rows($result);
	
				//recorrer con el while los resultados obtenidos
				while ($row = pg_fetch_array($result)){
					#array_push($arreglo,$row["cantidad"]);#agregar los resultados del query en el $arreglo
					$cant=$row["cantidad"];#agregar los resultados del query en el $arreglo
					#$time=$row["start_time"];
					$arreglo[] = array('cantidad'=>$cant);
			    }
				
				/*while ($row = pg_fetch_array($result)){
				$type=$row["_type"];#agregar los resultados del query en el $arreglo
				$time=$row["start_time"];
						$arreglo[] = array('type'=>$type,'time'=>$time);
				}*/
	
				pg_close($con);
				#return $arreglo;
				#print_r($arreglo);#imprimir el contenido del arreglo
				#$row = pg_fetch_all($result);
				#print_r ($row[0]['count']);#esto es para sacar el valor numerico
				return $arreglo;
	
	
	}
}

//Conexion::conex("cr","cruzroja");
?>
