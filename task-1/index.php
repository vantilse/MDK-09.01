<?php
// Проверяем, есть ли в запросе параметр для установки темы
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];

    // Сохраняем выбранную тему в Cookie
    setcookie("theme", $theme, [
        "expires" => time() + (30 * 24 * 60 * 60), // 30 дней
        "path" => "/",
        "secure" => false,
        "httponly" => true,
        "samesite" => "Lax"
    ]);

    // Перенаправляем пользователя на главную страницу
    header("Location: /");
    exit;
}

// Получаем текущую тему из Cookie
$currentTheme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'default';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Выбор фона страницы</title>
    <style>
        /* Стили для разных тем */
        body.default { background-color: #fff; }
        body.dark { background-color: #333; color: #fff; }
        body.custom { background-image:  url(custom-background.jpg); }
    </style>
</head>
<body class="<?php echo $currentTheme; ?>">
    <h1>Выберите тему для фона страницы</h1>
    <ul>
        <li><a href="?theme=default">Белый фон</a></li>
        <li><a href="?theme=dark">Темный фон</a></li>
        <li><a href="?theme=custom">Пользовательский фон</a></li>
    </ul>
</body>
</html>