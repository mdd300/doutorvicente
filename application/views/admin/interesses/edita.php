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
                        <h1>Edição de um Cliente Interessado</h1>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <div class="pad20">
                            <!-- Tabs -->
                            <div id="tabs">
                                <!-- First tab -->
                                <div id="tabs-1">
                                    <!-- Form -->
                                    <form method="post" action="admin/interesses/atualizar" id="form_interesses" enctype="multipart/form-data">
                                        <input type="hidden" name="interesseID" value="<?= $interesse->interesseID; ?>" />
                                        <!-- Fieldset -->
                                        <fieldset>
                                            <legend>Incluir/Editar</legend>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                            </div>
                                            <p>
                                                <label for="lf">Data de Criação: </label>
                                                <?= format_data_mysql($interesse->data_criacao) ?> - <?= format_hora_mysql($interesse->data_criacao) ?>
                                            </p>
                                            <p>
                                                <label for="lf">Desejo: </label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="1" <?php
                                                if ($interesse->comprar_ou_alugar == '1') {
                                                    echo 'checked';
                                                }
                                                ?>> <label for="ativo">Comprar</label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="2" <?php
                                                if ($interesse->comprar_ou_alugar == '2') {
                                                    echo 'checked';
                                                }
                                                ?>> <label for="inativo" >Alugar</label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="3" <?php
                                                if ($interesse->comprar_ou_alugar == '3') {
                                                    echo 'checked';
                                                }
                                                ?>> <label for="inativo" >Tanto Faz</label>

                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro - 1: </label>
                                                <input class="lf" name="bairro1" id="bairro1" type="text" value="<?= $interesse->bairro1; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro - 2: </label>
                                                <input class="lf" name="bairro2" id="bairro2" type="text" value="<?= $interesse->bairro2; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro - 3: </label>
                                                <input class="lf" name="bairro3" id="bairro3" type="text" value="<?= $interesse->bairro3; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro - 4: </label>
                                                <input class="lf" name="bairro4" id="bairro3" type="text" value="<?= $interesse->bairro4; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor Disposto a Pagar (Compra): </label>
                                                <input class="lf" name="valor_comprar" id="valor_comprar" type="text" value="<?= $interesse->valor_comprar; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor Disposto a Pagar (Aluguel): </label>
                                                <input class="lf" name="valor_alugar" id="valor_alugar" type="text" value="<?= $interesse->valor_alugar; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Nome: </label>
                                                <input class="lf" name="nome" id="nome" type="text" value="<?= $interesse->nome; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">E-mail: </label>
                                                <input class="lf" name="email" id="" type="text" value="<?= $interesse->email; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Telefone: </label>
                                                <input class="lf" name="telefone" id="telefone" type="text" value="<?= $interesse->telefone; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Celular: </label>
                                                <input class="lf" name="celular" id="celular" type="text" value="<?= $interesse->celular; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Comemoro Aniersário em: </label>
                                                <input class="lf" name="aniversario" id="aniversario" type="text" value="<?= $interesse->aniversario; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Como conheceu: </label>
                                                <input class="lf" name="como_conheceu" id="como_conheceu" type="text" value="<?= $interesse->como_conheceu; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>

                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
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

        <script>
        $(document).ready(function() {
            $("#valor_alugar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
            $("#valor_comprar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
        });

        </script>
    </body>
</html>