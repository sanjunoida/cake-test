<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Folder[]|\Cake\Collection\CollectionInterface $folders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Folder'), ['action' => 'add']) ?></li>
		<?php if($auth['User']['userrole'] == 'admin'){ ?>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<?php } ?>
		
    </ul>
</nav>
<div class="folders index large-9 medium-8 columns content">
    <h3><?= __('Folders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($folders as $folder): ?>
            <tr>
                <td><?= $this->Number->format($folder->id) ?></td>
                <td><?= h($folder->name) ?></td>
                <td><?= h($folder->path) ?></td>
                <td><?= h($folder->description) ?></td>
                <td><?= $folder->has('user') ? $this->Html->link($folder->user->id, ['controller' => 'Users', 'action' => 'view', $folder->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller'=>'images','action' => 'index', $folder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $folder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $folder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $folder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
