<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-5 p-3 mt-5">
        <?= $this->Form->create() ?>
            <div class="form-group border rounded p-3">
                <fieldset>
                    <legend class="text-center"><?= __('Login') ?></legend>
                    <?= $this->Form->control('email', ['class'=>'form-control mb-2','placeholder'=>'E-mail']) ?>
                    <span id="error_email" class="text-danger"></span>
                    <?= $this->Form->control('password',['class'=>'form-control mb-2','placeholder'=>'Password']) ?>
                    <span id="error_password" class="text-danger"></span>
                    <input type="checkbox" onclick="myFunction()" class="mb-4">Show Password
                </fieldset>
                <div class="mb-4">
                    <div class="float-right">
                        <?= $this->Html->link(__('Forgot Password?'), ['controller'=>'users','action' => 'forgot-password']) ?>
                    </div>
                </div>
                <?= $this->Form->button('Login',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_login']) ?>
                <div class="text-md-center">
                  Don't have an account! <?= $this->Html->link(__('Register now'), ['action' => 'add']) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('#btn_login').click(function(){

      var error_email='';
      var error_password='';
      var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if ($.trim($('#email').val()).length == 0) {
        error_email='*Email is required';
        $('#error_email').html(error_email);
        $('#email').addClass('has-error');
      }
      else{
        if (!filter.test($('#email').val())) {
          error_email = 'Invalid Email';
          $('#error_email').html(error_email);
          $('#email').addClass('has-error');
        }
        else{
          error_email = '';
          $('#error_email').html(error_email);
          $('#email').removeClass('has-error');
        }
      }
      if($.trim($('#password').val()).length == 0){
        error_password='*Password is required<br>';
        $('#error_password').html(error_password);
        $('#password').addClass('has-error');
      }
      else{
          error_password = '';
          $('#error_password').html(error_password);
          $('#password').removeClass('has-error');
      }

      if (error_email != '' || error_password != '') {
        return false;
      }
    });
  });
</script>
