<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;

?>
<div id="aros_link" class="acl_links">
    <?php
    $selected = isset($selected) ? $selected : $this->request->getParam('action');

    $links = array();
    $links[] = $this->Html->link(__d('acl', 'Build missing AROs'), '/admin/acl_manager/aros/check', array('class' => ($selected == 'admin_check') ? 'selected' : null));
    $links[] = $this->Html->link(__d('acl', 'Users roles'), '/admin/acl_manager/aros/users', array('class' => ($selected == 'admin_users') ? 'selected' : null));

    if (Configure:: read('acl.gui.roles_permissions.ajax') === true) {
        $links[] = $this->Html->link(__d('acl', 'Roles permissions'), '/admin/acl_manager/aros/ajax_role_permissions', array('class' => ($selected == 'admin_role_permissions' || $selected == 'admin_ajax_role_permissions') ? 'selected' : null));
    } else {
        $links[] = $this->Html->link(__d('acl', 'Roles permissions'), '/admin/acl_manager/aros/role_permissions', array('class' => ($selected == 'admin_role_permissions' || $selected == 'admin_ajax_role_permissions') ? 'selected' : null));
    }
    $links[] = $this->Html->link(__d('acl', 'Users permissions'), '/admin/acl_manager/aros/user_permissions', array('class' => ($selected == 'admin_user_permissions') ? 'selected' : null));

    echo $this->Html->nestedList($links, array('class' => 'acl_links'));
    ?>
</div>