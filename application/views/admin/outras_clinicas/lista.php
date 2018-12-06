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
                        <h1>Outras Clínicas</h1>

                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="30%">Título</td>
                                        <td width="15%" align="center">Data de Publicação</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if ($outras_clinicas) {
                                            foreach ($outras_clinicas as $clinica) {
                                    ?>
                                                <tr class="odd" lang="<?php echo site_url('admin/outras_clinicas/editar/'.$clinica->id); ?>">
                                                    <td><?= $clinica->titulo ?></td>
                                                    <td align="center"><?= format_data_mysql($clinica->data_publicacao) ?> <?= format_hora_mysql($clinica->data_publicacao) ?></td>
                                                </tr>
                                    <?php
                                            }
                                        } else {
                                    ?>
                                            <tr class="odd">
                                                <td class="col-first" colspan="2">Nenhum item cadastrado no sistema.</td>
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
                </fieldset>
            </div>
            <!-- End of bgwrap -->
        </div>
        <!-- End of Container -->

        <!-- Footer -->
<?= $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
    </body>
</html>