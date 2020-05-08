<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-5">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <div class="form-group border rounded p-3">
                    <fieldset>
                        <legend class="text-center"><?= __('Edit Profile') ?></legend>
                        <?php
                            echo $this->Form->control('name',['class'=>'form-control mb-2','placeholder'=>'Username']);
                            echo $this->Form->control('email',['class'=>'form-control mb-2','placeholder'=>'E-mail']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button('Update',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_login']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>