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
                        <h1>Criação de Frase</h1>

                        <div class="pad20">
                            <!-- Form -->
                            <form method="post" action="admin/frases/salvar" id="form_frases" enctype="multipart/form-data">
                                <!-- Fieldset -->
                                <fieldset>
                                    <legend>Incluir/Editar</legend>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/frases'" value="Cancelar" />
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
                                                <label for="lf">Frase: </label>
                                                <textarea name="frase" style="margin-left:120px;"></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>  
                                    <p>
                                        <label for="lf">Nome: </label>
                                        <input class="lf" name="nome" id="nome" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                        <input class="button" style="float: right;" type="button" onclick="location.href = 'admin/frases'" value="Cancelar" />
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