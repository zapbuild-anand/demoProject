<div class="row justify-content-md-center">
    <div class="col-6 p-3">
            <?= $this->Form->create(null,['enctype'=>'multipart/form-data','class'=>'form-disable','id'=>'form']) ?>
            <div class="form-group p-3">
                <fieldset>
                    <legend><?= __('Reset Password') ?></legend>
                    <?php
                        echo $this->Form->control('password',['label'=>'New Password','class'=>'form-control mb-2']);
                        echo '<span id="error_password" class="text-danger"></span>';
                        echo '<input type="checkbox" onclick="myFunction()" class="mb-4">Show Password';
                        echo $this->Form->control('confirmpassword',['label'=>'Confirm New Password','class'=>'form-control mb-2','type'=>'password','disabled'=>'true']);
                        echo '<span id="error_confirmpassword" class="text-danger"></span>';
                    ?>
                </fieldset>
                <?= $this->Form->button('Submit',['class'=>'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
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
                if(allowsubmit && error_password==''){
                    $('#submit').attr("disabled","disabled");
                    $(document).css('cursor','progress');
                    return true;
                }else{
                    return false;
                }
            });
        });
</script>