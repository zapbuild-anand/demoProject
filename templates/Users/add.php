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
                            echo '<span id="error_name" class="text-danger"></span>';
                            echo $this->Form->control('email',['class'=>'form-control mb-2','placeholder'=>'E-mail']);
                            echo '<span id="error_email" class="text-danger"></span>';
                            echo $this->Form->control('password',['class'=>'form-control mb-2','placeholder'=>'Password']);
                            echo '<span id="error_password" class="text-danger"></span>';
                            echo '<input type="checkbox" onclick="myFunction()" class="mb-4">Show Password';
                        ?>
                    </fieldset>
                    <?= $this->Form->button('Submit',['class'=>'btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0','id'=>'btn_signup']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.error-message').addClass('text-danger');
    allowsubmit=0;

    $('#password').keyup(function(e){
        var password=$(this).val();
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/;
        if (!regex.test(password)) {
            error_password='The password does not meet the password policy requirements.<br>';
            $('#error_password').html(error_password);
            $('#password').addClass('has-error');
            allowsubmit=1;

        } else {
            error_password = '';
            $('#error_password').html(error_password);
            $('#password').removeClass('has-error');
            allowsubmit=2;
        }

    });

    $('#btn_signup').click(function(){

    var error_name='';
    var error_email='';
    var error_password='';
    var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if($.trim($('#name').val()).length == 0){
        error_name='*Username is required<br>';
        $('#error_name').html(error_name);
        $('#name').addClass('has-error');
    }
    else{
        error_name = '';
        $('#error_name').html(error_name);
        $('#name').removeClass('has-error');
    }
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

      if (error_email != '' || error_password != '' || error_name != '' || allowsubmit!=2) {
        if(allowsubmit==1)
        {
            error_password='Invalid Password<br>';
            $('#error_password').html(error_password);
        }

        return false;
      }
    });
  });
</script>
