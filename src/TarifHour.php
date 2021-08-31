<?php

class TarifHour extends TarifAbstract
{
    protected $pricePerKilometr = 0;
    protected $pricePerMinute = 200 / 60;

    public function __construct(int $distance, int $minutes)
    {
        parent::__construct($distance, $minutes);
        if ($this->minutes < 60) {
            $this->minutes = 60;
        } else {
            $rest = $this->minutes % 60;
            $this->minutes = $this->minutes - $rest + 60;
        }
    }
}