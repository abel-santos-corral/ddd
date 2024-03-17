<?php

declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\HtmlResponse;

/**
 * Example plain html controller.
 */
class ExamplePlainHtmlController extends ControllerBase {

  /**
   * Return a plain HTML response.
   */
  public function build(): HtmlResponse {
    // Create a response object with just a string of HTML.
    $response = new HtmlResponse('<marquee>Nothing but HTML, baby</marquee>', 200);
    return $response;
  }

}
