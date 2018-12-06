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
                <style>
                    label{ width: 149px; }
                </style>
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
                                <?php $tab_menu = $this->session->flashdata('tab_menu'); ?>
                                <ul>
                                    <li <?php
                                    if (@$tab_menu == 'hoje') {
                                        echo 'class="ui-tabs-selected ui-state-active"';
                                    }
                                    ?>><a href="#tabs-1">Imóveis</a></li>
                                    <li <?php
                                    if (@$tab_menu == 'arquivos') {
                                        echo 'class="ui-tabs-selected ui-state-active"';
                                    }
                                    ?>><a href="#tabs-2">Imagens</a></li>
                                </ul>

                                <!-- First tab -->
                                <div id="tabs-1">
                                    <!-- Form -->
                                    <form method="post" action="admin/imoveis/atualizar" id="form_novidades" enctype="multipart/form-data">
                                        <input type="hidden" name="imovelID" value="<?= $imovel->imovelID ?>" />
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
                                                <label for="lf">Pesquisa (Nome ou Bairro):</label>
                                                <input class="lf" id="buscar_referencia" type="text" value="" style="width:300px" />
                                                <button onclick="return false;" id="buscar_referencia_bt" style="border:none; padding:7px; ">Trazer Dados</button>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>

                                            <p>
                                                <label for="lf">Referência Imóvel Cadastrado: </label>
                                                <select name="imovel_divulgarID" id="imovel_divulgarID">
                                                    <?PHP foreach ($imoveis_divulgar as $imovel_divulgar): ?>
                                                        <?PHP if ($imovel_divulgar->imovel_divulgarID == $imovel->imovel_divulgarID) { ?>
                                                            <option value="<?= $imovel_divulgar->imovel_divulgarID; ?>" selected><?= $imovel_divulgar->nome; ?></option>
                                                        <?PHP } else { ?>
                                                            <option value="<?= $imovel->imovel_divulgarID; ?>"><?= @$imovel->nome; ?> - <?= @$imovel->bairro; ?> - <?= @$imovel->referencia; ?></option>
                                                        <?PHP } ?>
                                                    <?PHP endforeach; ?>
                                                    <?PHP if ($imovel->imovel_divulgarID == "0") { ?>
                                                        <option value="" selected>Nenhum</option>
                                                    <?PHP } else { ?>
                                                        <option value="">Nenhum</option>
                                                    <?PHP } ?>
                                                </select>
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
                                                <label for="lf">Ativo: </label>
                                                <input type="radio" id="ativo" name="ativo" value="1" <?PHP
                                                if ($imovel->ativo == "1") {
                                                    echo "checked";
                                                }
                                                ?>><label>Sim</label>
                                                <input type="radio" id="ativo" name="ativo" value="0" <?PHP
                                                if ($imovel->ativo == "0") {
                                                    echo "checked";
                                                }
                                                ?>><label>Não</label>

                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Referência: </label>
                                                <input class="lf" name="referencia" id="referencia" type="text" value="<?= $imovel->referencia; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro <img src="assets/images/google.png" style="margin-bottom: -14px;" alt="Google"></label>
                                                <input class="lf" name="bairro_google" id="bairro_google" type="text" value="<?= $imovel->bairro_google; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>                                    
                                            <p>
                                                <label for="lf">Bairro <img src="assets/images/correios.png" alt="Correios" style="margin-bottom: -11px;"></label>
                                                <input class="lf" name="bairro_correios" id="bairro_correios" type="text" value="<?= $imovel->bairro_correios; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Bairro Comercial: </label>
                                                <input class="lf" name="bairro_comercial" id="bairro_comercial" type="text" value="<?= $imovel->bairro_comercial; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Área Útil: </label>
                                                <input class="lf" name="area" id="area" type="number" value="<?= $imovel->area; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Andar: </label>
                                                <input class="lf" name="andar" id="andar" type="number" value="<?= $imovel->andar; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor para Compra: </label>
                                                <input class="lf" name="valor_comprar" id="valor_comprar" type="text" value="<?= $imovel->valor_comprar; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor para Alugar: </label>
                                                <input class="lf" name="valor_alugar" id="valor_alugar" type="text" value="<?= $imovel->valor_alugar; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Valor Condomínio: </label>
                                                <input class="lf" name="valor_condominio" id="valor_condominio" type="text" value="<?= $imovel->valor_condominio; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Sobre a Cobertura: </label>
                                                <textarea name="sobre_cobertura"><?= $imovel->sobre_cobertura; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Sobre a Vizinhança: </label>
                                                <textarea name="sobre_vizinhanca"><?= $imovel->sobre_vizinhanca; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Sobre o Edifício: </label>
                                                <textarea name="sobre_edificio"><?= $imovel->sobre_edificio; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Pontos de Atencao: </label>
                                                <textarea name="pontos_atencao"><?= $imovel->pontos_atencao; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Sobre a Vista: </label>
                                                <textarea name="sobre_vista"><?= $imovel->sobre_vista; ?></textarea>
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf" style="width:380px;">Vídeo: (https://www.youtube.com/watch?v=CfNAQ-4y1lU)</label>
                                                <input class="lf" name="video" id="video" type="text" value="<?= $imovel->video; ?>" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <fieldset>
                                                <legend>Imagem Principal</legend>
                                                <?PHP if ($imovel->imagem): ?>
                                                    <img src="assets/uploads/imoveis/<?= $imovel->imagem; ?>"  width="400" />
                                                <?PHP endif; ?>
                                                <p>
                                                    <label for="lf">Nova Foto: </label>
                                                    <input name="imagem" id="imagem" type="file" />
                                                    <span class="validate_error"></span>
                                                    <span class="validate_success"></span>
                                                </p>
                                            </fieldset>
                                            <div id="acoes" style="height: 40px; width: 100%">
                                                <input class="button" style="float: right;" type="submit" value="Salvar" />
                                            </div>
                                        </fieldset>
                                        <!-- End of fieldset -->
                                    </form>
                                    <!-- End of Form -->
                                </div>


                                <div id="tabs-2">
                                    <!-- Form -->
                                    <form method="post" action="admin/imoveis/nova_foto" enctype="multipart/form-data">
                                        <input type="hidden" name="imovelID" id="imovelID" value="<?= $imovel->imovelID ?>" />
                                        <!-- Fieldset -->
                                        <fieldset>
                                            <legend>Dados do Arquivo</legend>
                                            <p>
                                                <label for="lf">Nome: </label>
                                                <input class="lf" name="alt" id="alt" type="text" value="" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Imagem: </label>
                                                <input name="path1" id="path1" type="file" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Imagem: </label>
                                                <input name="path2" id="path2" type="file" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <label for="lf">Imagem: </label>
                                                <input name="path3" id="path3" type="file" />
                                                <span class="validate_error"></span>
                                                <span class="validate_success"></span>
                                            </p>
                                            <p>
                                                <input class="button" type="submit" value="Salvar Arquivo" />
                                            </p>
                                            <p>&nbsp;</p>
                                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                                <thead>
                                                    <tr>
                                                        <td colspan="4">Imagens Cadastradas</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    if (isset($imagens)) {
                                                        //primeira linha
                                                        foreach ($imagens as $row) {

                                                            if ($i == 1) {
                                                                echo '<tr>';
                                                            }
                                                            ?>
                                                        <td align="center">
                                                            <img src="assets/uploads/imoveis/<?= $row->path ?>" width="400"  /></a>
                                                            <br /><?= $row->alt; ?>
                                                            <br /><a href="<?= base_url(); ?>admin/imoveis/remove_foto/<?= $row->imovel_imagemID ?>/<?= $this->uri->segment('4') ?>/" /><img src="assets/images/admin/icones/trash.png" />
                                                        </td>
                                                        <?php
                                                        if ($i % 2 == 0) {
                                                            echo '</tr><tr>';
                                                        }
                                                        $i++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="4">Nenhum arquivo cadastrado até o momento</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
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

                <script type="text/javascript">
                                                    function doajax(imovel_divulgarID) {
                                                        var base_url = $("#base_url").attr("base_url");
                                                        var imovel_divulgar;
                                                        if (imovel_divulgarID != '') {
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "admin/imoveis_divulgar/retorna_imovel_ajax",
                                                                data: {imovel_divulgarID: imovel_divulgarID},
                                                                async: false,
                                                                success: function(data) {
                                                                    if (data) {
                                                                        imovel_divulgar = $.parseJSON(data);
                                                                    } else {
                                                                        imovel_divulgar = false;
                                                                    }
                                                                }
                                                            })
                                                            if (imovel_divulgar != false) {
                                                                $.each($(".comprar_ou_alugar"), function(key, value) {
                                                                    if ($(this).attr("value") === imovel_divulgar.comprar_ou_alugar) {
                                                                        $(this).attr("checked");
                                                                    }
                                                                });

                                                                $("#bairro").val(imovel_divulgar.bairro);
                                                                $("#area").val(imovel_divulgar.area);
                                                                $("#andar").val(imovel_divulgar.andar);
                                                                $("#referencia").val(imovel_divulgar.referencia);
                                                                $("#bairro_google").val(imovel_divulgar.bairro);
                                                                $("#bairro_correios").val(imovel_divulgar.bairro);
                                                                $("#valor_comprar").val(imovel_divulgar.valor_comprar);
                                                                $("#valor_alugar").val(imovel_divulgar.valor_alugar);
                                                                $("#valor_condominio").val(imovel_divulgar.valor_condominio);
                                                            }
                                                        }
                                                    }



                                                    $(function() {
                                                        $("#buscar_referencia").on("keypress", function() {
                                                            var keyword = $(this).val();
                                                            $.each($("#imovel_divulgarID option"), function(key, value) {
                                                                if ($(this).html().indexOf(keyword) >= 0) {
                                                                    $(this).attr('selected', 'selected');
                                                                    var imovel_divulgarID = $(this).val();
                                                                }
                                                            })
                                                        })

                                                        $("#buscar_referencia_bt").on("click", function() {
                                                            var imovel_divulgarID = $("#imovel_divulgarID").val();
                                                            doajax(imovel_divulgarID);
                                                        });
                                                        $("#valor_alugar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#valor_comprar").m

                                                        $("#valor_alugar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#valor_comprar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                                                        $("#valor_condominio").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});

                                                        $("#imovel_divulgarID").on("change", function() {
                                                            var imovel_divulgarID = $(this).val();
                                                            doajax(imovel_divulgarID);
                                                        })
                                                    })
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