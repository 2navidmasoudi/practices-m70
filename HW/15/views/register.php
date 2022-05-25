<h1>Create an account</h1>

<?php $form = \app\core\form\Form::begin('', 'POST') ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstname', "First Name") ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname', "Last Name") ?>
    </div>
</div>
<?php echo $form->field($model, 'email', "Email") ?>
<?php echo $form->field($model, 'password', "Password")->passwordField() ?>
<?php echo $form->field($model, 'confirmPassword', "Confirm Password")->passwordField() ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo \app\core\form\Form::end() ?>