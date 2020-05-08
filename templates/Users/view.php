<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-6">
            <div class="users view content">
                <h3><?= h($user->name) ?></h3>
                <?= $this->Html->link('Edit Profile', ['controller'=>'users','action' => 'edit-profile'],['class'=>'float-right']) ?>
                <table class="table">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($user->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Registered On') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>