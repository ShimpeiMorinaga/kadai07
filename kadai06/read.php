<?php
$file = "data/kishou.txt";

$data = file_get_contents($file);
$jsonData = json_decode($data, true);
echo "<pre>";
print_r($jsonData);
echo "</pre>";

$timeSeries = $jsonData[0]["timeSeries"]; // jsonData[0] から minTemp と maxTemp を取得
$temps = $jsonData[1]["tempAverage"]["areas"][0]["min"]; // 正しい minTemp と maxTemp のデータを取得
echo $temps;

foreach ($timeSeries as $index => $timeData) {
    $timeDefines = $timeData["timeDefines"];
    $areas = $timeData["areas"];

    foreach ($timeDefines as $i => $timeDefine) {
        $area = $areas[$i];
        

        $areaName = $area["area"]["name"];
        $weather = $area["weathers"][0];
        $wind = $area["winds"][0];
        $wave = $area["waves"][0];


        echo "Time: " . $timeDefine . "<br>";
        echo "Area: " . $areaName . "<br>";
        echo "Weather: " . $weather . "<br>";
        echo "Wind: " . $wind . "<br>";
        echo "Wave: " . $wave . "<br>";

    }
}






// $file = "data/kishou.txt";
// $data = file_get_contents($file);
// $jsonData = json_decode($data, true); // Convert JSON to associative array

// // Access specific data
// $publishingOffice = $jsonData[0]["publishingOffice"];
// $reportDatetime = $jsonData[0]["reportDatetime"];
// $tempAverage = $jsonData[1]["tempAverage"]["areas"];

// // Print the retrieved data
// echo "Publishing Office: " . $publishingOffice . "<br>";
// echo "Report Datetime: " . $reportDatetime . "<br>";

// // Access data from the timeSeries and areas
// foreach ($jsonData[0]["timeSeries"] as $timeSeries) {
//     foreach ($timeSeries["areas"] as $area) {
//         $areaName = $area["area"]["name"];
//         $weather = $area["weathers"][0];
//         $wind = $area["winds"][0];
//         $wave = $area["waves"][0];

//         echo "Area: " . $areaName . "<br>";
//         echo "Weather: " . $weather . "<br>";
//         echo "Wind: " . $wind . "<br>";
//         echo "Wave: " . $wave . "<br><br>";
//     }
// }


// foreach ($tempAverage as $area) {
//     $areaName = $area["area"]["name"];
//     $minTemp = $area["min"];
//     $maxTemp = $area["max"];

//     echo "Area: " . $areaName . "<br>";
//     echo "Min Temperature: " . $minTemp . "°C<br>";
//     echo "Max Temperature: " . $maxTemp . "°C<br><br>";
// }
?>