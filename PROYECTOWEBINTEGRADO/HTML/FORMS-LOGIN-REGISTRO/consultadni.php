<?php
$token="apis-token-5871.E4G4xkiET3GBB6qFuRPlHqqboSLLLpHS";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni'])) {
  $dni = $_POST['dni'];
  // Resto del código


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 2,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Referer: https://apis.net.pe/consulta-dni-api',
      'Authorization: Bearer ' . $token
    ),
  ));
  
  $response = curl_exec($curl);
echo $response;

} else {
  echo json_encode(["error" => "Nro DNI requerido"]);
}
?>