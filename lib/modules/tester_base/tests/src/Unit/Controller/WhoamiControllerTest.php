<?php

namespace Drupal\Tests\tester_base\Unit\Controller;

use Drupal\tester_base\Controller\WhoamiController;
use Drupal\Tests\UnitTestCase;

/**
 * ServiceController unit tests.
 *
 * @ingroup tester_base
 * @group tester_base
 *
 * @coversDefaultClass \Drupal\tester_base\Controller\WhoamiController
 */
class WhoamiControllerTest extends UnitTestCase {

  /**
   * Tests the build() method of the WhoamiController.
   *
   * @covers ::build
   */
  public function testBuild() {
    $whoamiController = new WhoamiController();

    $response = $whoamiController->build();
    $this->assertEquals('<p>This is the content of the <i>Who Am I</i> route!</p>', $response['#markup']);
  }

}
