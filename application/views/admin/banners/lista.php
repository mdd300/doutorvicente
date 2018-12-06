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
                        <h1>Banners</h1>

                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/banners" method="post">

                                <p>
                                    <label for="lf" style="text-align: right;">Status: </label>
                                    <select name="status" id="status">
                                        <option value="">Selecione...</option>
                                        <option <?php
                                        if (@$status == 'i') {
                                            echo 'selected';
                                        }
                                        ?> value="i">Inativo</option>
                                        <option <?php
                                        if (@$status == 'a') {
                                            echo 'selected';
                                        }
                                        ?> value="a">Ativo</option>
                                    </select>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p style="margin-left: 80px;">
                                    <a title="Busca os banners de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/banners/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>

                        <fieldset>
                            <div id="acoes" style="height: 40px; width: 100%">
                                <a style="" title="Incluir um Banner" class="button tooltip" href="admin/banners/cria">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Incluir
                                </a>
                                <a style="" title="Exclui os banners selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('banners', 'excluir_selecionados');">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Excluir
                                </a>
                            </div>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="10%">Foto</td>
                                        <td width="5%">Subir</td>
                                        <td width="5%">Descer</td>
                                        <td width="15%" align="center">Data de Publicação</td>
                                        <td width="10%" align="center">Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($banners) {
                                        foreach ($banners as $banner) {
                                            ?>
                                            <tr class="odd">

                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $banner->bannerID ?>" /></td>
                                                <td width="30%">
                                                    <?php if ($banner->path): ?>
                                                    <a href="<?= base_url() ?>admin/banners/editar/<?= $banner->bannerID ?>">
                                                        <img src="<?= base_url() . "assets/uploads/banners/" . $banner->path; ?>" width="100px" />
                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td width="5%"><a href="admin/banners/subir/<?= $banner->bannerID ?>/<?= $banner->sort; ?>">Subir</a></td>
                                                <td width="5%"><a href="admin/banners/descer/<?= $banner->bannerID ?>/<?= $banner->sort; ?>">Descer</a></td>
                                                <td align="center"><?= format_data_mysql($banner->data_criacao) ?></td>
                                                <td align="center"><?PHP
                                                    if ($banner->status == 'i') {
                                                        echo 'Inativo';
                                                    } elseif ($banner->status == 'a') {
                                                        echo 'Ativo';
                                                    }
                                                    ?></td>
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