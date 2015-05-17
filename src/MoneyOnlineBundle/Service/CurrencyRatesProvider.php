<?php

namespace MoneyOnlineBundle\Service;

use GuzzleHttp\Query;
use MoneyOnlineBundle\Model\CurrencyRate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Client;
use Symfony\Component\Validator\Constraints\True;

class CurrencyRatesProvider
{

  private $restClient;

  /**
   * @var url сервиса
   */
  private $source;

  public function __construct($source)
  {
    $this->source = $source;

    $this->restClient = new \GuzzleHttp\Client();
  }

  /**
   * Обращается к стороннему сервису и возвращает набор объектов - информацию о курсах волют
   *
   * @return array
   */
  public function getRates()
  {
    $result = array();

    $response = $this->restClient->post($this->source, array(
      'allow_redirects' => true,
      'verify' => false,
      'headers' => array(
        'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8'
      ),
      'body' => array(
        'xml' => '<request><action>get_currency_rates</action></request>'
      )
    ));

    $xml = $response->xml();
    foreach ($xml->currency as $item)
    {
      $result[] = new CurrencyRate($item->code[0], $item->name[0], $item->value[0]);
    }

    return $result;
  }
}