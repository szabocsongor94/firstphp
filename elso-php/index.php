<?php

/* function parosVagyParatlan(int $bemenet): string
{
return $bemenet % 2 === 0 ? "Ez a szám páros." : "Ez a szám páratlan.";
}

echo parosVagyParatlan(9);

echo parosVagyParatlan(100);



$ertek = "eltárolt érték";


function getAgeText(int $eletkor): string 
{
return $eletkor >= 18 ? "A felhasználó nagykorú" : "A felhasználó kiskorú";
}

echo getAgeText(25);

// while

$szamlalo = 0;

while($szamlalo<5) {

    $szamlalo++

};

// do-while


// feltételes futás

$eletkor = $_GET['age'] ?? 0;


if() {

    echo $eletkor;

} else {

}

switch(true) {
    case $eletkor > 0:
        echo "Helytelen adat";
        break;
    case $eletkor > 0 && $eletkor < 18:
        echo "A felhasználó kiskorú";
        break;
    default:
    echo "Felhasználó nagykorú";
    break;
}


$maxPrice = $_GET['maxAr'] ?? 0;

$hangszerek = json_decode(file_get_contents('https://kodbazis.hu/api/instruments'), true);

foreach($hangszerek as $hangszer) {
    if ($hangszer['price'] < $maxPrice || $maxPrice === 0) {
        echo $hangszer['name']."<br>";
        echo "<img src='" . $hangszer['imageURL'] . "'width='50px' /><br>";
        echo "<p>" . $hangszer['price']. " Ft </p><hr>";
    }
}

*/

$parsed = parse_url($_SERVER['REQUEST_URI']);

$path = $parsed["path"];

switch($path) {
    case "/penzvalto":
        // 1. Mellékhatás (Request query paraméterek beolvasása)

            $value = (int)(isset($_GET['mennyit']) ? $_GET['mennyit'] : 1);
            $sourceCurrency = $_GET["mirol"] ?? 'USD';
            $targetCurrency = $_GET['mire'] ?? 'HUF' ;

        // 2. Mellékhatás )átváltási ráda adatok beolvasása)

            $content = file_get_contents("https://kodbazis.hu/api/exchangerates?base=" . $sourceCurrency);
            $decodedContent = json_decode($content, true);

        // 3. Számítás

            $vegeredmeny = $decodedContent["rates"][$targetCurrency] * $value;

        // 4. Mellékhatás (Pénznem adatok beolvasása, saját fájlrendszerből)

            $currencies = json_decode(file_get_contents('./currencies.json'), true);

        // 5. Mellékhatás (Respons body kigenerálása)

            require "./views/converter.php";
            break;
    case "/":
        require "./views/home.html";
        break;
    default:
        // Oldal nem található  
        echo "Oldal nem található <a href='/'>Vissza a címlapra...</a>";  
}



?>



