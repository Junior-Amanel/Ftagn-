<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка числа</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #000;
            color: #0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #000;
            border: 2px solid #0f0;
            border-radius: 8px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 0 10px #0f0;
            overflow: hidden;
        }
        h2 {
            margin-top: 0;
            color: #0f0;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="number"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #0f0;
            border-radius: 4px;
            font-size: 16px;
            background-color: #000;
            color: #0f0;
        }
        input[type="submit"] {
            background-color: #0f0;
            color: #000;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #00ff00;
        }
        p {
            color: #0f0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Введите число от 0 до 1 000 000:</h2>
        <form action="" method="post">
            <input type="number" name="number" min="0" max="1000000" required>
            <input type="submit" value="Проверить">
        </form>
        
        <?php
        function is_prime($num) {
            if ($num <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['number'];
            if (is_numeric($number) && $number >= 0 && $number <= 1000000) {
                if (is_prime($number)) {
                    echo "<p>$number - простое число.</p>";
                } else {
                    echo "<p>$number - не является простым числом.</p>";
                    echo "<p>Первые два простых числа, предшествующие $number:</p>";
                    $prev_prime = $number - 1;
                    $count = 0;
                    while ($count < 2 && $prev_prime > 1) {
                        if (is_prime($prev_prime)) {
                            echo "<p>$prev_prime</p>";
                            $count++;
                        }
                        $prev_prime--;
                    }
                }
            } else {
                echo "<p>Введите число от 0 до 1 000 000.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
