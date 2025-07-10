<?php
require('Animal.php');

$sheep = new animal("Shaun");
echo "Name : " . $sheep->jenis . "<br>";
echo "legs : " . $sheep->legs . "<br>";
echo "cold blooded : " . $sheep->cold_blooded . "<br><br>";

$kodok = new buduk("buduk");
echo "Name : " . $kodok->jenis . "<br>";
echo "legs : " . $kodok->legs . "<br>";
echo "cold blooded : " . $kodok->cold_blooded . "<br>";
echo "Jump : " . $kodok->jump . "<br><br>";

$sungokong = new kera("Kera Sakti");
echo "Name : " . $sungokong->jenis . "<br>";
echo "legs : " . $sungokong->legs . "<br>";
echo "cold blooded : " . $sungokong->cold_blooded . "<br>";
echo "yell : " . $sungokong->yell . "<br><br>";
?>
