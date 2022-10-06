
<?php
/**
 * @var \App\View\AppView $this

 *


 */

$formTemplate =
    [

        'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
        'input' => '<input type="{{type}}" name="{{name}}"  class="form-control" {{attrs}} />',
        'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
        'label' => '<label{{attrs}} class="form-label"> {{text}}</label>',
        'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
        'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
        'textarea' => '<textarea name="{{name}}" class="form-control" {{attrs}}>{{value}}</textarea>',
    ];

$this->Form->setTemplates($formTemplate);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GAtech - Login</title>

    <!-- Custom fonts for this template-->

    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>


    <!-- Custom styles for this template-->
    <?= $this->Html->css('/css/sb-admin-2.min.css') ?>
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                    <div class="users form">
                                        <?= $this->Flash->render() ?>
                                        <h3>Login</h3>
                                        <?= $this->Form->create() ?>
                                        <fieldset>
                                            <legend><?= __('Please enter your username and password') ?></legend>
                                            <?= $this->Form->control('email', ['required' => true]) ?>
                                            <?= $this->Form->control('password', ['required' => true]) ?>
                                        </fieldset>
                                        <br>
                                        <?= $this->Form->submit(__('Login'),['class'=>'btn btn-primary btn-user btn-block']); ?>
                                        <?= $this->Form->end() ?>

                                    </div>


                                <hr>
                                <div class="text-center">

                                    <a class="small" "><?= $this->Html->link("Create an Account!", ['action' => 'add']) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<?= $this->Html->script('/vendor/jquery/jquery.min.js')?>
<?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js')?>

<!-- Core plugin JavaScript-->
<?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js')?>
<!-- Custom scripts for all pages-->
<?= $this->Html->script('sb-admin-2.min.js')?>





</body>

</html>

