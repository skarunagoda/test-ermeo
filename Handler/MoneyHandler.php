<?php

namespace App\Handler;

class MoneyHandler
{
  public const DEFAULT_MONEY = 0;

  protected int $money;

  public function __construct()
  {
    $this->setMoney(self::DEFAULT_MONEY);
  }

  public function add(int $money): self
  {
    $newMoney = $this->getMoney() + $money;
    $this->setMoney($newMoney);

    return $this;
  }

  public function pay(int $price): self
  {
    $newMoney = $this->getMoney() - $price;
    $this->setMoney($newMoney);

    return $this;
  }

  public function display(): string
  {
    return $this->getMoney() . " pièces";
  }

  public function retrieve(): int
  {
    $money = $this->getMoney();
    $this->setMoney(0);

    return $money;
  }

  public function setMoney(int $money): self
  {
    $this->money = $money;

    return $this;
  }

  public function getMoney()
  {
    return $this->money;
  }
}
