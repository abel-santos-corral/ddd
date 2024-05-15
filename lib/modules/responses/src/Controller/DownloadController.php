<?php

declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadController extends ControllerBase {
  /**
   * Downloads a file.
   *
   * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
   *   The file response.
   */
  public function page(): BinaryFileResponse {
    // File paths are relative to the document root (web).
    $file_path = 'modules/custom/responses/resources/lipsum1.pdf';
    /** @var \Drupal\Core\File\MimeType\
    MimeTypeGuesser $guesser */
    $guesser = \Drupal::service('file.mime_type.guesser');
    $mime_type = $guesser->guessMimeType($file_path);
    $response = new BinaryFileResponse($file_path);
    $response->headers->set('Content-Type', $mime_type);
    $response->setContentDisposition('attachment',basename($file_path));
    return $response;
  }
}
