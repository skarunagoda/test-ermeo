<?php

namespace App\Interfaces;

interface IngredientInterface
{
  public function setDefaultLevel();
  public function add();
  public function setLevel($level);
  public function getLevel();
}
