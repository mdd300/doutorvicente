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
                        <p>Atendimento no período de: <b><?= $inicio; ?></b> até <b><?= $fim; ?></b>:</p>
                        
                        
                            <h2>Selecione o Período:</h2>
                            <form method="POST" action="admin/interesses/relatorio" />
                                <input type="text" name="inicio" id="inicio" placeholder="Inicio" />
                                <input type="text" name="fim" id="fim" placeholder="Fim" />
                                <input type="submit" value="Filtrar" />
                            </form>
                        
                            <div class="pad20">
                                
                                <a href="admin/interesses/exportar/<?= str_replace('/','_',$inicio); ?>/<?= str_replace('/','_',$fim); ?>/" target="_blank">
                                    <img src="assets/images/admin/icons/13_48x48.png" title="Exportar este Período" />
                                    Exportar este período
                                </a>
                            </div>

                    </div>
                    <table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <td width="5%">Data</td>
                                <td width="5%">Nome</td>
                                <td width="5%">E-mail</td>
                                <td width="5%">Tel e Celular</td>
                                <td width="9%">Bairros</td>
                                <td width="5%">Valor para Compra</td>
                                <td width="5%">Valor para Alugar</td>
                                <td width="5%">Desejo</td>
                            </tr>
                        </thead>
<tbody>
                                    <?PHP
                                    if (isset($interesses)) {
                                        foreach ($interesses as $interesse):
                                            ?>
                                            
                                                <tr class="odd">
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
                                                </tr>
                                            </a>
                                            <?PHP
                                        endforeach;
                                    } else {
                                        ?>
                                        <tr class="odd">
                                            <td class="col-first" colspan="4">Nenhum ítem cadastrado no sistema.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                    <table>


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
                $( "#inicio" ).datepicker();
                $( "#fim" ).datepicker();
            });
        </script>
        
        
    </body>
</html>