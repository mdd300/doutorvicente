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
                        <h1>Imóveis Cadastrados pelos Clientes</h1>
                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/imoveis_divulgar" method="post">
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
                                    <label for="lf" style="text-align: right;">Nome: </label>
                                    <input type="text" name="nome" value="<?= @$nome; ?>"/>
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
                                <p style="margin-left: 80px;">
                                    <a title="Busca os imóveis de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/imoveis_divulgar/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>


                        <div id="acoes" style="height: 40px; width: 100%">
                            <a style="" title="Exclui os imoveis selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('imoveis_divulgar', 'excluir_selecionados');">
                                <span class="ui-icon ui-icon-extlink "></span>
                                Excluir
                            </a>
                        </div>

                        <?PHP if (isset($imoveis_divulgar)): ?>
                            <fieldset>
                                <legend>Resultado</legend>
                                <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                    <thead>
                                        <tr>
                                            <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                            <td width="5%">Data</td>
                                            <td width="5%">Nome</td>
                                            <td width="5%">Bairro</td>
                                            <td width="5%">Área</td>
                                            <td width="5%">Qtd. Quartos</td>
                                            <td width="9%">Valor para Compra</td>
                                            <td width="9%">Valor para Alugar</td>
                                            <td width="9%">Valor do Condomínio</td>
                                            <td width="5%">Modificar</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        foreach ($imoveis_divulgar as $imovel):
                                            ?>
                                            <tr class="odd">
                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $imovel->imovel_divulgarID ?>" /></td>
                                                <td><?= format_data_mysql($imovel->data_criacao) ?></td>
                                                <td width="5%"><?= $imovel->nome; ?></td>
                                                <td width="5%"><?= $imovel->bairro; ?></td>
                                                <td width="5%"><?= $imovel->area; ?></td>
                                                <td width="5%"><?= $imovel->quantidade_quartos; ?></td>
                                                <td width="9%"><?= $imovel->valor_comprar; ?></td>
                                                <td width="9%"><?= $imovel->valor_alugar; ?></td>
                                                <td width="9%"><?= $imovel->valor_condominio; ?></td>
                                                <td align="center">
                                                    <a href="admin/imoveis_divulgar/editar/<?= $imovel->imovel_divulgarID; ?>">
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