<?php

namespace Drupal\Tests\tdd_tiered_price\Unit;

use Drupal\tdd_tiered_price\TddTieredPrice;
use Drupal\Tests\UnitTestCase;

/**
 * TddTieredPrice unit tests.
 *
 * @ingroup tdd
 * @group tdd
 *
 * @coversDefaultClass \Drupal\tdd_tiered_price\TddTieredPrice
 */
class TddTieredPriceTest extends UnitTestCase {

  /**
   * Test getting a tiered price.
   *
   * @covers ::getTieredPrice
   */
  public function testGetTieredPrice() {
    $expected_result = 299;
    $tdd_tiered_price = new TddTieredPrice();
    $this->assertEquals($expected_result, $tdd_tiered_price->getTieredPrice(1));
  }

}
