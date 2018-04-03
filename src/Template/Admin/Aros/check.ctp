<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="aros check large-9 medium-8 columns content">

    <?php
    echo $this->element('design/header');
    ?>

    <?php
    echo $this->element('Aros/links');
    ?>

    <?php
    if (count($missing_aros['roles']) > 0) {
        echo '<h3>' . __d('acl', 'Roles without corresponding Aro') . '</h3>';

        $list = array();
        foreach ($missing_aros['roles'] as $missing_aro) {
            $list[] = $missing_aro->{$role_display_field};
        }

        echo $this->Html->nestedList($list);
    }
    ?>

    <?php
    if (count($missing_aros['users']) > 0) {
        echo '<h3>' . __d('acl', 'Users without corresponding Aro') . '</h3>';

        $list = array();
        foreach ($missing_aros['users'] as $missing_aro) {
            $list[] = $missing_aro->{$user_display_field};
        }

        echo $this->Html->nestedList($list);
    }
    ?>

    <?php
    if (count($missing_aros['roles']) > 0 || count($missing_aros['users']) > 0) {
        echo '<p>';
        echo $this->Html->link(__d('acl', 'Build'), '/admin/acl_manager/aros/check/run');
        echo '</p>';
    } else {
        echo '<p>';
        echo __d('acl', 'There is no missing ARO.');
        echo '</p>';
    }
    ?>

    <?php
    echo $this->element('design/footer');
    ?>

</div>