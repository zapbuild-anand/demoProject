<div class="row justify-content-md-center mt-4">
    <div class="col-5 p-3 border rounded">
        <?php if(!isset($myemail)) : ?>
            <?= $this->Form->create(null,['enctype'=>'multipart/form-data','class'=>'form-disable','id'=>'form']) ?>
            <div class="form-group">
                <fieldset>
                    <legend><?= __('Forgot Password') ?></legend>
                    <?php if(!isset($error)) : ?>
                    	<p>Enter your Email ID to create a new password</p>
                    <?php else: ?>
                    	<p class="text-danger"><?= $error ?></p>
                    <?php endif; ?>
                    <div class="form-group">
                        <?= $this->Form->control('email',['class'=>'form-control mb-2','placeholder'=>'E-mail id']);?>
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <p>On Submit, an email with a link to create a password will be sent to your email account</p>
                </fieldset>
                <?= $this->Form->button('Retrieve Password',['class'=>'btn btn-outline-info btn-rounded btn-block my-3 waves-effect z-depth-0']) ?>
                <?= $this->Form->end() ?>
            </div>
        <?php else: ?>
        	<p>Reset password link has been sent to your email <strong><?= $myemail ?></strong>.<br>
        	Please check and click on the link provided in the mail to create a new password.</p>
        	<?= $this->Html->link(__('Ok'), ['controller'=>'users','action' => 'login'], ['class' => 'btn btn-outline-info float-right']) ?>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var allowsubmit = false;
        $('#email').keyup(function(e){
            var filter=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test($('#email').val())) {
                        $('#error_email').html('Invalid Email');
                        $('#email').addClass('has-error');
                        allowsubmit=false;
                    }
                    else{
                        $('#error_email').html('');
                        $('#email').removeClass('has-error');
                        allowsubmit=true;
                    }
        });
        $('#form').submit(function(){
            if ($.trim($('#email').val()).length == 0) {
                    allowsubmit=false;
                    $('#error_email').html('*Email is required');
                    $('#email').addClass('has-error');
                }
            if(allowsubmit)
            {
                $('#submit').attr("disabled","disabled");
                $(document).css('cursor','progress');
                return true;
            }
            else {
                return false;
            }
        });
    });

</script>
