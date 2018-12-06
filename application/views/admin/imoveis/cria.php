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
                        <h1>Inclusão de Imóveis</h1>

                        <div class="pad20">
                            <!-- Form -->
                            <form method="post" action="admin/imoveis/salvar" id="form_imoveis" enctype="multipart/form-data">
                                <!-- Fieldset -->
                                <fieldset>
                                    <legend>Incluir/Editar</legend>
                                    <div id="acoes" style="height: 40px; width: 100%">
                                        <input class="button" style="float: right;" type="submit" value="Salvar" />
                                    </div>
                                    <p>
                                        <label for="lf">Data de Criação: </label>
                                        <?= date("d/m/Y H:i:s") ?>
                                    </p>

                                    <p>
                                        <label for="lf">Pesquisa (Nome, Bairro ou Código):</label>
                                        <input class="lf" id="buscar_referencia" type="text" value="" style="width:300px" />
                                        <button onclick="return false;" id="buscar_referencia_bt" style="border:none; padding:7px; ">Trazer Dados</button>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>


                                    <p>
                                        <label for="lf">Referência Imóvel Cadastrado: </label>
                                        <select name="imovel_divulgarID" id="imovel_divulgarID">
                                            <option value="">Nenhum</option>
                                            <?PHP foreach ($imoveis_divulgar as $imovel): ?>
                                                <option value="<?= $imovel->imovel_divulgarID; ?>"><?= @$imovel->nome; ?> - <?= @$imovel->bairro; ?> - <?= @$imovel->referencia; ?></option>
                                            <?PHP endforeach; ?>
                                        </select>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Opção: </label>
                                        <input type="radio" class="comprar_ou_alugar" name="comprar_ou_alugar" value="1" checked><label>Comprar</label>
                                        <input type="radio" class="comprar_ou_alugar" name="comprar_ou_alugar" value="2"><label>Alugar</label>
                                        <input type="radio" class="comprar_ou_alugar" name="comprar_ou_alugar" value="3"><label>Tanto Faz</label>

                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Referência: </label>
                                        <input class="lf" name="referencia" id="referencia" type="text" value="" style="width:100px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Bairro <img src="assets/images/google.png" style="margin-bottom: -14px;" alt="Google"></label>
                                        <input class="lf" name="bairro_google" id="bairro_google" type="text" value="" style="width:150px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>                                    
                                    <p>
                                        <label for="lf">Bairro <img src="assets/images/correios.png" alt="Correios" style="margin-bottom: -11px;"></label>
                                        <input class="lf" name="bairro_correios" id="bairro_correios" type="text" value="" style="width:150px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p> 
                                        <label for="lf">Bairro Comercial: </label>
                                        <input class="lf" name="bairro_comercial" id="bairro_comercial" type="text" value="" style="width:150px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Área Útil: </label>
                                        <input class="lf" name="area" id="area" type="number" value="" style="width:50px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Andar: </label>
                                        <input class="lf" name="andar" id="andar" type="number" value="" style="width:50px" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Valor para Compra: </label>
                                        <input class="lf" name="valor_comprar" id="valor_comprar" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Valor para Alugar: </label>
                                        <input class="lf" name="valor_alugar" id="valor_alugar" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Valor Condomínio: </label>
                                        <input class="lf" name="valor_condominio" id="valor_condominio" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Sobre a Cobertura: </label>
                                        <textarea name="sobre_cobertura"></textarea>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Sobre a Vizinhança: </label>
                                        <textarea name="sobre_vizinhanca"></textarea>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Sobre o Edifício: </label>
                                        <textarea name="sobre_edificio"></textarea>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Pontos de Atenção: </label>
                                        <textarea name="pontos_atencao"></textarea>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf">Sobre a Vista: </label>
                                        <textarea name="sobre_vista"></textarea>
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <p>
                                        <label for="lf" style="width:380px;">Vídeo: (https://www.youtube.com/watch?v=CfNAQ-4y1lU)</label>
                                        <input class="lf" name="video" id="video" type="text" value="" />
                                        <span class="validate_error"></span>
                                        <span class="validate_success"></span>
                                    </p>
                                    <fieldset>
                                        <legend>Imagem Principal</legend>
                                        <p>
                                            <label for="lf">Foto: </label>
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
                        $("#valor_comprar").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                        $("#valor_condominio").maskMoney({symbol: 'R$ ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});

                        $("#imovel_divulgarID").on("change", function() {
                            var imovel_divulgarID = $(this).val();
                            doajax(imovel_divulgarID);
                        })
                    })
                </script>

    </body>
</html>