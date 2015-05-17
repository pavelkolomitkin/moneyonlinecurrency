<?php

namespace MoneyOnlineBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CurrencyRateController extends Controller
{

  /**
   * @param Request $request
   * @Template()
   */
  public function indexAction(Request $request)
  {
    $rates = array();
    $isServiceAvailable = true;

    try
    {
      $rates = $this->get('money_online.currency_rates_provider')->getRates();
    }
    catch (\Exception $exception)
    {
      $isServiceAvailable = false;
    }

    return array(
      'rates' => $rates,
      'isServiceAvailable' => $isServiceAvailable
    );
  }
}