<!DOCTYPE html>
<html>
<head>
    <title>選択結果</title>
</head>
<body>
    <h1>選択結果</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["selected_option"])) {
            $selectedOption = $_POST["selected_option"];
            if ($selectedOption == "130000") {
                echo "<p>選択されたオプション: 東京都</p>";
                $url = "https://www.jma.go.jp/bosai/forecast/data/forecast/".$selectedOption.".json";
            } elseif ($selectedOption == "140000") {
                echo "<p>選択されたオプション: 神奈川県</p>";
                $url = "https://www.jma.go.jp/bosai/forecast/data/forecast/".$selectedOption.".json";
            } elseif ($selectedOption == "110000") {
                echo "<p>選択されたオプション: 埼玉県</p>";
                $url = "https://www.jma.go.jp/bosai/forecast/data/forecast/".$selectedOption.".json";
            } else {
                echo "<p>無効なオプションが選択されました。</p>";
            }
        } else {
            echo "<p>オプションが選択されていません。</p>";
        }
    } else {
        echo "<p>無効なリクエストです。</p>";
    }
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

    <p><a href="index.php">戻る</a></p>
</body>
</html>
