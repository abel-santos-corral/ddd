<?php

/**
 * @file
 * Example controller that returns plain text responses.
 */

declare(strict_types = 1);

namespace Drupal\responses\Controller;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\CacheableResponse;
use Drupal\Core\Controller\ControllerBase;

class ExamplePlainTextControllerCacheable extends ControllerBase {

  /**
   * Return a cacheable plain text response.
   */
  public function buildCacheableResponse(): CacheableResponse  {
    // Load the complete user object because we need the data in a form that
    // implements \Drupal\Core\Cache\CacheableDependencyInterface.
    $current_user = $this->entityTypeManager()
      ->getStorage('user')
      ->load($this->currentUser()->id());

    // Create the response with some content and an HTTP 200 status code. And
    // set it to plain text.
    $response = new CacheableResponse($this->t('Hello @name', ['@name' => $current_user->getDisplayName()])->render(), 200);
    $response->headers->set('Content-Type', 'text/plain');

    // Then, we need to add cacheability data to the response. Usually you
    // would do this in the #cache property of the renderable array.
    //
    // Add the current user as a cache dependency because the output contains
    // the username, so we want it to vary by user. The effect is that
    // a cache tag for the user:{UID} is added. If the user edits their name
    // it will invalidate the cache.
    $response->addCacheableDependency($current_user);

    // We also need to tell the cache to vary per user who is viewing the page.
    // That's because this page shows you information about the currently
    // logged-in user. The effect of this is a cache context for 'user' is
    // added, so Drupal will make sure and vary the cache for each logged-in
    // user.
    $cacheContexts = new CacheableMetadata();
    $cacheContexts->addCacheContexts(['user']);
    $response->addCacheableDependency($cacheContexts);

    return $response;
  }

}
