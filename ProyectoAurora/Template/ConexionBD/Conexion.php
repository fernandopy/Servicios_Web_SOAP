<?php
class  Conexion{
	//var $cadena;
	//var $con;
	//var $result;


	function conex(){
		$cadena = "host = 'localhost' port ='5432' dbname = 'Libreria' user = 'postgres' ";
		//usar la funcion  pg_connect

		$con = pg_connect($cadena)or die("Error en la Consulta SQL");
		//echo"Conexion Exitosa<hr />";
		return $con;
	}
	
	function tipo_Reportes(){
		$arreglo = array();	#crear un arreglo	
		$con = self::conex();
		$i= 0;
		//consulta sql
		$sql = "select autor,e.titulo,costo,existencias,peso,tipo 
				from libreria1 l,libros e 
				where e.id_publicacion = l.isbn;";
		
		//EJECUTAR SQL
		$result = pg_query($con,$sql) or die("Error en la Consulta SQL");

		//obtener num de resultados con pg_num_rows
		$cont = pg_num_rows($result);

		//recorrer con el while los resultados obtenidos
		while ($row = pg_fetch_array($result)){
			$titulo = $row['titulo'];
			$autor = $row['autor'];
			$costo = $row['costo'];
			$existencias = $row['existencias'];
			$peso = $row['peso'];
			$tipo = $row['tipo'];
			
			$arreglo[$i] =array('titulo'=>$titulo,'autor'=>$autor,'costo'=>$costo,'existencias'=>$existencias,'peso'=>$peso,'tipo'=>$tipo);
			$i++;
		}
		pg_close($con);
		$json_string = json_encode($arreglo);
		echo $json_string;
		
	}
	
	
}

Conexion::tipo_Reportes();
?>
