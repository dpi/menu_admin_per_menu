// $Id$

MENU ADMIN PER MENU

DESCRIPTION
By default, Drupal 6 allows only users with "administer menu" permission to add, modify or delete menu items.
In case you want for instance to let certain users manage primary links or secondary links but not navigation menu, this module provides this functionality.

INSTALLATION
Copy the menu_admin_per_menu folder to your sites/all/modules directory.
Navigate to admin/build/modules and enable the module
Navigate to admin/user/permissions
To give to a role the rights to modify only certains menus, make sure "administer menu" is unchecked and check the desired "administer 'menuname' menu items" permissions.

If users with "administer 'menuname' menu items" permissions don't have the "access administration pages" permission,
they will not by default be able to see Navigation's "Menus" item (admin/build/menu).
So don't forget to move this item to the root of Navigation menu or somewhere else it can be seen by those users.

RELATED MODULES
You might also be interested in the "Menu Settings per Content Type" module (http://drupal.org/project/ctm):
This module allow to set the Menu Settings with certain Menus for content editing by Content Type.

CONTACT
Henri MEDOT <henri.medot[AT]absyx[DOT]fr>
http://www.absyx.fr
