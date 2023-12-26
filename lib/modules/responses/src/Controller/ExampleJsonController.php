<?php
/**
 * @file
 * Example controller that returns JSON responses.
 */

declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Cache\CacheableJsonResponse;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Controller\ControllerBase;

class ExampleJsonController extends ControllerBase {

  /**
   * Return a cacheable plain text response.
   */
  public function buildCacheableResponse(): CacheableJsonResponse  {
    // Load the complete user object because we need the data in a form that
    // implements \Drupal\Core\Cache\CacheableDependencyInterface.
    $current_user = $this->entityTypeManager()
      ->getStorage('user')
      ->load($this->currentUser()->id());

    // Create some data for the response.
    $output = [
      'user' => [
        'id' => $current_user->id(),
        'name' => $current_user->getDisplayName(),
        'email' => $current_user->getEmail(),
        'roles' => $current_user->getRoles(),
      ],
    ];

    // Create the response with some content and an HTTP 200 status code. The
    // array will be converted to JSON format.
    $response = new CacheableJsonResponse($output, 200);

    // See \Drupal\journey\Controller\ExamplePlainTextControllercacheable for
    // details about adding cacheability data like this.
    $response->addCacheableDependency($current_user);
    $cacheContexts = new CacheableMetadata();
    $cacheContexts->addCacheContexts(['user']);
    $response->addCacheableDependency($cacheContexts);

    return $response;
  }

}
