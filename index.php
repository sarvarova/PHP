<?php
include './src/TarifInterface.php';
include './src/ServiceInterface.php';
include './src/TarifAbstract.php';
include './src/TarifBasic.php';
include './src/ServiceGPS.php';
include './src/ServiceDriver.php';
include './src/TarifHour.php';
include './src/TarifStudent.php';

$tarif = new TarifBasic(distance: 5, minutes: 60);
$tarif->addService(new ServiceGPS(pricePerHour: 15));
$tarif->addService(new ServiceDriver(price: 100));
echo "Тариф базовый с доп.услугами " . $tarif->countPrice() . " рублей";
echo '<br>';

$tarif = new TarifHour(distance: 5, minutes: 15);
echo "Тариф почасовой " . $tarif->countPrice() . " рублей";
echo '<br>';

$tarif = new TarifStudent(distance: 5, minutes: 20);
echo "Тариф студенческий " . $tarif->countPrice() . " рублей";