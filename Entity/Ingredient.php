<?php

namespace App\Entity;

use App\Interfaces\IngredientInterface;

abstract class Ingredient implements IngredientInterface
{
  public const DEFAULT_LEVEL = 0;
  public const MAX_LEVEL = 4;

  protected int $level;

  public function __construct()
  {
    $this->setDefaultLevel();
  }

  public function setDefaultLevel(): self
  {
    $this->setLevel(self::DEFAULT_LEVEL);

    return $this;
  }

  /*
  * Increments the ingredient's level up to 4, then sets it back to 0.
  */
  public add(): self
  {
    $currentLevel = $this->getLevel();
    $newLevel = $currentLevel < self::MAX_LEVEL ? $currentLevel++ : 0;
    $this->setLevel($newLevel);

    return $this;
  }

  public function setLevel(int $level): self
  {
    $this->level = $level;

    return $this;
  }

  public function getLevel(): int
  {
    return $this->level;
  }
}
