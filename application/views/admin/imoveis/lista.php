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
                        <h1>Imóveis na Vitrine</h1>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/imoveis" method="post">
                                <p>
                                    <label for="lf" style="text-align: right;">Comprar ou Alugar: </label>
                                    <select name="comprar_ou_alugar">
                                        <option value="1">Comprar</option>
                                        <option value="2">Alugar</option>
                                        <option value="3">Tanto Faz</option>
                                    </select>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">Referência: </label>
                                    <input type="text" name="referencia" value="<?= @$referencia; ?>"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">Bairro: </label>
                                    <input type="text" name="bairro" value="<?= @$bairro; ?>"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">Estatus do Imóvel: </label>
                                    <select name="ativo">
                                        <option value="1">Ativo</option>
                                        <option value="00">Histórico</option>
                                    </select>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p style="margin-left: 80px;">
                                    <a title="Busca os imóveis de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/imoveis/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>

                        
                            <div id="acoes" style="height: 40px; width: 100%">
                                <a style=" " title="Incluir um Imóivel" class="button tooltip" href="admin/imoveis/cria">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Incluir
                                </a>
                                <a style=" " title="Exclui os imoveis selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('imoveis', 'excluir_selecionados');">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Excluir
                                </a>
                            </div>
                            
                        
                            <?PHP if ($imoveis): ?>
                            <fieldset>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="5%">Data</td>
                                        <td width="12%">Referência</td>
                                        <td width="15%">Bairro</td>
                                        <td width="5%">Área Útil</td>
                                        <td width="9%">Andar</td>
                                        <td width="5%">Valor para Compra</td>
                                        <td width="5%">Valor para Alugar</td>
                                        <td width="5%">Valor do Condomínio</td>
                                        <td width="5%">Modificar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP
                                        foreach ($imoveis as $imovel):
                                            ?>

                                            <tr class="odd">
                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $imovel->imovelID ?>" /></td>
                                                <td><?= format_data_mysql($imovel->data_criacao) ?></td>
                                                <td width="12%"><?= $imovel->referencia; ?></td>
                                                <td width="15%">Google: <?= $imovel->bairro_google; ?><br />Correios: <?= $imovel->bairro_correios; ?><br />Comercial: <?= $imovel->bairro_comercial; ?></td>
                                                <td width="9%"><?= $imovel->area; ?></td>
                                                <td width="5%"><?= $imovel->andar; ?></td>
                                                <td width="5%"><?= $imovel->valor_comprar; ?></td>
                                                <td width="5%"><?= $imovel->valor_alugar; ?></td>
                                                <td width="5%"><?= $imovel->valor_condominio; ?></td>
                                                <td align="center">
                                                    <a href="admin/imoveis/editar/<?= $imovel->imovelID; ?>">
                                                        <img src="assets/images/admin/icons/30_48x48.png" />
                                                    </a>
                                                </td>
                                            </tr>
                                            </a>
                                            <?PHP endforeach; ?>
                                </tbody>
                            </table>
                            <hr />
                            <?PHP endif; ?>
                            
                            
                    </div>
                </div>
                <!-- End of Main Content -->
                </fieldset>
            </div>
            <!-- End of bgwrap -->
        </div>
        <!-- End of Container -->

        <!-- Footer -->
        <?= $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
    </body>
</html>