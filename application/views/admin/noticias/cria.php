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
                        <h1>Criação de Notícia</h1>

                        <div class="pad20">
                            <!-- Form -->
                            <form method="post" action="admin/noticias/salvar" id="form_novidades" enctype="multipart/form-data">
                                <!-- Fieldset -->
                                <fieldset>
                                    <legend>Incluir/Editar</legend>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/noticias'" value="Cancelar" />
                                    </div>
                                    <p>
                                        <label for="lf">Data de Criação: </label>
                                        <?= date("d/m/Y H:i:s") ?>
                                    </p>
                                    <p>
                                        <label for="lf">Status: </label>
                                        <input checked type="radio" id="ativo" name="status" value="a"> <label for="ativo">Ativo</label>
                                        <input type="radio" id="inativo" name="status" value="i"> <label for="inativo" >Inativo</label>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Data Publicação: </label>
                                        <input class="lr datepicker" name="data_publicacao" id="data_publicacao" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    
                                    <p>
                                        <label for="lf">Titulo: </label>
                                        <input class="lf" name="titulo" id="titulo" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p class="normal">
                                        <label for="lf">Resumo: </label>
                                        <textarea class="normal" name="resumo" id="resumo"></textarea>
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
                                        $FCKeditor->Value = '';
                                        $FCKeditor->Create();
                                        ?>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <fieldset>
                                        <legend>Imagem Relacionada</legend>
                                        <p>
                                            <label for="lf">Foto: </label>
                                            <input name="imagem" id="imagem" type="file" />
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </p>
                                        <p>
                                            <label for="lf">Legenda: </label>
                                            <input name="legenda" id="legenda_foto" type="text" />
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </p>
                                    </fieldset>




                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/noticias'" value="Cancelar" />
                                    </div>
                                </fieldset>
                                <!-- End of fieldset -->
                            </form>
                            <!-- End of Form -->
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