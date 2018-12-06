<!DOCTYPE html>
<html>
    <?= $this->load->view('admin/inc/header') ?>
    <body>
        <style>
            label{ width: 157px; }
        </style>
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
                        <h1>Criação de Banner</h1>

                        <div class="pad20">
                            <!-- Form -->
                            <form method="post" action="admin/banners/salvar" id="form_banners" enctype="multipart/form-data">
                                <!-- Fieldset -->
                                <fieldset>
                                    <legend>Incluir/Editar</legend>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/banners'" value="Cancelar" />
                                    </div>
                                    <p>
                                        <label for="lf">Data de Criação: </label>
                                        <?= date("d/m/Y H:i:s") ?>
                                    </p>
                                    <p>
                                        <label for="lf">Usuário: </label>
                                        <?= $this->session->userdata('usuario_nome') ?>
                                    </p>
                                    <p>
                                        <label for="lf">Status: </label>
                                        <input checked type="radio" id="ativo" name="status" value="a"> <label for="ativo">Ativo</label>
                                        <input type="radio" id="inativo" name="status" value="i"> <label for="inativo" >Inativo</label>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <fieldset>
                                        <legend>Texto</legend>
                                        <p>
                                            <label for="lf">Título (primeira linha): </label>
                                            <input name="titulo1" id="titulo1" type="text" />
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </p>
                                        <p>
                                            <label for="lf">Título (segunda linha): </label>
                                            <input name="titulo2" id="titulo2" type="text" />
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </p>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Imagem Relacionada</legend>
                                        <p>
                                            <label for="lf">Foto: </label>
                                            <input name="imagem" id="imagem" type="file" />
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </p>
                                    </fieldset>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/banners'" value="Cancelar" />
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