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
                        <li><a href="<?php echo base_url("clientes");?>">Clientes</a></li>
                        <li class="active"><a href="">Editar</a></li>
                    </ul>
                    <!-- END Navigation info -->
                    <!-- Form -->
                    
                    <?php echo form_open("clientes/{$cliente['idcliente']}",array('class' => 'form-horizontal form-box')); ?>
                        <h4 class="form-box-header">Editar Cliente</h4>
                        <div class="form-box-content">
                            <div class="control-group">
                                <label class="control-label" id="lblpessoa">Pessoa</label>
                                <div class="controls">
                                	<?php 
                                	if ($cliente['tipo'] == 0) {
										$fisica = 'checked="true"';
									}else{
										$fisica = '';
									}
									
									if ($cliente['tipo'] == 1) {
										$juridica = 'checked="true"';
									}else{
										$juridica = '';
									}
                                	
                                	?>
                                    <label class="radio inline">
                                        <input type="radio" name="tipo" id="fisica"  value="0" <?php echo $fisica; ?>> Física
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="tipo" id="juridica" value="1" <?php echo $juridica; ?>> Jurídica
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" id="lblnome">Nome</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="nome" id="txtnome" value="<?php echo $cliente['nome'] ?>">
                                </div>
                            </div>
                            <div class="control-group pj">
                                <label class="control-label">Nome Fantasia</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="nomefantasia" value="<?php echo $cliente['nomefantasia'] ?>">
                                </div>
                            </div>
                            <div class="control-group pj">
                                <label class="control-label">Responsável</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="responsavel" value="<?php echo $cliente['responsavel'] ?>">
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label" id="lbldocumento">CPF</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="cpfcnpj" id="txtdocumento" value="<?php echo $cliente['cpfcnpj'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Endereço</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="endereco" value="<?php echo $cliente['endereco'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Telefone</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="telefone" id="telefone" value="<?php echo $cliente['telefone'] ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="email" value="<?php echo $cliente['email'] ?>">
                                </div>
                            </div>
                            
                      	<div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Atualizar">
                                <input type="submit" class="btn btn-danger" value="Cancelar">
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