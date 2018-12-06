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
                        <h1>Edição de Imóveis</h1>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <div class="pad20">
                            <!-- Tabs -->
                            <div id="tabs">
                                <!-- First tab -->
                                <div id="tabs-1">
                                    <!-- Form -->
                                    <form method="post" action="admin/imoveis_divulgar/atualizar" id="form_novidades" enctype="multipart/form-data">
                                        <input type="hidden" name="imovel_divulgarID" value="<?= $imovel->imovel_divulgarID ?>" />
                                        <!-- Fieldset -->
                                        <fieldset>
                                            <legend>Incluir/Editar</legend>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                            </div>
                                            <p>
                                                <label for="lf">Data de Criação: </label>
                                                <?= format_data_mysql($imovel->data_criacao) ?> <?= format_hora_mysql($imovel->data_criacao) ?>
                                            </p>
                                            <p>
                                                <label for="lf">Referência: </label>
                                                <input class="lf" name="referencia" id="referencia" type="text" value="<?= $imovel->referencia; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Opção: </label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="1" <?PHP
                                                if ($imovel->comprar_ou_alugar == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Comprar</label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="2" <?PHP
                                                if ($imovel->comprar_ou_alugar == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Alugar</label>
                                                <input type="radio" id="comprar_ou_alugar" name="comprar_ou_alugar" value="3" <?PHP
                                                if ($imovel->comprar_ou_alugar == "3") {
                                                    echo "checked";
                                                }
                                                ?>><label>Tanto Faz</label>

                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                                                                                                               
                                            <p>
                                                <label for="lf">Bairro: </label>
                                                <input class="lf" name="bairro" id="bairro" type="text" value="<?= $imovel->bairro; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Endereço: </label>
                                                <input class="lf" name="endereco" id="endereco" type="text" value="<?= $imovel->endereco; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Situação: </label>
                                                <input class="lf" name="situacao" id="situacao" type="text" value="<?= $imovel->situacao; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Área Útil: </label>
                                                <input class="lf" name="area" id="area" type="number" value="<?= $imovel->area; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Área Privativa: </label>
                                                <input class="lf" name="area_privativa" id="area_privativa" type="number" value="<?= $imovel->area_privativa; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor para Compra: </label>
                                                <input class="lf" name="valor_comprar" id="valor_comprar" type="text" value="<?= $imovel->valor_comprar; ?>" style="width:150px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor para Alugar: </label>
                                                <input class="lf" name="valor_alugar" id="valor_alugar" type="text" value="<?= $imovel->valor_alugar; ?>" style="width:150px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor do Condomínio: </label>
                                                <input class="lf" name="valor_condominio" id="valor_condominio" type="text" value="<?= $imovel->valor_condominio; ?>" style="width:150px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">IPTU: </label>
                                                <input class="lf" name="iptu" id="iptu" type="text" value="<?= $imovel->iptu; ?>" style="width:150px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Código de Cadastro do Imóvel (IPTU): </label>
                                                <input class="lf" name="codigo_iptu" id="codigo_iptu" type="text" value="<?= $imovel->codigo_iptu; ?>" style="width:150px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Outros Detalhes: </label>
                                                <textarea name="outros_detalhes" cols='40' rols='3' style='margin:-26px 0 0 125px;'><?= $imovel->outros_detalhes; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                            
                                            <p>
                                                <label for="lf">Armário na Cozinha?: </label>
                                                <input type="radio" id="armario_cozinha" name="armario_cozinha" value="1" <?PHP
                                                if ($imovel->armario_cozinha == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="armario_cozinha" name="armario_cozinha" value="2" <?PHP
                                                if ($imovel->armario_cozinha == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>                                                
                                            </p>
                                            <p>
                                                <label for="lf">Quantidade de Quartos: </label>
                                                <input class="lf" name="quantidade_quartos" id="quantidade_quartos" type="number" value="<?= $imovel->quantidade_quartos; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Quantidade de Salas: </label>
                                                <input class="lf" name="quantidade_salas" id="quantidade_salas" type="number" value="<?= $imovel->quantidade_salas; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Quantidade de Suítes: </label>
                                                <input class="lf" name="quantidade_salas" id="quantidade_salas" type="number" value="<?= $imovel->quantidade_salas; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Armário nos Quartos?: </label>
                                                <input type="radio" id="armarios_quartos" name="armarios_quartos" value="1" <?PHP
                                                if ($imovel->armarios_quartos == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="armarios_quartos" name="armarios_quartos" value="2" <?PHP
                                                if ($imovel->armarios_quartos == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>
                                                <input type="radio" id="armarios_quartos" name="armarios_quartos" value="3" <?PHP
                                                if ($imovel->armarios_quartos == "3") {
                                                    echo "checked";
                                                }
                                                ?>><label>Em Alguns</label>
                                            </p>

                                            <p>
                                                <label for="lf">Armários na Suite? </label>
                                                <input type="radio" id="armarios_suite" name="armarios_suite" value="1" <?PHP
                                                if ($imovel->armarios_suite == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="armarios_suite" name="armarios_suite" value="2" <?PHP
                                                if ($imovel->armarios_suite == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>   
                                                <input type="radio" id="armarios_suite" name="armarios_suite" value="3" <?PHP
                                                if ($imovel->armarios_suite == "3") {
                                                    echo "checked";
                                                }
                                                ?>><label>Em Alguns</label>
                                            </p>
                                            <p>
                                                <label for="lf">Closet nas suítes?</label>
                                                <input type="radio" id="closet_suites" name="closet_suites" value="1" <?PHP
                                                if ($imovel->closet_suites == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="closet_suites" name="closet_suites" value="2" <?PHP
                                                if ($imovel->closet_suites == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>  
                                                <input type="radio" id="closet_suites" name="closet_suites" value="3" <?PHP
                                                if ($imovel->closet_suites == "3") {
                                                    echo "checked";
                                                }
                                                ?>><label>Em Alguns</label>
                                            </p>                                            
                                            <p>
                                                <label for="lf">Lavabo?</label>
                                                <input type="radio" id="lavabo" name="lavabo" value="1" <?PHP
                                                if ($imovel->lavabo == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="lavabo" name="lavabo" value="0" <?PHP
                                                if ($imovel->lavabo == "2") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>                                                
                                            </p>
                                            <p>
                                                <label for="lf">Vagas de Carros: </label>
                                                <input class="lf" name="vagas_carros" id="vagas_carros" type="number" value="<?= $imovel->vagas_carros; ?>" style="width:50px" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <hr />
                                            <p>
                                                <label for="lf">Nome: </label>
                                                <input class="lf" name="nome" id="nome" type="text" value="<?= $imovel->nome; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Telefone: </label>
                                                <input class="lf" name="telefone" id="telefone" type="text" value="<?= $imovel->telefone; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                            
                                            <p>
                                                <label for="lf">Aniversário: </label>
                                                <input class="lf" name="aniversario" id="aniversario" type="text" value="<?= $imovel->aniversario; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                                                                        
                                            <p>
                                                <label for="lf">Celular: </label>
                                                <input class="lf" name="celular" id="celular" type="text" value="<?= $imovel->celular; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                                                                                                                    
                                            <p>
                                                <label for="lf">Como Conheceu: </label>
                                                <input class="lf" name="como_conheceu" id="como_conheceu" type="text" value="<?= $imovel->como_conheceu; ?>" />
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

                <script>
                                                    $(function() {
                                                        $("#valor_alugar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#valor_comprar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#valor_condominio").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#iptu").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                    })

                                                    $('.normal').show();
                </script>


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