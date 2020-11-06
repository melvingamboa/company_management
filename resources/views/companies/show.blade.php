
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather App</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <h1>The Super Awesome Weather App</h1>
</header>
<div class="main">
    <div id="search">
        <label for="city">City Name</label>
        <input type="text" id="city">
        <button type="button">Show Weather!</button>
    </div>
    <div id="load">Loading...</div>
    <div id="weather">
        <h1 id="weatherCity">City Name</h1>

        <div id="weatherDescription">Weather Description</div>
        <div id="weatherTemperature">Temperature</div>

    </div>
</div>
<link href="{{ asset('js/app2.js') }}" rel="stylesheet">
<link href="{{ asset('js/init.js') }}" rel="stylesheet">
<link href="{{ asset('js/weather-data.js') }}" rel="stylesheet">

</body>
</html>