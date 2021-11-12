<?php

namespace App\Handler;

use App\Entity\{
  Chocolate,
  Coffee,
  Tea
};

class DrinkHandler
{
  public function serveChocolate(int $money, int $milkLevel, int $sugarLevel): null|Chocolate
  {
    return $this->serve($this->getChocolate(), $money, $milkLevel, $sugarLevel);
  }

  public function serveCoffee(int $money, int $milkLevel, int $sugarLevel): null|Coffee
  {
    return $this->serve($this->getCoffee(), $money, $milkLevel, $sugarLevel);
  }

  public function serveTea(int $money, int $milkLevel, int $sugarLevel): null|Tea
  {
    return $this->serve($this->getTea(), $money, $milkLevel, $sugarLevel);
  }

  /*
  * Checks if there is enough money, prepares the drink and returns it.
  */
  public function serve(DrinkInterface $drink, int $money, int $milkLevel, int $sugarLevel): null|DrinkInterface
  {
    if ($drink->getPrice() > $money)
    {
      return null;
    }

    $drink->setMilkLevel($milkLevel)
        ->setSugarLevel($sugarLevel);

    return $drink;
  }

  public function getChocolate()
  {
    return new Chocolate();
  }

  public function getCoffee()
  {
    return new Coffee();
  }

  public function getTea()
  {
    return new Tea();
  }
}
