<?php $usuario_logado = $this->session->userdata('usuario_logado') ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php $this->load->view('include/head') ?>

    <!-- Add the class .fixed to <body> for a fixed layout on large resolutions (min: 1200px) -->
    <!-- <body class="fixed"> -->
    <body>
        <!-- Page Container -->
        <div id="page-container">
            <?php $this->load->view('include/header') ?>

            <!-- Inner Container -->
            <div id="inner-container"><!-- Sidebar -->
                <aside id="page-sidebar" class="nav-collapse collapse">
             		<?php $this->load->view('include/menu') ?>
                </aside>
                <!-- END Sidebar -->
                <!-- Page Content -->
                <div id="page-content">
                    <!-- Navigation info -->
                    <ul id="nav-info" class="clearfix">
                        <li><a href="<?php echo base_url();?>"><i class="icon-home"></i></a></li>
                        <li><a href="<?php echo base_url("funcionarios");?>">Funcionários</a></li>
                        <li class="active"><a href="">Novo</a></li>
                    </ul>
                    <!-- END Navigation info -->

                    <!-- Form -->
                    <?php echo form_open('funcionarios/novo',array('class' => 'form-horizontal form-box')); ?>
                        <h4 class="form-box-header">Cadastrar Novo Funcionário</h4>
                        <div class="form-box-content">
                            <div class="control-group">
                                <label class="control-label" id="lblnome">Nome</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="nome" id="txtnome">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sexo</label>
                                <div class="controls">
                                    <label class="radio inline">
                                        <input type="radio" name="sexo" id="masculino" checked="true" value="1"> Masculino
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="sexo" id="feminino" value="0"> Feminino
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data de Nascimento</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="dtnascimento">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tipo do Documento</label>
                                <div class="controls">
                                    <select name="tipodocumento">
                                        <option value="1">RG</option>
                                        <option value="2">CPF</option>
                                        <option value="3">Passaporte</option>
                                        <option value="4">Carteira de Trabalho</option>
                                        <option value="5">Carteira de Motorista</option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" id="lbldocumento">Documento</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="documento" id="documento">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="endereco">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="telefone" id="telefone">
                                </div>
                            </div>
                            <?php if ($usuario_logado['nivel'] > 1): ?>
                                <div class="control-group">
                                    <label class="control-label">Terá acesso ao painel administrativo?</label>
                                    <div class="controls">
                                        <label class="radio inline">
                                            <input type="radio" name="painel_adm" value="1"> Sim
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="painel_adm" value="0" checked="true"> Não
                                        </label>
                                    </div>
                                </div>
                                    <?php if ($usuario_logado['nivel'] == 3): ?>
                                    <div class="control-group">
                                        <label class="control-label">Este funcionário terá acesso à módulos de mais privacidade (caixa, por exemplo)?</label>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio" name="mais_privado" value="1"> Sim
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="mais_privado" value="0" checked="true"> Não
                                            </label>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Senha</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" name="senha">
                                    </div>
                                </div>
                            <?php endif ?>
                      	<div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Cadastrar">
                                <input type="submit" class="btn btn-danger"  value="Cancelar">
                        </div>
                      	</div>
                      	
                    <?php echo form_close(); ?>
                    <!-- END Form -->

                    

                    
                </div>
                <!-- END Page Content -->

                <?php $this->load->view('include/footer'); ?>

        <?php $this->load->view('include/top-right'); ?>
		
    </body>
</html>