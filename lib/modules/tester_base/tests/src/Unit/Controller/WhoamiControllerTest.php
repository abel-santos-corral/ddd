<?php

namespace Drupal\Tests\cas\Unit\Controller;

use Drupal\tester_base\Controller\WhoamiController;
use Drupal\Tests\UnitTestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * ServiceController unit tests.
 *
 * @ingroup tester_base
 * @group tester_base
 *
 * @coversDefaultClass \Drupal\tester_base\Controller\WhoamiController
 */
class WhoamiControllerTest extends UnitTestCase {

  public function testBuild() {
    $whoamiController = new WhoamiController();

    $response = $whoamiController->build();
    $this->assertEquals('<p>This is the content of the <i>Who Am I</i> route!</p>', $response['#markup']);
  }
}
