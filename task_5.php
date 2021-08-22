<?php
/*
Задание #5

Создайте массив $bmw с ячейками:
model
speed
doors
year
1. Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”.
2. Создайте массивы $toyota' и '$opel аналогичные массиву $bmw (заполните данными).
3. Объедините три массива в один многомерный массив.
4. Выведите значения всех трех массивов в виде: 
CAR name
name ­ model ­speed ­ doors ­ year
Например:
CAR bmw
X5 ­120 ­ 5 ­ 2015
*/

$bmw = ["model" => "X5","speed" => 120, "doors" => 5, "year" => "2015"];
$toyota = ["model" => "RAV4", "speed" => 110, "doors" => 5 ,"year" => "2020"];
$opel = ["model" => "Astra", "speed" => 100, "doors" => 3 ,"year" => "2009"];

$cars = ["bmw" => $bmw, "toyota" => $toyota, "opel" => $opel];

foreach ($cars as $name => $car) {
    echo "CAR $name";
    echo "<br>";
    echo "{$car["model"]} {$car["speed"]} {$car["doors"]} {$car["year"]}";
    echo "<br>";
}

