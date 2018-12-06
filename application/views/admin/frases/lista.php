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
                        <h1>Frases</h1>
                        

                        <?= $this->load->view('admin/inc/messages') ?>

                        <fieldset>
                            <legend>Pesquisar</legend>
                            <form name="busca" id="busca" action="admin/frases" method="post">
                                <p>
                                    <label for="lf" style="text-align: right;">Frase: </label>
                                        <input type="text" name="frase" value="<?= @$frase; ?>" size="150"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p>
                                    <label for="lf" style="text-align: right;">nome: </label>
                                        <input type="text" name="nome" value="<?= @$nome; ?>" size="150"/>
                                    <span class="validate_error"></span>
                                    <span class="validate_success"></span>
                                </p>
                                <p style="margin-left: 80px;">
                                    <a title="Busca as frases de acordo com os filtros especificados" class="button tooltip" href="javascript: void(0);" onclick="$('#busca').submit();">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Buscar
                                    </a>
                                    <a title="Limpa as buscas efetuadas" class="button tooltip" href="admin/frases/limpar">
                                        <span class="ui-icon ui-icon-extlink "></span>
                                        Cancelar
                                    </a>
                                </p>
                            </form>
                        </fieldset>

                        <fieldset>
                            <div id="acoes" style="height: 40px; width: 100%">
                                <a style="" title="Incluir uma frase" class="button tooltip" href="admin/frases/cria">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Incluir
                                </a>
                                <a style="" title="Exclui as frases selecionadas" class="button tooltip" href="javascript: void(0);" onclick="excluirRegistros('frases', 'excluir_selecionados');">
                                    <span class="ui-icon ui-icon-extlink "></span>
                                    Excluir
                                </a>
                            </div>
                            <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="5%">Frase</td>
                                        <td width="5%">Nome</td>
                                        <td width="5%">Subir</td>
                                        <td width="5%">Descer</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($frases) {
                                        foreach ($frases as $frase){
                                            ?>
                                            <tr class="odd">
                                                <td class="selecao"><input type="checkbox" name="" id="" value="<?= $frase->fraseID ?>" /></td>
                                                <td width="5%"><a href="admin/frases/editar/<?= $frase->fraseID ?>/"><?= $frase->frase; ?></a></td>
                                                <td width="5%"><a href="admin/frases/editar/<?= $frase->fraseID ?>/"><?= $frase->nome; ?></a></td>
                                                <td width="5%"><a href="admin/frases/subir/<?= $frase->fraseID ?>/<?= $frase->sort; ?>">Subir</a></td>
                                                <td width="5%"><a href="admin/frases/descer/<?= $frase->fraseID ?>/<?= $frase->sort; ?>">Descer</a></td>
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