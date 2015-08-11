<?php

/**
 * @file
 * Contains \Drupal\menu_admin_per_menu\Routing\RouteSubscriber.
 */

namespace Drupal\menu_admin_per_menu\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.menu.collection')) {
      $route->setRequirements(['_custom_access' => '_menu_admin_per_menu_access']);
    }
  }

}