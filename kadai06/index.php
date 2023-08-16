


<?php

$url = "https://www.jma.go.jp/bosai/forecast/data/forecast/130000.json";
echo $url;
$data = file_get_contents($url);

if ($data !== false) {
    $weather = json_decode($data, true);

    // ファイルに書き込む
    $filePath = "data/kishou.txt";
    $jsonData = json_encode($weather, JSON_PRETTY_PRINT);
    $result = file_put_contents($filePath, $data);

    if ($result !== false) {
        echo "データをファイルに書き込みました。";
    } else {
        echo "データのファイル書き込みに失敗しました。";
    }
} else {
    // データの取得に失敗した場合
    echo "データの取得に失敗しました。";
}
?>
