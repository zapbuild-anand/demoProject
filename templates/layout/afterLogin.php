<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->fetch('meta') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">DemoProject</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav">
            <?php $session = $this->getRequest()->getSession();
                $user_id= $session->read('Auth.id');
                $user_name=$session->read('Auth.name');
            ?>
            <li>
                <div class="nav-item dropdown pmd-dropdown pmd-user-info ml-auto">
                    <a href="javascript:void(0);" class="btn-user dropdown-toggle media align-items-center" data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
                    <?= $this->Html->image('avtar.png', ['class'=>'mr-2','style'=>'border-radius: 50%;','alt' => 'CakePHP','width'=>'40','height'=>'40']); ?>
                    <div class="media-body text-light">
                        <?= $user_name ?>
                    </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <?= $this->Html->link(__('Modify Profile'), ['controller'=>'users','action' => 'profile'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Change Password'), ['controller'=>'users','action' => 'change-password'], ['class' => 'dropdown-item']) ?>
                        <?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'], ['class' => 'dropdown-item btn btn-outline-danger float-right']) ?>
                    </ul>
                </div>
             </li>
        </ul>
      </div>
    </nav>
    <main class="main"> 
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?> 
    </main>
    <footer>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<?= $this->Html->script('bootstrap.min.js') ?>
</body>
</html>
