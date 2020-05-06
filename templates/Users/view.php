<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="users view content">
                <h3><?= h($user->name) ?></h3>
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
                        <th><?= __('Password') ?></th>
                        <td><?= h($user->password) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>