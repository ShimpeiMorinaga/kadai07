<!DOCTYPE html>
<html>
<head>
    <title>プルダウンフォーム</title>
</head>
<body>
    <form method="post" action="index2.php">
        <label for="dropdown">選択してください：</label>
        <select id="dropdown" name="selected_option">
            <option value="130000">東京都</option> <!-- 選択肢1に値を追加 -->
            <option value="140000">神奈川県</option>
            <option value="110000">埼玉県</option>
        </select>
        <input type="submit" value="送信">
    </form>
</body>
</html>
