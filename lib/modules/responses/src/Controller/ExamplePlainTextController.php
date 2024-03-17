<?php

declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Example plain text controller.
 */
class ExamplePlainTextController extends ControllerBase {

  /**
   * Return a plain text response.
   */
  public function build(): Response {
    // Create a response object with just a string of text.
    $response = new Response($this->t('Nothing but text, baby!')->render(), 200);

    // Set the content type header to text/plain.
    $response->headers->set('Content-Type', 'text/plain');

    return $response;
  }

}
