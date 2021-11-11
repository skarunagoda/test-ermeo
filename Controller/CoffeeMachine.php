<?php

namespace App\Controller;

use App\Entity\{
  Chocolate,
  Coffee,
  Tea
};
use App\Handler\{
  DrinkHandler,
  IngredientHandler,
  MoneyHandler
};

class CoffeeMachine
{
  public DrinkHandler $drinkHandler;
  public IngredientHandler $ingredientHandler;
  public MoneyHandler $moneyHandler;

  public function __construct()
  {
    $this->setDrinkHandler()
      ->setIngredientHandler()
      ->setMoneyHandler();
  }

  public function chocolateButton(): null|Chocolate
  {
    $money = $this->getMoneyHandler()->getMoney();
    $milkLevel = $this->getIngredientHandler()->getMilkLevel();
    $sugarLevel = $this->getIngredientHandler()->getSugarLevel();

    $drink = $this->getDrinkHandler()->serveChocolate($money, $milkLevel, $sugarLevel);

    if (!$drink instanceof Chocolate)
    {
      return null;
    }

    $this->getMoneyHandler()->pay($drink->getPrice());

    return $drink;
  }

  public function coffeeButton(): null|Coffee
  {
    $money = $this->getMoneyHandler()->getMoney();
    $milkLevel = $this->getIngredientHandler()->getMilkLevel();
    $sugarLevel = $this->getIngredientHandler()->getSugarLevel();

    $drink = $this->getDrinkHandler()->serveCoffee($money, $milkLevel, $sugarLevel);

    if (!$drink instanceof Coffee)
    {
      return null;
    }

    $this->getMoneyHandler()->pay($drink->getPrice());

    return $drink;
  }

  public function teaButton(): null|Tea
  {
    $money = $this->getMoneyHandler()->getMoney();
    $milkLevel = $this->getIngredientHandler()->getMilkLevel();
    $sugarLevel = $this->getIngredientHandler()->getSugarLevel();

    $drink = $this->getDrinkHandler()->serveTea($money, $milkLevel, $sugarLevel);

    if (!$drink instanceof Tea)
    {
      return null;
    }

    $this->getMoneyHandler()->pay($drink->getPrice());

    return $drink;
  }

  public function addMilkButton(): int
  {
    $this->getIngredientHandler()->addMilk();

    return $this->getIngredientHandler()->getMilkLevel();
  }

  public function addSugarButton(): int
  {
    $this->getIngredientHandler()->addSugar();

    return $this->getIngredientHandler()->getSugarLevel();
  }

  public function insertMoney(int $money): string
  {
    $this->getMoneyHandler()->add($money);

    return $this->getMoneyHandler()->display();
  }

  public function displayMoney(): string
  {
    return $this->getMoneyHandler()->display();
  }

  public function retrieveMoneyButton(): int
  {
    return $this->getMoneyHandler()->retrieve();
  }

  public function setDrinkHandler(): self
  {
    $this->drinkHandler = new DrinkHandler();

    return $this;
  }

  public function getDrinkHandler(): DrinkHandler
  {
    return $this->drinkHandler;
  }

  public function setIngredientHandler(): self
  {
    $this->ingredientHandler = new IngredientHandler();

    return $this;
  }

  public function getIngredientHandler(): IngredientHandler
  {
    return $this->ingredientHandler;
  }

  public function setMoneyHandler(): self
  {
    $this->moneyHandler = new MoneyHandler();

    return $this;
  }

  public function getMoneyHandler(): MoneyHandler
  {
    return $this->moneyHandler;
  }
}
