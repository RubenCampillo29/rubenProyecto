<?php
$nombrefile='archivo3'; // en mi caso sin extension por necesidades de la aplicacion 

$miurl='https://prewww1.aeat.es/wlpl/SSII-FACT/ws/fe/SiiFactFEV1SOAP';

 

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Archivo XML que enviare por POST

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$lentotal=filesize($nombrefile.".xml");// me guardo el len del fichero que luego lo usare en el header tambien

$handle = fopen($nombrefile.".xml", "r");

$XPost = fread($handle, $lentotal);

fclose($handle);

 

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Headers

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$header = array();

$header[0] = 'Content-Type: text/xml';

$header[1] = 'Content-Length: '.$lentotal;

 

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// cURL: We send XML via CURL using POST with a http header of text/xml.

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$ch = curl_init();

 

// set URL and other appropriate options

//Quiza no sean necesarias alguna de las opciones, pero en el momento que me funciono ya se me habian acabado las ganas de seguir investigando. Lo dejo en tu mano quitar las lineas sobrantes si las hubiera

 

curl_setopt($ch, CURLOPT_URL, $miurl);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSLVERSION,32);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

 

// IMPORTANTISIMO estas dos opciones con valor false. Usaras tu certificado, como bien me aclaro xev, aunque no se comprobara la firma de este. En muchas paginas te dicen QUE JAMAS se deben poner false por que entonces de que sirve un certificado que supuestamente usas por motivos de seguridad, que te saltes la comprobacion por parte de una autoridad certificadora de que este es un certificado firmado y bla bla bla bla... false y te funcionara la autenticacion usando tu clave y tu certificado, que es lo que deseamos, al menos en este caso. Quiza en otros como bien dicen JAMAS habra que establecerlo a false. Otro dia lo debatimos 

// Tampoco es necesario usar CURLOPT_CAINFO, ni CURLOPT_CAPATH. por que no queremos verificar la firma del certificado,ni buscar un ca-bundle.crt actualizado, ni modificar tu php.ini para indicar la ruta absoluta de este... entre 2 y 4 dias de investigacion en google para un beginner como yo

 

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

 

//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

 

//Enviamos el XML por POST. Sencillo

curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, $XPost);

 

//Header

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

curl_setopt($ch, CURLOPT_HEADER, 0);// Incluir el Header en la respuesta



//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Autenticarte mediante tu certificado y la clave privada

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$mipass='SIiaHS9K'; //El pass que usaste en la conversion del certificado pfx a pem, y que te habran proporcionado

$clientfile=getcwd().'/certificado.pem'; // el archivo de certificado en formato .pem (para tu Apache). Ojo a los slash... es una ruta... y hay quien se los come y dice que no le funciona

$keyfile=getcwd().'/certificado_key.pem'; //el archivo que contiene la clave privada para autenticarte.

 

curl_setopt($ch, CURLOPT_SSLCERT, $clientfile); //Nombre del fichero que contiene un certificado con formato PEM.

curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $mipass);

 

curl_setopt($ch, CURLOPT_SSLKEY, $keyfile); //Nombre del fichero que contiene la clave privada SSL.

curl_setopt($ch, CURLOPT_SSLKEYPASSWD, $mipass);

 

 

//Ejecutamos el curl y almacenamos la respuesta y errores de cUrl en variables

$respuesta=curl_exec($ch); // Aqui obtendras la respuesta del web service 

$strerror=curl_error($ch); // Aqui obtendras informacion del error si ha habido alguno. En mi caso unos cuantos OPENSSL_ERROR

echo $respuesta;

var_dump($respuesta);
var_dump($strerror);
 



//Cerramos nuesta sesión

curl_close($ch);

 
?>