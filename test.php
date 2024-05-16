<?php
$sciezka_do_pliku = 'tekst.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tekst'])) {
        $wprowadzony_tekst = $_POST['tekst'];
        
        $zawartosc_pliku = file_get_contents($sciezka_do_pliku);
        
        $wprowadzony_tekst = trim($wprowadzony_tekst);
        $zawartosc_pliku = trim($zawartosc_pliku);
        
        if ($wprowadzony_tekst == $zawartosc_pliku) {
            $sciezka_do_rezultatu = 'rezultat.txt';
            
            if (file_exists($sciezka_do_rezultatu)) {
                header('Content-Type: application/octet-stream');
                
                header('Content-Disposition: attachment; filename="' . basename($sciezka_do_rezultatu) . '"');
                
                readfile($sciezka_do_rezultatu);
                
                exit;
            } else {
                echo "Plik rezultat.txt nie istnieje.";
            }
        } else {
            echo "Nieprawidlowe haslo";
        }
    } else {
        echo "Nie podales hasla";
    }
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylephp.css">
    <audio src="morse.wav"></audio>
    <link href="https://fonts.cdnfonts.com/css/dont-walk-run" rel="stylesheet">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdź tekst</title>
</head>
<body>
    <h2>Podaj haslo:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <textarea id="tekst" name="tekst" rows="1" cols="11"></textarea><br>
        <input type="submit" value="Enter">
    </form>
</body>
</html>
