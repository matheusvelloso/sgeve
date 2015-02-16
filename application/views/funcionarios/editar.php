<?php $usuario_logado = $this->session->userdata('usuario_logado') ?>
<?php if ($usuario_logado['nivel'] <= $funcionario['nivel']){
    $this->session->set_flashdata('falha_acao','Não foi possível executar a ação desejada.');
    redirect('funcionarios');
}?>
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
                                    <input type="text" class="input-xlarge" name="nome" id="txtnome" value="<?php echo $funcionario['nome'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sexo</label>
                                <?php
                                    $t1 = $funcionario['sexo'] == 1 ? 'checked="checked"' : '';
                                    $t0 = $funcionario['sexo'] == 0 ? 'checked="checked"' : '';
                                ?>
                                <div class="controls">
                                    <label class="radio inline">
                                        <input type="radio" name="sexo" id="masculino" checked="true" value="1" <?php echo $t1; ?>> Masculino
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="sexo" id="feminino" value="0" <?php echo $t0; ?>> Feminino
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Data de Nascimento</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="dtnascimento" value="<?php echo $funcionario['dtnascimento'] ?>">
                                </div>
                            </div>
                            <?php
                                $d1 = $funcionario['tipodocumento'] == 1 ? 'selected' : '';
                                $d2 = $funcionario['tipodocumento'] == 2 ? 'selected' : '';
                                $d3 = $funcionario['tipodocumento'] == 3 ? 'selected' : '';
                                $d4 = $funcionario['tipodocumento'] == 4 ? 'selected' : '';
                                $d5 = $funcionario['tipodocumento'] == 5 ? 'selected' : '';
                            ?>
                            <div class="control-group">
                                <label class="control-label">Tipo do Documento</label>
                                <div class="controls">
                                    <select name="tipodocumento">
                                        <option value="1" <?php echo $d1 ?>>RG</option>
                                        <option value="2" <?php echo $d2 ?>>CPF</option>
                                        <option value="3" <?php echo $d3 ?>>Passaporte</option>
                                        <option value="4" <?php echo $d4 ?>>Carteira de Trabalho</option>
                                        <option value="5" <?php echo $d5 ?>>Carteira de Motorista</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" id="lbldocumento">Documento</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="documento" id="documento" value="<?php echo $funcionario['documento'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="endereco" value="<?php echo $funcionario['endereco'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="telefone" id="telefone" value="<?php echo $funcionario['telefone'] ?>">
                                </div>
                            </div>
                            <?php if ($usuario_logado['nivel'] > 1): ?>
                                <div class="control-group">
                                    <label class="control-label">Terá acesso ao painel administrativo?</label>
                                    <?php
                                        $t1 = $funcionario['nivel'] >= 1 ? 'checked="checked"' : '';
                                        $t0 = $funcionario['nivel'] == 0 ? 'checked="checked"' : '';
                                    ?>
                                    <div class="controls">
                                        <label class="radio inline">
                                            <input type="radio" name="painel_adm" value="1" <?php echo $t1; ?>> Sim
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="painel_adm" value="0" <?php echo $t0; ?>> Não
                                        </label>
                                    </div>
                                </div>
                                    <?php if ($usuario_logado['nivel'] == 3): ?>
                                    <div class="control-group">
                                        <label class="control-label">Este funcionário terá acesso à módulos de mais privacidade (caixa, por exemplo)?</label>
                                        <?php
                                            $t1 = $funcionario['nivel'] >= 2 ? 'checked="checked"' : '';
                                            $t0 = $funcionario['nivel'] <= 1 ? 'checked="checked"' : '';
                                        ?>
                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio" name="mais_privado" value="1" <?php echo $t1; ?>> Sim
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="mais_privado" value="0" <?php echo $t0; ?>> Não
                                            </label>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="email" value="<?php echo $funcionario['email'] ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Senha</label>
                                    <div class="controls">
                                        <input type="password" class="input-xlarge" name="senha" value="<?php echo $funcionario['senha'] ?>">
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