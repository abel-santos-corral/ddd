<?php

namespace Drupal\tester_base\Controller;

/**
 * Controller for the whoami route.
 */
class WhoamiController {

  /**
   * Builds raw page for testing.
   *
   * @return string[]
   *   Returns raw html for testing purpose.
   */
  public function build() {
    return [
      '#markup' => '<p>This is the content of the <i>Who Am I</i> route!</p>',
    ];
  }

}
