<!DOCTYPE html>
<html>
    <?= $this->load->view('admin/inc/header') ?>
    <body>
        <!-- Container -->
        <div id="container">

            <!-- Header -->
            <div id="header">

                <!-- Top -->
                <?= $this->load->view('admin/inc/top') ?>
                <!-- End of Top-->

                <!-- The navigation bar -->
                <?= $this->load->view('admin/inc/menu') ?>
                <!-- End of navigation bar" -->

            </div>
            <!-- End of Header -->

            <!-- Background wrapper -->
            <div id="bgwrap">

                <!-- Main Content -->
                <div id="content">
                    <div id="main">
                        <h1>Usuários do Sistema</h1>
                        <p>Gerencie os usuários do sistema de administração.</p>

                        <?= $this->load->view('admin/inc/messages') ?>

                        <p>
                            <a title="Cria um novo usuário no sistema" class="button tooltip" href="admin/usuarios/cria_usuario">
                                <span class="ui-icon ui-icon-newwin"></span>
                                Novo Usuário
                            </a>
                        </p>

                        <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <td>Nome do Usuário</td>
                                    <td>E-mail</td>
                                    <td align="center">Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($usuarios)){
                                    foreach($usuarios as $row):
                                        ?>
                                        <tr class="odd">
                                            <td><?= $row->nome; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td align="center"><a href="<?= base_url(); ?>admin/usuarios/edita_usuario/<?= $row->usuarioID; ?>"><img border="0" src="assets/images/admin/icones/editar.png"/></a> <span class="hidden"> | </span> <a href="<?= base_url(); ?>admin/usuarios/deleta_item/<?= $row->usuarioID; ?>"><img border="0" src="assets/images/admin/icones/trash.png"/></a></td>
                                        </tr>
                                        <?php
                                    endforeach;
                                } else {
                                    ?>
                                    <tr class="odd">
                                        <td class="col-first" colspan="4">Nenhum usuário cadastrado no sistema.</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <hr />	
                    </div>
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of bgwrap -->
        </div>
        <!-- End of Container -->

        <!-- Footer -->
        <?= $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
    </body>
</html>