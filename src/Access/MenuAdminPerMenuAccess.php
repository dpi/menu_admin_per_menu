<?php
/**
 * @file
 * Contains \Drupal\menu_admin_per_menu\Access\MenuAdminPerMenuAccess.
 */

namespace Drupal\menu_admin_per_menu\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Menu\MenuLinkInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\system\Entity\Menu;
use Drupal\menu_link_content\Entity\MenuLinkContent;

/**
 * Checks access for displaying administer menu pages.
 */
class MenuAdminPerMenuAccess {

  /**
   * Return array of all specific menu permissions.
   */
  public static function menu_admin_per_menu_permissions() {
    $permissions = [];
    $menus = menu_ui_get_menus();
    foreach ($menus as $name => $title) {
      $permissions[] = 'administer ' . $name . ' menu items';
    }
    return $permissions;
  }

  /**
   * A custom access check for menu overview page
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
  public function menusOverviewAccess(AccountInterface $account) {
    if ($account->hasPermission('administer menu')) {
      return AccessResult::allowed();
    }
    $permissions = $this::menu_admin_per_menu_permissions();
    foreach ($permissions as $permission) {
      if ($account->hasPermission($permission)) {
        return AccessResult::allowed();
      }
    }
    return AccessResult::neutral();
  }

  /**
   * A custom access check for menu page and add link page.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   * @param \Drupal\system\Entity\Menu $menu
   *   Run access checks for this menu object.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
  public function menuAccess(AccountInterface $account, Menu $menu) {
    $permission = 'administer '. $menu->get('id') .' menu items';
    if ($account->hasPermission('administer menu')
      || $account->hasPermission($permission)) {
      return AccessResult::allowed();
    }
    return AccessResult::neutral();
  }

  /**
   * A custom access check for menu items page.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   * @param \Drupal\menu_link_content\Entity\MenuLinkContent $menu_link_content
   *   Run access checks for this menu item object.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
  public function menuItemAccess(AccountInterface $account, MenuLinkContent $menu_link_content = NULL) {
    $permission = 'administer '. $menu_link_content->getMenuName() .' menu items';
    if ($account->hasPermission('administer menu')
      || $account->hasPermission($permission)) {
      return AccessResult::allowed();
    }
    return AccessResult::neutral();
  }

  /**
   * A custom access check for menu link page.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   * @param \Drupal\Core\Menu\MenuLinkInterface $menu_link_plugin
   *   Run access checks for this menu link object.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   The access result.
   */
  public function menuLinkAccess(AccountInterface $account, MenuLinkInterface $menu_link_plugin = NULL) {
    $permission = 'administer '. $menu_link_plugin->getMenuName() .' menu items';
    if ($account->hasPermission('administer menu')
      || $account->hasPermission($permission)) {
      return AccessResult::allowed();
    }
    return AccessResult::neutral();
  }

}
