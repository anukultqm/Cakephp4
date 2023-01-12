<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>   
            <?php
            // $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item'])
             ?>   

            <?= $this->fetch('css') ?>
          <?= $this->fetch('script') ?>

      
        </div>
    </aside>
    <div class="column-responsive column-80">
   
        <div class="users form content">     
        <?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => 'button float-right']) ?>    
            <?= $this->Form->create($user,['type'=>'file']) ?>
            <fieldset>    
                <legend><?= __('Add User') ?></legend>                
                <?php
                    echo $this->Form->control('fname',['required'=>false]);
                    echo $this->Form->control('lname',['required'=>false]);
                    echo $this->Form->control('phone',['required'=>false]);
                    echo $this->Form->control('email',['required'=>false]);
                    echo $this->Form->control('password',['required'=>false]);
                    echo $this->Form->radio('gender',['male'=>'male','female'=>'female'],['empty' => 'Gender',]);
                    echo $this->Form->control('image_file',['type'=>'file']);

                    // echo $this->Form->control('created_date', ['empty' => true]);
                    // echo $this->Form->control('modified_date', ['empty' => true]);
                    // echo $this->Form->control('code',['required'=>false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
jQuery.validator.addMethod("regex", function(value, element, param) {return value.match(new RegExp("^" + param + "$")); });
    var ALPHA_REGEX = "[a-zA-Z]*";
    
$(document).ready(function() {
    $("form").validate({
      rules: {
        fname : {
          regex: ALPHA_REGEX,
          required: true,
          minlength: 2,
        },
        lname : {
          regex: ALPHA_REGEX,
          required: true,
          minlength: 2,
        },
         password: {
            required: true,
            minlength: 3
        },
        cpassword: {
            required: true,
            minlength: 3,
            equalTo: "#password"
        },
        email :{
            required : true,
            email: true,
        },
        phone :{
            required : true,
            digits: true,
            minlength: 10
        },
        gender :{
          required : true,       
        
      }
    },
     messages : {
        fname: {
        regex : "Name should be only in letters",
        required: "Please enter your name",
        minlength: "Name should be at least 2 characters"
        },
        lname :{
        regex : "Name should be only in letters",
        required: "Please enter your last name",
        minlength: "Name should be at least 2 characters"
        },
        password : {
        required: "Please fill password",
        minlength: "Password should be atleast 5 characters long",
        },
        cpassword : {
        required: "Please fill password",
        minlength: "Password should be atleast 5 characters long",
        equalTo: "Password not matched",
        },
        email :{
        required : "Please fill Email",
        email : "Please enter a valid email format"
        },
        phone:{
        required : "please enter your Phone number",
        digits: "Only digits allowed",
        minlength: "phone should be at least 10 digits"
        },
        gender:{
          required : "please enter your gender",       
          },
        
    },
    // submitHandler: function(form){
    //   form.submit();

    
    // },
    
})
})
</script>