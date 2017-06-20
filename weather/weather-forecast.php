<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

	</head>
	<body>
	
<!--Форма ввода данных-->
		<div>
		<h3 class="text"> Прогноз погоды </h3>
		<form action="weather-forecast.php" method="get" id="action_form">
			<div class="block1">
			<p>
				<label style="color: #000000" for="meteo-city"><b>Введите город:</b> &nbsp;
				</label><input  type="text" size="28" name="meteo-city" id="meteo-city" placeholder="Введите название города" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
			</form>
			<p>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="Сегодня"/>&nbsp;
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 2 дня"/>&nbsp;
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 3 дня"/>&nbsp;
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 5 дней"/>&nbsp;
			
			</p>
			</div>
			
		
		
	</div> 
	<br>
	<div class="block2">

	<?php

	$act = $_GET['button'];
	switch ($act){
		case 'Сегодня' :  $index = '1' ; break;
		case 'На 2 дня' : $index = '2' ; break;
		case 'На 3 дня' : $index = '3' ; break;
		case 'На 5 дней' : $index = '5' ; break;
	}	
		if (($index == '1')){
	$dy = 'сегодня';}
	elseif( ($index == '2') ){ 
	$dy = ' 2 дня';}
	elseif( ($index == '3') ){ 
	$dy = ' 3 дня';}
	elseif( ($index == '5') ){ 
	$dy = ' 5 дней';}
	
	if (!empty($_GET['meteo-city'])   &&   ($index != '0') ){
	 
// получение данных
 $urlOpenWeather	= 'http://api.openweathermap.org/data/2.5/forecast/daily?q=' . $_GET['meteo-city'].'&lang=ru&cnt='. $index .'&mode=json&APPID=533b4d3d38dfdca8bf93a5aeec0f09aa';

// Чтение json файла
$getdataOpenWeather = file_get_contents($urlOpenWeather);
$dataOpenWeather = json_decode($getdataOpenWeather, true);
	

//отображение погоды
$i = 0;
	
	
if (!empty($_GET['meteo-city']) &&  ($index != '0')) {
	$output .= '<h4> Прогноз погоды в городе '.$dataOpenWeather['city']['name'].' на '.$dy.' </h4> ';
} else {
	$output .= '<h4> Введите город </h4>';
	
}
$output .= '<div class="weather-rez">';
while ($i < $dataOpenWeather['cnt']) {{
	$output .= '<h3 >'. date('d.m.Y', $dataOpenWeather['list'][$i]['dt']) .'</h3>';
	$output .= '<img src="images/'.$dataOpenWeather['list'][$i]['weather'][0]['id'].'.png" alt="'.$dataOpenWeather['list'][$i]['weather'][0]['description'].'" /><br />';
	$output .= '<p >';
	$output .= $dataOpenWeather['list'][$i]['weather'][0]['description'];
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['temp']['day']-273.15).'°C <br>';
	$output .= 'давление';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['pressure']/ 1.3332239).'мм рт. ст.<br>';
	$output .= 'влажность';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['humidity']).'%.<br>';
	$output .= '</p>';
	$i++;
	}	
	}
	$output .= '</div>';
echo $output;
}
$output .= '</div>';
	?>	

   <div class="g-maps">
<?php
   $q=$_GET['meteo-city'];
    ?>
   <iframe  width = "800" height= "800"
   src="https://www.google.com/maps/embed/v1/search?key=AIzaSyC_iA3EkimwEG_6Px19uG6vB8XIqvYzIYs&q=<?php echo $q; ?>" allowfullscreen>
   </iframe>

 </div>
  <br><br>
 </div>
  <br><br>
 </div>
 
 <br><br>
 	<div id="footer">
	<div>
  &copy; Дельнецкий Александр "Практика" openweathermap.com
   </div>
  </div>
	</body>
</html>