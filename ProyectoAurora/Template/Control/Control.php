<?PHP
date_default_timezone_set("America/Mexico_City");
 require_once "./lib/nusoap.php";

  $cliente = new nusoap_client("http://localhost/PROYECTO/nuSoap.php?wsdl",true);

  $error = $cliente->getError();
  
  if($error){
    echo "<h2>Constructor error</h2><pre>".$error."</pre>";
  }
  
$cuenta = $_POST['numCuenta'];
$importe =$_POST['importe'];
	
 #$result = $cliente->call("realizaCobro",array("datos"=>array("numCuenta"=>"10","importe"=>"500")));
	
$result = $cliente->call("realizaCobro",array("datos"=>array("numCuenta"=>$cuenta,"importe"=>$importe)));

	if($cliente->fault){
		echo json_encode(array("Resultado"=>$result));
		
	}else{
	
		$error = $cliente->getError();
		if($error){
			echo json_encode(array("Resultado"=>$error));
		
		}
		else{
			echo json_encode(array("Resultado"=>$result));
		}
	}
  
?>
