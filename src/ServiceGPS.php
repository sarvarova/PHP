<?php
class ServiceGPS implements ServiceInterface
{
    private $pricePerHour;

    public function __construct(int $pricePerHour)
    {
        $this->pricePerHour = $pricePerHour;
    }

    public function apply(TarifInterface $tarif, &$price)
    {
        $hours = ceil($tarif->getMinutes() / 60);
        $price += $this->pricePerHour * $hours;

    }

}