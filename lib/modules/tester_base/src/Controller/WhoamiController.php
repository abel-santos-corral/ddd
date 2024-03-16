<?php
/**
 * @file
 * Controller for the whoami route.
 */

namespace Drupal\tester_base\Controller;

class WhoamiController {

  public function build() {
    return [
      '#markup' => '<p>This is the content of the <i>Who Am I</i> route!</p>',
    ];
  }

}
