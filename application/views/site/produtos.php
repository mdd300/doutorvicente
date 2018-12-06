<?php include 'inc/head.php'; ?>
<body class="produtos">
    <?php include 'inc/chromeframe.php'; ?>
    <?php include 'inc/header.php'; ?>
    <style>
        .pp_social {
            display: none;
        }
        #enviar{ display: none; }
    </style>
    <div class="big-title-container">
        <div class="container">
            <h1 class="big-title">
                Coberturas
                <?PHP if (isset($total_imoveis) and ($total_imoveis) > 1) { ?>
                    <span class="small">Encontramos <?= $total_imoveis; ?> imóveis do jeito que você pediu:</span>
				<?PHP } else if (isset($total_imoveis) and ($total_imoveis) == 1) { ?>
					<span class="small">Encontramos 1 imóvel do jeito que você pediu:</span>
                <?PHP } else { ?>
                    <span class="small">Não encontramos imóveis com o filtro selecionado</span>
                <?PHP } ?>
            </h1><!-- big-title -->	
        </div>
    </div>

    <?PHP if (isset($imovel)) { ?>
        <div class="container box-produto accordeon opened">
            <div class="big-image ten columns" style="height:260px; overflow:hidden;">
                <img src="assets/uploads/imoveis/<?= $imovel->imagem; ?>" class="img-responsive">
                <a href="assets/uploads/imoveis/<?= $imovel->imagem; ?>" class="more-photos" rel="prettyPhoto[gallery1]" >Ver mais fotos</a>
                <?PHP
                $imagens = $imovel->imagens;
                foreach ($imagens as $imagem):
                    ?>
                    <a href="assets/uploads/imoveis/<?= $imagem->path; ?>" class="more-photos hidden" rel="prettyPhoto[gallery1]"></a>
                    <?PHP
                endforeach;
                ?>
            </div>
            <div class="description six columns">
                <h1>
                    Código: <?= $imovel->referencia; ?><br>
                    <?PHP         
                    if($imovel->comprar_ou_alugar == 1){ 
                        echo '<small>Venda</small>';
                    } else if($imovel->comprar_ou_alugar == 2) {
                        echo '<small>Locação</small>';
                    } else {
                        echo '<small>Venda e Locação</small>';
                    }
                    ?>
                    
                </h1>
                <p>
                    Bairro Correios: <?= $imovel->bairro_correios; ?><br>
                    Bairro Google Maps: <?= $imovel->bairro_google; ?><br>
                    Área Útil: <?= $imovel->area; ?> m2<br>
                    Andar: <?= $imovel->andar; ?>º<br>
                    <?PHP if ($imovel->valor_comprar != ''): ?>
                        Valor para Venda: <?= $imovel->valor_comprar; ?><br>
                    <?PHP endif; ?>
                    <?PHP if ($imovel->valor_alugar != ''): ?>
                        Valor para Locação: <?= $imovel->valor_alugar; ?><br>
                    <?PHP endif; ?>
                    Valor do Condomínio: <?= $imovel->valor_condominio; ?><br>
                    <small class="advice">Os valores e condições do imóvel podem alterar sem aviso prévio</small>
                </p>
                <a href="#" onClick="return false;" id="1" data-href="<?= base_url(); ?>imoveis/<?= $imovel->slug; ?>/<?= $imovel->imovelID; ?>/" class="more-info">quero mais informações</a>
                <a class="print" href="#">Imprimir</a>
            </div><!-- description -->
            <div class="clearfix"></div>
            <div class="ocult-info prod-info" style="display:block;">
                <div class="eight columns left">
                    <h1 class="cobertura"><span></span>A Cobertura</h1>
                    <p>
                        <?= $imovel->sobre_cobertura; ?>
                    </p>
                </div>

                <div class="eight columns right">
                    <h1 class="vizinhanca"><span></span>A Vizinhança</h1>
                    <p>
                        <?= $imovel->sobre_vizinhanca; ?>
                    </p>
                </div>

                <div class="clearfix"></div>

                <div class="eight columns left">
                    <h1 class="edificio"><span></span>O Edifício</h1>
                    <p>
                        <?= $imovel->sobre_edificio; ?>
                    </p>
                </div>

                <div class="eight columns right">
                    <h1 class="atencao"><span></span>Pontos de Atenção</h1>
                    <p>
                        <?= $imovel->pontos_atencao; ?>
                    </p>
                </div>

                <div class="eight columns right">
                    <h1 class="avista"><span></span>A Vista</h1>
                    <p>
                        <?= $imovel->sobre_vista; ?>
                    </p>
                </div>

                <div class="eight columns right sharebox">
                    <a>> Compartilhar</a><br />
                    <ul class="contacts">
                        <li><a href="#" class="facebook share_facebook" target="_blank"></a></li>
                        <li><a href="#enviar" rel="prettyInline" class="email"></a></li>
                    </ul>
                    <div id="enviar">
                        <form class="amigo" method="POST" action="contato/amigo" style="width: 370px;margin: 0 auto;height: 60px;padding-top: 24px;position: relative;">
                            <small style="font-size: 13px; padding-bottom: 13px; display: block;">Envie essa cobertura para um email!</small>
                            <div class="pp_inline">
                                <label style="text-align: center;font-size: 15px;text-transform: uppercase;margin-right: 10px;" for="#email">Email:</label>
                                <input type="text" id="email" name="email" style="padding: 3px; width: 200px;">                                
                                <input type="submit" style="background-color: orange; padding: 0 8px; color: #fff;border: 0;margin-left: 5px;text-transform: uppercase;" value="enviar">
                            </div>
                            <input type="hidden" name="link" value="Teste">
                        </form>
                    </div>

                    <?PHP if ($imovel->video): ?>
                        <a href="<?= $imovel->video; ?>" rel="prettyPhoto">> Veja o vídeo</a><br />
                    <?PHP endif; ?>
                    <address>
                        <span>+55 11 2597 9979</span><br />
                        <a href="mailto:euquero@viveremcobertura.com.br">euquero@viveremcobertura.com.br</a><br />
                        <a href="http://www.viveremcobertura.com.br">www.viveremcobertura.com.br</a><br />
                    </address>
                </div>
            </div>
        </div>



    <?PHP } else { ?>

        <?PHP if (isset($imoveis)) foreach ($imoveis as $key => $imovel): ?>
                <div class="container box-produto accordeon">
                    <div class="big-image ten columns" style="height:260px; overflow:hidden;">
                        <img src="assets/uploads/imoveis/<?= $imovel->imagem; ?>" class="img-responsive">
                        <a href="assets/uploads/imoveis/<?= $imovel->imagem; ?>" class="more-photos" rel="prettyPhoto[gallery<?= $key; ?>]">Ver mais fotos</a>
                        <?PHP
                        $imagens = $imovel->imagens;
                        foreach ($imagens as $imagem):
                            ?>
                            <a href="assets/uploads/imoveis/<?= $imagem->path; ?>" class="more-photos hidden" rel="prettyPhoto[gallery<?= $key; ?>]" alt="<?= $imagem->alt; ?>" title="<?= $imagem->alt; ?>" ></a>
                            <?PHP
                        endforeach;
                        ?>
                    </div>
                    <div class="description six columns">
                        <h1>
                            Código: <?= $imovel->referencia; ?><br>
                            <?PHP         
                                if($imovel->comprar_ou_alugar == 1){ 
                                    echo '<small>Venda</small>';
                                } else if($imovel->comprar_ou_alugar == 2) {
                                    echo '<small>Locação</small>';
                                } else {
                                    echo '<small>Venda e Locação</small>';
                                }
                            ?>
                        </h1>
                        <p>
                            Bairro Correios: <?= $imovel->bairro_correios; ?><br>
                            Bairro Google Maps: <?= $imovel->bairro_google; ?><br>
                            Área Útil: <?= $imovel->area; ?> m2<br>
                            Andar: <?= $imovel->andar; ?>º<br>
                            <?PHP if ($imovel->valor_comprar != ''): ?>
                                Valor para Venda: <?= $imovel->valor_comprar; ?><br>
                            <?PHP endif; ?>
                            <?PHP if ($imovel->valor_alugar != ''): ?>
                                Valor para Locação: <?= $imovel->valor_alugar; ?><br>
                            <?PHP endif; ?>
                            Valor do condomínio: <?= $imovel->valor_condominio; ?><br>
                            <small class="advice">Os valores e condições do imóvel podem alterar sem aviso prévio</small>
                        </p>
                        <a href="#" onClick="return false;" id="1" data-href="<?= base_url(); ?>imoveis/<?= $imovel->slug; ?>/<?= $imovel->imovelID; ?>/" class="more-info">quero mais informações</a>
                        <a class="print" href="#">Imprimir</a>
                    </div><!-- description -->

                    <div class="clearfix"></div>

                    <div class="ocult-info prod-info">
                        <div class="eight columns left">
                            <h1 class="cobertura"><span></span>A Cobertura</h1>
                            <p>
                                <?= $imovel->sobre_cobertura; ?>
                            </p>
                        </div>

                        <div class="eight columns right">
                            <h1 class="vizinhanca"><span></span>A Vizinhança</h1>
                            <p>
                                <?= $imovel->sobre_vizinhanca; ?>
                            </p>
                        </div>

                        <div class="clearfix"></div>

                        <div class="eight columns left">
                            <h1 class="edificio"><span></span>O Edifício</h1>
                            <p>
                                <?= $imovel->sobre_edificio; ?>
                            </p>
                        </div>

                        <div class="eight columns right">
                            <h1 class="atencao"><span></span>Pontos de Atenção</h1>
                            <p>
                                <?= $imovel->pontos_atencao; ?>
                            </p>
                        </div>
                        <div class="eight columns right">
                            <h1 class="avista"><span></span>A Vista</h1>
                            <p>
                                <?= $imovel->sobre_vista; ?>
                            </p>
                        </div>
                        <div class="eight columns right sharebox">
                            <a>> Compartilhar</a><br />
                            <ul class="contacts">
                                <li><a href="#" class="facebook share_facebook" target="_blank"></a></li>
                                <li><a href="#enviar" rel="prettyInline" class="email"></a></li>
                            </ul>
                            <div id="enviar">
                                 <form class="amigo" method="POST" action="contato/amigo" style="width: 370px;margin: 0 auto;height: 60px;padding-top: 24px;position: relative;">
                                    <small style="font-size: 13px; padding-bottom: 13px; display: block;">Envie essa cobertura para um email!</small>
                                    <div class="pp_inline">
                                        <label style="text-align: center;font-size: 15px;text-transform: uppercase;margin-right: 10px;" for="#email">Email:</label>
                                        <input type="text" id="email" name="email" style="padding: 3px; width: 200px;">                                
                                        <input type="submit" style="background-color: orange; padding: 0 8px; color: #fff;border: 0;margin-left: 5px;text-transform: uppercase;" value="enviar">
                                    </div>
                                    <input type="hidden" name="link" value="Teste">
                                </form>
                            </div>

                            <?PHP if ($imovel->video): ?>
                                <a href="<?= $imovel->video; ?>" rel="prettyPhoto">> Veja o vídeo</a><br />
                            <?PHP endif; ?>
                            <address>
                                <span>+55 11 2597 9979</span><br />
                                <a href="mailto:euquero@viveremcobertura.com.br">euquero@viveremcobertura.com.br</a><br />
                                <a href="http://www.viveremcobertura.com.br">www.viveremcobertura.com.br</a><br />
                            </address>
                        </div>
                    </div>
                </div>
                <?PHP
            endforeach;
    }
    ?>

    <?PHP if (isset($links)): ?>
        <div class="container">
            <!-- Page-ination -->
            <div class="pagination">
                <?= $links; ?>
            </div>
            <!-- End Page-ination -->
        </div>
    <?PHP endif; ?>


    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/scripts.php'; ?>
    <script>
                $("a[rel^='prettyPhoto']").prettyPhoto({
                    show_title: true,
                    animation_speed: "fast",
                    deeplinking: false
                });

                $("a[rel^='prettyInline']").prettyPhoto({
                    show_title: false,
                });

                if ($(".opened")[0]){
                    $(function() {
                        $(".print").fadeToggle("fast");
                        moreInfo.html("fechar");
                    });

                }
                

                $(".more-info").click(function() {
                    url = $(this).attr("data-href");
                    if(window.history.pushState) {
                        history.pushState('', '', url);
                    }
                    shareLink = 'http://www.facebook.com/sharer.php?u=' + window.location.href + "'";
                    sendmailLink = window.location.href;
                    $("a.share_facebook").attr("href", shareLink);
                    $( "input[name='link']" ).val(sendmailLink);
                });

                shareLink = 'http://www.facebook.com/sharer.php?u=' + window.location.href + "'";
                sendmailLink = window.location.href;
                $("a.share_facebook").attr("href", shareLink);
                $( "input[name='link']" ).val(sendmailLink);

                


    </script>

</body>
</html>
