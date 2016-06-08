<?PHP
date_default_timezone_set("America/Mexico_City");
require_once "./lib/nusoap.php";

$cliente = new nusoap_client("http://localhost/PROYECTO/nuSoap.php?wsdl",true);

$error = $cliente->getError();

if($error){
	echo "<h2>Constructor error</h2><pre>".$error."</pre>";
}

$result = $cliente->call("realizaCobro",array("datos"=>array("numCuenta"=>$_POST['numCuenta'],"importe"=>$_POST['importe'])));


if($cliente->fault){
	echo "<h2>Fault</h2><pre>";
	echo array('ERROR'=>$result);
	echo"</pre>";

}else{

	$error = $cliente->getError();
	if($error){
		echo "<h2>Error</h2><pre>".$error."</pre>";

	}
	else{
		echo "<h2>BANCO BAMBAM </h2><pre>";
		echo array('datos'=>$result);
		echo"</pre>";
	}
}

?>


?>