<?php
 echo "Iniciando transferencia de archivos </br>";
 
 echo"INSERT INTO usuarios (id_usuario, nombre_usuario, foto) VALUES (NULL, 'Diego', 'xsld.xls')";
 echo"</br>";
//ARCHIVO DE ENVIO DE IMAGENES AL SERVIDOR
	$servername = "loacalhost" ;
	$username = "root";
	$password = "";
	$database = "bd_usuarios";

	//1.2 conectarme a la bd
	$bandera_conexion = true;
	$conexion = mysqli_connect("127.0.0.1","root","","bd_usuarios") or die ("Error connection");

if(ISSET ($_POST["submit"])){ //si presioné el boton submit
	echo "</br> Se presiono un boton en formulario POST</BR>";
			$archivoOrigen = $_FILES["fileToUpload"]["tmp_name"];
			$archivoDestino = "xls/".$_FILES["fileToUpload"]["name"];
			echo "El archivo a subir es: " .$archivoDestino. "</br>";
			//PARTE 2.

		//Variable que extraiga la extencion del archivo

		$xlsFileType = pathinfo($archivoDestino, PATHINFO_EXTENSION);
		
		//Variable que valida que el archivo es tipo imagen
	//	$xlst = gettype($archivoOrigen);
		
		
		
		if($xlsFileType=="xls"or"xlsx"){
		//si encontroalgo, un archivo de tipo imagen
		echo "El archivo es una imagen </BR>";
		//Transfiriendo el archivo
		move_uploaded_file($archivoOrigen,$archivoDestino);
		//TRANSFIRIENDO LA URL A LA BD
		$query ="INSERT INTO usuarios (id_usuario, nombre_usuario,
 foto) VALUES (null, 'Diego', '".$archivoDestino."')";
		ECHO "Query a ejecutar".$query."</BR>";
		//EJECUTANDO QUERY DE INSERCIC/DN
		if($query_a_ejecutar = mysqli_query($conexion, $query)){
		ECHO "Query ejecutando correctamente</br>";
		HEADER("Refresh:5; url=Formulario.php");
		} else {

		ECHO "Query no ejecutando</br>";

		}

		}else{
			echo "El archivo NO es una imagen </BR>";
}
		

}
?>