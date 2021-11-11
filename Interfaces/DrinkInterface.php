<?php

namespace App\Interfaces;

interface DrinkInterface
{
  public function setPrice($money);
  public function getPrice();
  public function setMilkLevel($milkLevel);
  public function getMilkLevel();
  public function setSugarLevel($sugarLevel);
  public function getSugarLevel();
}
