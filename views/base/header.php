<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"&
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/weather-icons.min.css">
    <link rel="stylesheet" href="public/css/weather-icons-wind.min.css">
    <title>Weather Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<h1>Weather Dashboard</h1>
		<p class="date"><?php foreach ($templateParam as $date){
			echo $date;
		};
		
?></p>
	</header>
	<main>