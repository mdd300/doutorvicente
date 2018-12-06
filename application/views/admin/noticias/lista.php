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
                        <h1>Notícias</h1>
                        <p>Gerencie as notícias do site.</p>

                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/noticias" method="post">
                                <p>
                                    <label for="lf" style="text-align: right;">Texto: </label>
                                    <input class="lf" name="texto" id="texto" type="text" value="<?= @$texto ?>" />
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>

                                <p>
                                    <label for="lf" style="text-align: right;">Data de Publicação: </label>
                                    <input class="lr datepicker" name="data_de" id="date_de" type="text" value="<?= @$data_de ?>" />até&nbsp;&nbsp;<input class="lr datepicker" name="data_ate" id="data_ate" type="text" value="<?= @$data_ate ?>" />
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">Status: </label>
                                    <select name="status" id="status">
                                        <option value="">Selecione...</option>
                                        <option <?PHP if (@$status == '1') { echo 'selected'; } ?> value="1">Inativo</option>
                                        <option <?PHP if (@$status == 'a') { echo 'selected'; } ?> value="a">Ativo</option>
                                    </select>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p style="margin-left: 80px;">
                                    <a title="Busca as notícias de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/noticias/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>

                        <fieldset>
                            <div id="acoes" style="height: 40px; width: 100%">
                                <a style="float: right; " title="Exclui as notícias selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('noticias', 'excluir_selecionados');">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Excluir
                                </a>
                                <a style="float: right; " title="Incluir uma Notícia" class="button tooltip" href="admin/noticias/cria">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Incluir
                                </a>
                            </div>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="30%">Foto</td>
                                        <td width="30%">Título</td>
                                        <td width="15%" align="center">Data de Publicação</td>
                                        <td width="10%" align="center">Status</td>

                                    </tr>
                                </thead>
                                <tbody>
                                            <?php
                                            if ($noticias) {
                                                foreach ($noticias as $noticia) {
                                                    ?>
                                            <tr class="odd" lang="<?= base_url() ?>admin/noticias/editar/<?= $noticia->noticiaID ?>">

                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $noticia->noticiaID ?>" /></td>
                                                <td width="30%">
                                            <?php if ($noticia->imagem): ?>
                                                        <img src="<?= base_url() . "assets/uploads/noticias/" . $noticia->imagem; ?>" alt="<?= $noticia->legenda; ?>" width="100px" />
                                            <?php endif; ?>
                                                </td>
                                                <td><?= $noticia->titulo ?></td>
                                                <td align="center"><?= format_data_mysql($noticia->data_publicacao) ?> <?= format_hora_mysql($noticia->data_publicacao) ?></td>
                                                <td align="center"><?PHP if ($noticia->status == '1') {
                                        echo 'Inativo';
                                    } elseif ($noticia->status == 'a') {
                                        echo 'Ativo';
                                    } ?></td>
                                            </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                        <tr class="odd">
                                            <td class="col-first" colspan="4">Nenhum ítem cadastrado no sistema.</td>
                                        </tr>
                                                <?php
                                            }
                                            ?>
                                </tbody>
                            </table>
                            <hr />
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