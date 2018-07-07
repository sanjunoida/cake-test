<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add','folder_id' => $folder_id]) ?></li>
        <?php if($auth['User']['userrole'] == 'admin'){ ?>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<?php } ?>
		<li><?= $this->Html->link(__('List Folders'), ['controller' => 'Folders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Folder'), ['controller' => 'Folders', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="images index large-9 medium-8 columns content">
	
    <h3><?= __('Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
				 <?php if($auth['User']['userrole'] == 'admin'){ ?><th scope="col"><?= $this->Paginator->sort('approved') ?></th><?php } ?>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				
            </tr>
        </thead>
        <tbody>
		
            <?php 
			//egggggo "<pre>"; print_r($images); echo "</pre>";
		       //echo "<pre>"; print_r($auth); echo "</pre>"; 
			foreach ($images as $image): ?>
            <tr>
                <td><?= $this->Number->format($image->id) ?></td>
                <td><?= h($image->name) ?></td>
               <td><?= $this->html->image($image->path) ?></td>
                <td><?= h($image->created) ?></td>
                <td><?= h($image->modified) ?></td>
				
				<?php if($auth['User']['userrole'] == 'admin'){ ?>
				  <td>  <?= $this->Html->link(__($image->approved), ['action' => 'approved', $image->id]) ?> </td>
					<?php } ?>
				
				
                
                <td class="actions">
				    <?php if($auth['User']['userrole'] == 'admin'){ ?><?= $this->Html->link(__($image->approved), ['action' => 'approved', $image->id]) ?><?php } ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?>
                </td>
				
            </tr>
		
            <?php endforeach;
				?>
				
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
