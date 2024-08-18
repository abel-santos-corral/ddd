<?php

namespace Drupal\Tests\responses\Unit\Controller;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\responses\Controller\ExampleJsonController;
use Drupal\Tests\UnitTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * ServiceController unit tests.
 *
 * @ingroup responses
 * @group responses
 *
 * @coversDefaultClass \Drupal\responses\Controller\ExampleJsonController
 */
class ExampleJsonControllerTest extends UnitTestCase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $entityTypeManager;

  /**
   * The user storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $userStorage;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->entityTypeManager = $this->createMock(EntityTypeManagerInterface::class);
    $this->userStorage = $this->createMock(EntityStorageInterface::class);
    $this->entityTypeManager->expects($this->any())
      ->method('getStorage')
      ->with('user')
      ->willReturn($this->userStorage);

    $sender = $this->createMock(AccountInterface::class);
    $this->userStorage->expects($this->any())
      ->method('load')
      ->willReturn($sender);
    // User IDs 1 and 0 have special implications, use 9999 instead.
    $sender->expects($this->any())
      ->method('id')
      ->willReturn(9999);
    $sender->expects($this->once())
      ->method('getDisplayName')
      ->willReturn('Horse Luis');
    $sender->expects($this->once())
      ->method('getEmail')
      ->willReturn('horse.luis@mail.com');
    $sender->expects($this->once())
      ->method('getRoles')
      ->willReturn('[administrator]');

    $container = new ContainerBuilder();
    $container->set('entity_type.manager', $this->entityTypeManager);
    $container->set('current_user', $sender);
    \Drupal::setContainer($container);
  }

  /**
   * Tests the buildCacheableResponse() method of the ExampleJsonController.
   *
   * @covers ::buildCacheableResponse
   */
  public function testbuildCacheableResponse() {
    $jsonController = new ExampleJsonController();

    $response = $jsonController->buildCacheableResponse();
    $this->assertEquals('200', $response->getStatusCode());
    $this->assertEquals('{"user":{"id":9999,"name":"Horse Luis","email":"horse.luis@mail.com","roles":"[administrator]"}}', $response->getContent());
  }

}
