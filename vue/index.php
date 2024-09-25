<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazi 1</title>
    <style>
        html {
            margin: 0 auto;
            box-sizing: border-box;
            overflow: hidden;
        }

        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: beige;
            flex-direction: column;
        }
        .container {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-bottom: 100px;
            font-size: 2rem;
        }
        .formazott-doboz {
            height: 400px;
            width: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 25px;
            border: 5px solid black;
            aspect-ratio: 1/1;
        }
        .formazott-doboz:hover {
            border: 5px solid lightseagreen;
        }
        #szovegdoboz-label, #submit-btn {
            font-size: 1.5em;
        }
        #submit-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px;
            cursor: pointer;
            display: inline-block;
        }
        #submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
function formazottSzoveg($szoveg, $tipus="info") {
    $tipusSzin = array(
        "info" => "green",
        "figyelmeztetes" => "yellow",
        "hiba" => 'red'
    );

    echo "<div class='formazott-doboz' style='background-color: " . htmlspecialchars($tipusSzin[$tipus] ?? $tipusSzin["info"]) . "'>" . htmlspecialchars($szoveg) . "</div>";
}

$szoveg = "Üzenet";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['szovegdoboz'])) {
    $szoveg = htmlspecialchars($_POST['szovegdoboz']);
}

echo "<div class='container'>";
formazottSzoveg($szoveg, 'info');
formazottSzoveg($szoveg, 'figyelmeztetes');
formazottSzoveg($szoveg, 'hiba');
echo "</div>";
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <label id="szovegdoboz-label" for="szovegdoboz">Irj be valamit: </label>
    <input type="text" id="szovegdoboz" name="szovegdoboz" placeholder="Írd ide az üzenetet...">
    <input id="submit-btn" type="submit" value="Kiír">
</form>
</body>
</html>
