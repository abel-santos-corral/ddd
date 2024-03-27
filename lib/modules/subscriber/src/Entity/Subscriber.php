<?php declare(strict_types = 1);

namespace Drupal\subscriber\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\subscriber\SubscriberInterface;

/**
 * Defines the subscriber entity class.
 *
 * @ContentEntityType(
 *   id = "subscriber",
 *   label = @Translation("Subscriber"),
 *   label_collection = @Translation("Subscribers"),
 *   label_singular = @Translation("subscriber"),
 *   label_plural = @Translation("subscribers"),
 *   label_count = @PluralTranslation(
 *     singular = "@count subscribers",
 *     plural = "@count subscribers",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\subscriber\SubscriberListBuilder",
 *     "views_data" = "Drupal\subscriber\SubscriberEntityViewsData",
 *     "form" = {
 *       "add" = "Drupal\subscriber\Form\SubscriberForm",
 *       "edit" = "Drupal\subscriber\Form\SubscriberForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "delete-multiple-confirm" = "Drupal\Core\Entity\Form\DeleteMultipleForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "subscriber",
 *   admin_permission = "administer subscriber",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "id",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/subscriber",
 *     "add-form" = "/admin/content/subscriber/add",
 *     "canonical" = "/admin/content/subscriber/{subscriber}",
 *     "edit-form" = "/admin/content/subscriber/{subscriber}/edit",
 *     "delete-form" = "/admin/content/subscriber/{subscriber}/delete",
 *     "delete-multiple-form" = "/admin/content/subscriber/delete-multiple",
 *   },
 *   field_ui_base_route = "entity.subscriber.settings",
 * )
 */
final class Subscriber extends ContentEntityBase implements SubscriberInterface {
  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add an email base field to the subscriber entity type.
    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('The email of the subsciber.'))
      ->setDefaultValue('')
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE)
      ->addConstraint('UserMailRequired')
      ->addConstraint('UserMailUnique');

    return $fields;
  }
}
