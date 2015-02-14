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
			<div class="control-group">
                    <h4>Registre-se</h4>
                    <h6>E começe hoje mesmo a organizar a sua empresa</h6>
            </div>
            <!-- Login Form -->
            <?php echo form_open('sessao/registrar',array('class' => 'form-inline', 'id' => 'login-form')) ?>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" id="nome" name="nome" placeholder="Digite seu nome:">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" id="email" name="email" placeholder="Digite seu e-mail:">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-briefcase"></i></span>
                            <input type="text" id="nome_empresa" name="nome_empresa" placeholder="Digite o nome da sua empresa:">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-asterisk"></i></span>
                        <input type="password" id="senha" name="senha" placeholder="Digite a senha:">
                    </div>
                </div>
                <div class="control-group">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-asterisk"></i></span>
                        <input type="password" id="conf_senha" name="conf_senha" placeholder="Confirme a senha:">
                    </div>
                </div>
                <div class="control-group">
                	<?php if($this->session->flashdata('senha_errada')) :?>
                		<p class="alert alert-danger"><?php echo $this->session->flashdata('senha_errada'); ?></p>
                	<?php endif ?>
                </div>
                <div class="control-group remove-margin clearfix">
                    <div class="btn-group pull-right">
                        <!-- <button id="login-button-pass" class="btn btn-small btn-warning" data-toggle="tooltip" title="Esqueceu a Senha?"><i class="icon-lock"></i></button>-->
                        <button class="btn btn-small btn-success"><i class="icon-arrow-right"></i> Cadastrar</button>
                    </div>
                   <!--<div class="input-switch switch-small pull-left" data-toggle="tooltip" title="Remember me" data-on="success" data-off="danger" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
                        <input type="checkbox">
                   </div>-->
                </div>
            <?php echo form_close(); ?>
            <!-- END Login Form -->
        </div>
    </body>
</html>