<?php
  // Inicia o cURL acessando uma URL
  $cURL = curl_init('http://www.sakuraanimes.com/episodioslegendados2/30597-god-eater');
  // Define a opção que diz que você quer receber o resultado encontrado
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
  // Executa a consulta, conectando-se ao site e salvando o resultado na variável $resultado
  $resultado = curl_exec($cURL);
  // Encerra a conexão com o site
  echo $resultado;
  curl_close($cURL);