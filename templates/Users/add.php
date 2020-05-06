<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-5">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <div class="form-group border rounded p-3">
                    <fieldset>
                        <legend><?= __('Add User') ?></legend>
                        <?php
                            echo $this->Form->control('name',['class'=>'form-control mb-2','placeholder'=>'Username']);
                            echo $this->Form->control('email',['class'=>'form-control mb-2','placeholder'=>'E-mail']);
                            echo $this->Form->control('password',['class'=>'form-control mb-2','placeholder'=>'Password']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button('Submit',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_login']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>