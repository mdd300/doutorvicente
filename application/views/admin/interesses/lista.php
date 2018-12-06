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
                        <h1>Interesses</h1>
                        <p>Gerencie os interesses do site.</p>

                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/interesses" method="post">
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
                                    <label for="lf" style="text-align: right;">Bairro: </label>
                                    <input type="text" name="bairro" value="<?= @$bairro; ?>"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">E-mail: </label>
                                    <input type="text" name="email" value="<?= @$email; ?>"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>

                                <p style="margin-left: 80px;">
                                    <a title="Busca as notícias de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/interesses/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>

                        
                            <div id="acoes" style="height: 40px; width: 100%">
                                <a style="" title="Exclui os interesses selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('interesses', 'excluir_selecionados');">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Excluir
                                </a>
                            </div>
                            <?PHP if ($interesses): ?>
                            <fieldset>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="5%">Data</td>
                                        <td width="5%">Nome</td>
                                        <td width="5%">E-mail</td>
                                        <td width="5%">Tel e Celular</td>
                                        <td width="9%">Bairros</td>
                                        <td width="5%">Valor para Compra</td>
                                        <td width="5%">Valor para Alugar</td>
                                        <td width="5%">Desejo</td>
                                        <td width="5%">Modificar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP
                                        foreach ($interesses as $interesse):
                                            ?>

                                            <tr class="odd">
                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $interesse->interesseID ?>" /></td>
                                                <td><?= format_data_mysql($interesse->data_criacao) ?></td>
                                                <td width="5%"><?= $interesse->nome; ?></td>
                                                <td width="5%"><?= $interesse->email; ?></td>
                                                <td width="5%"><?= $interesse->telefone; ?><br/><?= $interesse->celular; ?></td>
                                                <td width="9%"><?= $interesse->bairro1; ?><br /><?= $interesse->bairro2; ?><br /><?= $interesse->bairro3; ?><br /><?= $interesse->bairro4; ?></td>
                                                <td width="5%"><?= $interesse->valor_comprar; ?></td>
                                                <td width="5%"><?= $interesse->valor_alugar; ?></td>
                                                <td width="5%">
                                                    <?PHP
                                                    if ($interesse->comprar_ou_alugar == 1) {
                                                        echo 'Comprar';
                                                    } elseif ($interesse->comprar_ou_alugar == '2') {
                                                        echo 'Alugar';
                                                    } elseif ($interesse->comprar_ou_alugar == '3') {
                                                        echo 'Tanto Faz';
                                                    }
                                                    ?>
                                                </td>                                                    
                                                <td align="center">
                                                    <a href="admin/interesses/editar/<?= $interesse->interesseID; ?>">
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