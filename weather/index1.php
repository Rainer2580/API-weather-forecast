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
	<!--Форма ввода данных-->
	
	<div id="footer">

   &copy; Дельнецкий Александр "Практика" openweathermap.com
  
  </div>
	</body>
	
</html>
