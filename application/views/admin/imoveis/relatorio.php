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
                        <h1>Relatórios</h1>
                        <p>Período de: <b><?= $inicio; ?></b> até <b><?= $fim; ?></b>:</p>
                        <p>Total de Imóveis cadastrado: <?= $imoveis_qtd; ?></p>

                        <div class="periodo">
                            <h2>Selecione o Período:</h2>
                            <form method="POST" action="admin/imoveis/relatorios" />
                            <input type="text" name="inicio" id="inicio" placeholder="Inicio" />
                            <input type="text" name="fim" id="fim" placeholder="Fim" />
                            <input type="submit" value="Filtrar" />
                            </form>
                            
                            <div class="periodo">
                                <div class="pad20">
                                    <div id="placeholder" style="width:300px; height:300px;"></div>
                                    <p>Neste período foram cadastrados:</p>
                                    <?PHP foreach($imoveis_bairros as $imovel):?>
                                        <p><b><?= $imovel->bairro_google; ?>:</b> <?= $imovel->total; ?></p>
                                    <?PHP endforeach; ?>
                                </div>
                            </div>
                            <a href="admin/imoveis/exportar/<?= str_replace('/', '_', $inicio); ?>/<?= str_replace('/', '_', $fim); ?>/" target="_blank">
                                        <img src="assets/images/admin/icons/13_48x48.png" title="Exportar este Período" />
                                        Exportar este período
                                    </a>
                            <hr />
                        </div>
                        
                        
                        <legend>Resultado</legend>
                            <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                                <thead>
                                    <tr>
                                        <td width="5%"><input type="checkbox" name="selecionar_todos" onclick="selecionar_todos(this)" id="selecionar_todos" value="" /></td>
                                        <td width="5%">Data</td>
                                        <td width="5%">Referência</td>
                                        <td width="5%">Bairro</td>
                                        <td width="5%">Área</td>
                                        <td width="9%">Andar</td>
                                        <td width="5%">Valor para Compra</td>
                                        <td width="5%">Valor para Alugar</td>
                                        <td width="5%">Condomínio</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP
                                    if ($imoveis) {
                                        foreach ($imoveis as $imovel):
                                            ?>
                                            
                                                <tr class="odd">
                                                    <td class="selecao"><input type="checkbox" name="" id="" value="<?= $imovel->imovelID ?>" /></td>
                                                    <td><?= format_data_mysql($imovel->data_criacao) ?></td>
                                                    <td width="5%"><?= $imovel->referencia; ?></td>
                                                    <td width="5%"><?= $imovel->bairro_google; ?></td>
                                                    <td width="9%"><?= $imovel->area; ?></td>
                                                    <td width="5%"><?= $imovel->andar; ?></td>
                                                    <td width="5%"><?= $imovel->valor_comprar; ?></td>
                                                    <td width="5%"><?= $imovel->valor_alugar; ?></td>
                                                    <td width="5%"><?= $imovel->condominio; ?></td>
                                                </tr>
                                            </a>
                                            <?PHP
                                        endforeach;
                                    } else {
                                        ?>
                                        <tr class="odd">
                                            <td class="col-first" colspan="4">Nenhum imóvel cadastrado no sistema.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        
                    </div>

                    <!-- End of Main Content -->
                </div>
                <!-- End of bgwrap -->
            </div>
            <!-- End of Container -->
        </div>
        <!-- Footer -->
        <?= $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
        <script type="text/javascript">
            $(function() {
                var data = [];
                var series = Math.floor(Math.random() * 10) + 1;
                
                var colors = Array("#1b2368","#bf9900","#ba391f", "#00AFD7", "#038805");

                <?PHP foreach($imoveis_bairros as $key => $row): ?>
                        var color = colors[Math.floor(Math.random()*colors.length)];
                        data[<?= $key; ?>] = {label: "<?= $row->bairro_google; ?>", data: eval(<?= $row->total; ?>), color: color}
                <?PHP endforeach; ?>
                
                

                $.plot($("#placeholder"), data,
                        {
                            series: {
                                pie: {
                                    show: true,
                                    radius: 1,
                                    label: {
                                        show: true,
                                        radius: 1,
                                        formatter: function(label, series) {
                                            return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                                        },
                                        background: {opacity: 0.8}
                                    }
                                }
                            },
                            legend: {
                                show: false
                            }
                        });
            });

            $(function() {
                $("#inicio").datepicker();
                $("#fim").datepicker();
            });

        </script>


    </body>
</html>