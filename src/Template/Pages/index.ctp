<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>

<div class="row">

 <?php 
			//egggggo "<pre>"; print_r($images); echo "</pre>";
		
			foreach ($images as $image): ?>
			
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="#">
	 <?php echo $this->html->image($image->path) ?>
        
        <div class="caption">
          <p> <td><?= h($image->name) ?></td></p>
        </div>
      </a>
    </div>
  </div>
  <?php endforeach; ?>
  
  
</div>

