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
                        <h1>Edição de Usuário</h1>

                        <div class="pad20">
                            <!-- Form -->
                            <form method="post" action="admin/usuarios/atualiza_usuario" id="form_usuarios">
                                <input type="hidden" value="<?= $usuario->usuarioID; ?>" name="usuarioID" id="usuarioID"/>
                                <!-- Fieldset -->
                                <fieldset>
                                    <legend>Dados do Usuário</legend>
                                    <p>
                                        <label for="lf">Nome: </label>
                                        <input class="lf" name="nome" id="nome" type="text" value="<?= $usuario->nome ?>" /> 
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <span id="msg_email">
                                            <label for="lf">E-mail: </label>
                                            <input class="lf" name="email" id="email" type="text" value="<?= $usuario->email ?>" /> 
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span>
                                        </span>
                                    </p>
                                    <p>
                                        <span id="msg_login">
                                            <label for="lf">Login: </label>
                                            <input class="lf" name="usuario" id="usuario" type="text" value="<?= $usuario->usuario ?>"  /> 
                                            <span class="validate_error"></span>
                                            <span class="validate_success"></span> 
                                        </span>
                                    </p>
                                    <p>
                                        <label for="lf">Senha: </label>
                                        <input class="lf" name="senha" id="senha" type="password" value="" /> 
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <input class="button" type="submit" value="Salvar" />
                                        <input class="button" type="button" onclick="location.href = 'admin/usuarios'" value="Voltar" />
                                    </p>
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