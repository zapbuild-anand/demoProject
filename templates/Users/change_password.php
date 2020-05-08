<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-5 p-3 mt-5">
                <?= $this->Form->create(null,['id'=>'form','enctype'=>'multipart/form-data','class'=>'form-disable','autocomplete'=>'off']) ?>
                <div class="form-group border rounded p-3">
                    <fieldset>
                        <legend class="text-center"><?= __('Change Password') ?></legend>
                        <?php
                            echo $this->Form->control('currentpassword',['label'=>'Current Password','class'=>'form-control mb-2','type'=>'password']);
                            echo '<span id="error_currentpassword" class="text-danger"></span>';
                            echo $this->Form->control('password',['label'=>'New Password','class'=>'form-control mb-2']);
                            echo '<span id="error_password" class="text-danger"></span>';
                            echo '<input type="checkbox" onclick="myFunction()" class="mb-4">Show Password';
                            echo $this->Form->control('confirmpassword',['label'=>'Confirm New Password','class'=>'form-control mb-2','type'=>'password','disabled'=>'true']);
                            echo '<span id="error_confirmpassword" class="text-danger"></span>';
                        ?>
                    </fieldset>
                    <?= $this->Form->button('Submit',['id'=>'submit','class'=>'btn btn-outline-info btn-rounded btn-block my-4']) ?>
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
        var allowsubmit = false;
        $(function(){
            //on keypress 
            $('#confirmpassword').keyup(function(e){
                //get values 
                var password = $('#password').val();
                var confirmpassword = $(this).val();
                
                //check the strings
                if(password == confirmpassword){
                    //if both are same remove the error and allow to submit
                    $('#error_confirmpassword').text('');
                    allowsubmit = true;
                }else{
                    //if not matching show error and not allow to submit
                    $('#error_confirmpassword').text('Password not matching');
                    allowsubmit = false;
                }
            });

            //on keypress 
            $('#password').keyup(function(e){
                var password=$(this).val();
                var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,}$/;
                if (!regex.test(password)) {
                    error_password='The password does not meet the password policy requirements.<br>';
                    $('#error_password').html(error_password);
                    $('#password').addClass('has-error');
                    $('#confirmpassword').attr('disabled','true');
                    allowsubmit=false;

                } else {
                    error_password = '';
                    $('#error_password').html(error_password);
                    $('#password').removeClass('has-error');
                    $('#confirmpassword').removeAttr('disabled');
                }

            });

            $('#form').submit(function(){
                var error_password='';
                var error_currentpassword='';
                if($.trim($('#currentpassword').val()).length == 0){
                    error_currentpassword="*Current Password is required<br>";
                    $('#error_currentpassword').html(error_currentpassword);
                }
                else{
                    error_currentpassword = '';
                    $('#error_currentpassword').html(error_currentpassword);
                    $('#currentpassword').removeClass('has-error');
                }

                if($.trim($('#password').val()).length == 0){
                    error_password="*Password is required<br>";
                    $('#error_password').html(error_password);
                }
                else{
                    
                }

                if($.trim($('#password').val()).length == 0){
                    error_password="*Password is required<br>";
                    $('#error_password').html(error_password);
                }
                else{
                    
                }

                if($.trim($('#confirmpassword').val()).length == 0){
                    error_confirmpassword='*Confirm Password is required';
                    $('#error_confirmpassword').html(error_confirmpassword);
                    $('#confirmpassword').addClass('has-error');

                }
                else{
                    error_password = '';
                    $('#error_password').html(error_password);
                    $('#password').removeClass('has-error');
                }

                var password = $('#password').val();
                var confirmpassword = $('#confirmpassword').val();
 
                //just to make sure once again during submit
                //if both are true then only allow submit
                if(password == confirmpassword){
                    allowsubmit = true;
                }
                else{
                    allowsubmit=false;
                    error_confirmpassword='Password not matching';
                    $('#error_confirmpassword').html(error_confirmpassword);
                    $('#confirmpassword').addClass('has-error');
                }
                if(allowsubmit && error_password=='' && error_currentpassword==''){
                    $('#submit').attr("disabled","disabled");
                    $(document).css('cursor','progress');
                    return true;
                }else{
                    return false;
                }
            });
        });
</script>