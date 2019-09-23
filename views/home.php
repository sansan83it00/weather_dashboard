<article>
    <div class="widgets">

        <?php
        foreach ($templateParam as $cities) {
            foreach($cities as $city){
        ?>
            <div class="widget">
                <i class="wi <?php
                switch ($city->weather[0]->icon){
                    case "01d":
                        echo 'wi-day-sunny';
                        break;
                    case "01n":
                        echo 'wi-night-clear';
                        break;
                    case "02d":
                        echo 'wi-night-cloudy';
                        break;
                    case "02n":
                        echo 'wi-night-alt-cloudy';
                        break;
                    case "03d":
                        echo 'wi-cloud';
                        break;
                    case "03n":
                        echo 'wi-cloud';
                        break;
                    case "04d":
                        echo 'wi-cloudy';
                        break;
                    case "04n":
                        echo 'wi-cloudy';
                        break;
                    case "09d":
                        echo 'wi-rain';
                        break;
                    case "09n":
                        echo 'wi-rain';
                        break;
                    case "10d":
                        echo 'wi-day-rain';
                        break;
                    case "10n":
                        echo 'wi-night-alt-rain';
                        break;
                    case "11d":
                        echo 'wi-day-thunderstorm';
                        break;
                    case "11n":
                        echo 'wi-night-alt-storm-showers';
                        break;
                    case "13d":
                        echo 'wi-snowflake-cold';
                        break;
                    case "13n":
                        echo 'wi-snowflake-cold';
                        break;
                    case "50d":
                        echo 'wi-fog';
                        break;
                    case "50n":
                        echo 'wi-fog';
                        break;
                    default :
                        echo 'wi-day-sunny';
                }
                ?> icon-widget"></i>
                <p class="city-widget"><?php
                    if(isset($city->name)){
                        echo $city->name;
                    }else{
                        echo 'Unknown city';
                    } ?></p>
                <p class="temp-widget"><?php
                    if(isset($city->main->temp)){
                        $tempKelvin = $city->main->temp;
                        $tempCelsius = $tempKelvin-273.15;
                        echo $tempCelsius;
                    }else{
                        echo '??';
                    }


                    ?> °C</p>
            </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="big-space"></div>
    <a href="settings">
        <button class="button-secondary" type="button">
            <img class="icon_button-secondary"
                 src="public/img/settings.svg"
                 alt="Settings">
            <span>Settings</span>
        </button>
    </a>
</article>