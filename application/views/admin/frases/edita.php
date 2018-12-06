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
                        <h1>Edição de Frases</h1>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <div class="pad20">
                            <!-- Tabs -->
                            <div id="tabs">
                                <!-- First tab -->
                                <div id="tabs-1">
                                    <!-- Form -->
                                    <form method="post" action="admin/frases/atualizar" id="form_frases" enctype="multipart/form-data">
                                        <input type="hidden" name="fraseID" value="<?= $frase->fraseID; ?>" />
                                        <!-- Fieldset -->
                                        <fieldset>
                                            <legend>Incluir/Editar</legend>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                                <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/frases'" value="Cancelar" />
                                            </div>
                                             <p>
                                                <label for="lf">Frase: </label>
                                                <textarea name="frase" style="margin-left:120px;"><?= $frase->frase; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>  
                                            <p>
                                                <label for="lf">Nome: </label>
                                                <input class="lf" name="nome" id="nome" type="text" value="<?= $frase->nome; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                                <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/frases'" value="Cancelar" />
                                            </div>
                                        </fieldset>
                                    </form>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
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