<?php

declare(strict_types = 1);

/**
 * @file
 */

namespace Drupal\subscriber;

use Drupal\views\EntityViewsData;

class SubscriberEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Note that $data['subscriber']['email'] was already defined when the base
    // class added data about base fields. We're extending that definition here.
    // Though you could also override it completely. Or add entirely new fields
    // here as well.
    $data['subscriber']['email']['relationship'] = [
      'title' => $this->t('Related users'),
      'help' => $this->t('Relate users to subscribers.'),
      'base' => 'users_field_data',
      'base field' => 'mail',
      // ID of relationship handler plugin to use.
      'id' => 'standard',
      // Default label for relationship in the UI.
      'label' => $this->t('Related users'),
    ];

    return $data;
  }

}
