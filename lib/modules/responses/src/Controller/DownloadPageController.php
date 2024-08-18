<?php declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Responses routes.
 */
final class DownloadPageController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => '<p>' . $this->t('Click on button to download example pdf') . '</p></br>'
        . '<a class="button--primary button" href="pdf-download" target="_blank">' . $this->t('Download') . '</a>',
    ];

    return $build;
  }

}
