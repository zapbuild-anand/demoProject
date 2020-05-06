<div class="container-fluid">
    <div class="row justify-content-center p-2 mt-5">
        <div class="col-5">
            <?= $this->Form->create() ?>
            <div class="form-group border rounded p-3">
                <fieldset>
                    <legend class="text-center"><?= __('Login') ?></legend>
                    <?= $this->Form->control('email', ['class'=>'form-control mb-2','placeholder'=>'E-mail']) ?>
                    <span id="error_email" class="text-danger"></span>
                    <?= $this->Form->control('password',['class'=>'form-control mb-2','placeholder'=>'E-mail']) ?>
                    <span id="error_password" class="text-danger"></span>
                </fieldset>
                <?= $this->Form->button('Login',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_login']) ?>
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
