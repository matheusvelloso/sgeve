<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php $this->load->view('include/head-login') ?>

    <body class="login">
        <!-- Login Container -->
        <div id="login-container">
            <div id="login-logo">
                <a href="">
                    <img src="<?php echo base_url('img/template/uadmin_logo.png') ?>" alt="logo">
                </a>
            </div>

            <!-- Login Form -->
            <?php echo form_open('sessao/login',array('class' => 'form-inline', 'id' => 'login-form')) ?>
                <div class="control-group">
                    <div class="input-append">
                        <input type="text" id="email" placeholder="Email.." name="email">
                        <span class="add-on"><i class="icon-envelope-alt"></i></span>
                    </div>
                </div>
                <div class="control-group">
                    <div class="input-append">
                        <input type="password" id="senha" placeholder="Senha.." name="senha">
                        <span class="add-on"><i class="icon-asterisk"></i></span>
                    </div>
                </div>
                <div class="control-group">
                	<?php if($this->session->flashdata('senha_errada')) :?>
                		<p class="alert alert-danger"><?php echo $this->session->flashdata('senha_errada'); ?></p>
                	<?php endif ?>
                	<?php if($this->session->flashdata('logout_sucesso')) :?>
                		<p class="alert alert-success"><?php echo $this->session->flashdata('logout_sucesso'); ?></p>
                	<?php endif ?>
                </div>
                <div class="control-group remove-margin clearfix">
                    <div class="btn-group pull-right">
                        <!-- <button id="login-button-pass" class="btn btn-small btn-warning" data-toggle="tooltip" title="Esqueceu a Senha?"><i class="icon-lock"></i></button>-->
                        <button class="btn btn-small btn-success"><i class="icon-arrow-right"></i> Entrar</button>
                    </div>
                   <!--<div class="input-switch switch-small pull-left" data-toggle="tooltip" title="Remember me" data-on="success" data-off="danger" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                        <input type="checkbox">
                   </div>-->
                </div>
                <div class="control-group">
                		<label class="text-black">Não possui cadastro? <a href="<?php echo base_url('sessao/registrar') ?>" class="active">Registre-se</a>.</label>
                	
                </div>
            <?php echo form_close(); ?>
            <!-- END Login Form -->
        </div>
    </body>
</html>