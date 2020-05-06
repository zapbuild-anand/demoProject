<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<div class="col-4">
			<?= $this->Form->create(null,['class'=>'form-inline my-2 my-lg-0']) ?>
				<?= $this->Form->control('search',['type'=>'search','label'=>'','class'=>'form-control mr-sm-2','placeholder'=>'Google search','required'=>true]) ?>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline-success my-2 my-sm-0' ,'type'=>'submit']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php if(isset($keyword)): ?>
			<?= $keyword ?>
			<?php endif; ?>
		</div>
	</div>
</div>