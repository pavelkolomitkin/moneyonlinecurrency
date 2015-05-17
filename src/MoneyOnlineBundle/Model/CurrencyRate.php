<?php

namespace MoneyOnlineBundle\Model;


class CurrencyRate
{
  private $code;

  private $name;

  private $value;

  public function __construct($code, $name, $value)
  {
    $this->setCode($code)
      ->setName($name)
      ->setValue($value);
  }

  public function getCode()
  {
    return $this->code;
  }

  public function setCode($code)
  {
    $this->code = $code;
    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function getValue()
  {
    return $this->value;
  }

  public function setValue($value)
  {
    $this->value = $value;
    return $this;
  }
}