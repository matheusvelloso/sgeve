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
                        <li class="active"><a href="">Serviços</a></li>
                    </ul>
                    <!-- END Navigation info -->

                    <!-- Datatables -->
                    <h3 class="page-header page-header-top">Serviços <a href="<?php echo base_url("servicos/novo")?>" class="btn btn-warning"><i class="icon-plus"></i> Cadastrar Novo</a></h3>
					<div class="control-group">
	                	<?php if($this->session->flashdata('falha_acao')) :?>
	                		<p class="alert alert-danger"><?php echo $this->session->flashdata('falha_acao'); ?></p>
	                	<?php endif ?>
	                	<?php if($this->session->flashdata('sucesso_acao')) :?>
	                		<p class="alert alert-success"><?php echo $this->session->flashdata('sucesso_acao'); ?></p>
	                	<?php endif ?>
                	</div>
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="span1"></th>
                                <th class="span1 hidden-phone">#</th>
                                <th><i class="icon-user"></i> Nome</th>
                                <th class="hidden-phone hidden-tablet"><i class="icon-envelope-alt"></i> Descricao</th>
                                <th><i class="icon-phone"></i> Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php if ($servicos > 0) : ?>
	                        	<?php $i = 0; ?>
	                        	<?php foreach ($servicos as $servico) : ?>	
	                            <tr>
	                                <td class="span1">
	                                    <div class="btn-group">
	                                        <a href="<?php echo base_url("servicos/{$servico['idservico']}")  ?>" data-toggle="tooltip" title="Editar" class="btn btn-mini btn-success"><i class="icon-pencil"></i></a>
	                                        <a href="<?php echo base_url("servicos/deletar/{$servico['idservico']}")  ?>" data-toggle="tooltip" title="Deletar" class="btn btn-mini btn-danger"><i class="icon-remove"></i></a>
	                                    </div>
	                                </td>
	                                <td class="span1 hidden-phone"><?php echo ++$i;?></td>
	                                <td><a href="javascript:void(0)"><?php echo $servico['nome'];?></a></td>
	                                <td class="hidden-phone hidden-tablet"><?php echo $servico['descricao'];?></td>
	                                <td><?php echo $servico['estoque'];?></td>
	                            </tr>
	                            <?php endforeach; ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <!-- END Datatables -->

                    

                    
                </div>
                <!-- END Page Content -->

                <?php $this->load->view('include/footer'); ?>

        <?php $this->load->view('include/top-right'); ?>

		<!-- Javascript code only for this page -->
        <script>
            $(function() {
                /* Initialize Datatables */
                $('#datatable').dataTable({"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]});
            });
        </script>
    </body>
</html>