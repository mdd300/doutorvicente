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
                        <h1>Edição de Outras Clínicas</h1>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <div class="pad20">
                            <!-- Tabs -->
                            <div id="tabs">
                                
                                <!-- First tab -->
                                <div id="tabs-1">
                                    <!-- Form -->
                                    <form method="post" action="admin/outras_clinicas/atualizar" id="form_outras_clinicas" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $outras_clinicas->id ?>" />
                                        <!-- Fieldset -->
                                        <fieldset>
                                            <legend>Editar</legend>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                                <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/outras_clinicas'" value="Cancelar" />
                                            </div>
                                            <p>
                                                <label for="lf">Titulo: </label>
                                                <input class="lf" name="titulo" id="titulo" type="text" value="<?= $outras_clinicas->titulo ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <label for="lf">Descrição: </label><br /><br />
                                            <p>
                                                <?php
                                                $FCKeditor = new FCKeditor('descricao');
                                                $FCKeditor->BasePath = base_url() . 'assets/fckeditor/';
                                                $FCKeditor->Config['DefaultLanguage'] = 'en';
                                                $FCKeditor->Config['AutoDetectLanguage'] = false;
                                                $FCKeditor->Config["ForcePasteAsPlainText"] = true;
                                                $FCKeditor->Width = '540px';
                                                $FCKeditor->Height = '300px';
                                                $FCKeditor->Value = $outras_clinicas->descricao;
                                                $FCKeditor->Create();
                                                ?>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                                <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/outras_clinicas'" value="Cancelar" />
                                            </div>
                                        </fieldset>
                                        <!-- End of fieldset -->
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