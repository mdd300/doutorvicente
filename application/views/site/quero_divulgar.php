<?php include 'inc/head.php'; ?>
<body class="quero-divulgar">
    <?php include 'inc/chromeframe.php'; ?>

    <?php include 'inc/header.php'; ?>

    <div class="big-title-container">
        <div class="container">
            <h1 class="big-title">
                Quero Divulgar
                <span class="small">Deixe sua cobertura sob nossos cuidados!</span>
            </h1><!-- big-title -->	
        </div>
    </div>

    <div class="container box">

        <h1 class="top-title">Informações sobre sua cobertura:</h1>

        <form action="quero_divulgar/save" data-validate="parsley">
            <div class="sixteen columns">
                <span>Sua cobertura será para:</span>
                <div class="row-form">
                    <span>Vender</span><input type="radio" name="comprar_ou_alugar" id="1" value="1" />
                    <span>Alugar</span><input type="radio" name="comprar_ou_alugar" id="2" value="2" />
                    <span>Venda e Locação</span><input type="radio" name="comprar_ou_alugar" value="3" id="3" data-required="true" />
                </div>
            </div>
            <div class="eight columns">
                <div class="row-form valor-area-venda">
                    <label for="valor-venda">Valor para venda:</label>
                    R$   <input type="text" name="valor_comprar" id="valor_comprar"><br>
                    <small>(incluso comissão de 6%)</small>
                </div><!-- row-form -->
                <div class="row-form very-small">
                    <label for="valor-area" style="width: 60px;">Área útil:</label>
                    <input type="text" name="area" id="area" data-required="true" data-type="digits" style="margin-right:45px"><span style="position: absolute; right: 288px; top: 3px;">m²</span>

                    <label for="area-privativa">Área privativa:</label>
                    <input type="text" name="area_privativa" id="area" data-required="true" data-type="digits"><span style="position: absolute; right: 90px; top: 2px;">m²</span>
                </div><!-- row-form -->
            </div>

            <!---
            <div class="eight columns">
                <div class="row-form">
                    <label for="valor-venda">IPTU:</label>
                    R$   <input type="text" name="iptu" id="iptu">
                </div>
            </div>
            <div class="eight columns">
                <div class="row-form">
                    <label for="valor-venda">Código de Cadastro do Imóvel (IPTU):</label>
                    R$   <input type="text" name="codigo_iptu" id="codigo_iptu"><br>
                </div>
            </div>
            !-->

            <div class="eight columns">
                <div class="row-form valor-area-venda">
                    <label for="valor-locacao">Valor para locação:</label>
                    R$   <input type="text" name="valor_alugar" id="valor_alugar" style="width: 213px;">
                    <br><small>(comissão: primeiro aluguel)</small>
                </div><!-- row-form -->
                <div class="row-form valor-condominio">
                    <label for="valor-condominio">Valor do condomínio:</label>
                    R$   <input type="text" name="valor_condominio" id="valor_condominio" style="width: 201px">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="valor-venda">IPTU:</label>
                    R$   <input type="text" name="iptu" id="iptu">
                </div>
            </div>
            <div class="eight columns">
                <div class="row-form">
                    <label for="valor-venda">Código de Cadastro do Imóvel:</label>
                    <input type="text" name="codigo_iptu" id="codigo_iptu" style="width:155px;"><br>
                </div>
            </div>

            <div class="sixteen columns">
                <div class="row-form long-text">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" id="endereco" data-required="true" data-minlength="6"  style="width: 788px">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" data-required="true" data-minlength="3">
                </div>
            </div>
            <div class="eight columns">
                <div class="row-form valor-casa">
                    <label for="situacao-casa">Situação da cobertura:</label>
                    <select name="situacao" id="situacao" style="width:208px;">
                        <option value="Nova" data-required="true">Nova</option>
                        <option value="Conservada" data-required="true">Conservada</option>
                        <option value="Precisa reformar" data-required="true">Precisa reformar</option>
                    </select>
                </div>
            </div>
            <div class="sixteen columns">
                <div class="row-form long-text">
                    <label for="armario_cozinha">Armário na cozinha:</label>
                    <span>Sim</span><input type="radio" value="1" name="armario_cozinha" id="armario_cozinha">
                    <span>Não</span><input type="radio" value="2" name="armario_cozinha" id="armario_cozinha" data-required="true">
                </div>
            </div>
            <div class="six columns quantidade-qas">
                <div class="row-form">
                    <label for="quantidade_salas">Quantidade de salas:</label>
                    <input type="text" name="quantidade_salas" id="quantidade_salas" data-required="true" data-type="digits">
                </div>
                <div class="row-form">
                    <label for="quantidade_quartos">Quantidade de quartos:</label>
                    <input type="text" name="quantidade_quartos" id="quantidade_quartos" data-required="true" data-type="digits">
                </div>
                <div class="row-form">
                    <label for="quantidade_suites">Quantidade de suítes:</label>
                    <input type="text" name="quantidade_suites" id="quantidade_suites" data-required="true" data-type="digits">
                </div>
                <div class="row-form">
                    <label for="vagas-carro">Vagas:</label>
                    <input type="text" name="vagas_carros" id="vagas_carros" data-type="digits">
                </div>
                <div class="row-form quantidade-qas input">
                    <label for="vagas-carro">Andar:</label>
                    <input type="text" name="andar" id="andar" data-type="digits">
                </div>
            </div>

            <div class="nine columns armarios-closet">
                <div class="row-form">
                    <label for="lavabo">Lavabo?</label>
                    <span>Sim</span><input type="radio" name="lavabo" id="lavabo" value="1">	
                    <span>Não</span><input type="radio" name="lavabo" id="lavabo" value="2" data-required="true">
                </div>
                <div class="row-form">
                    <label for="armarios_quartos">Armários nos quartos?</label>
                    <span>Sim</span><input type="radio" name="armarios_quartos" id="armarios_quartos" value="1">	
                    <span>Não</span><input type="radio" name="armarios_quartos" id="armarios_quartos" value="2">
                    <span>Em alguns</span><input type="radio" name="armarios_quartos" id="armarios_quartos" value="3" data-required="true">
                </div>
                <div class="row-form">
                    <label for="armarios_suite">Armários nas suítes?</label>
                    <span>Sim</span><input type="radio" name="armarios_suite" id="armarios_suite" value="1">	
                    <span>Não</span><input type="radio" name="armarios_suite" id="armarios_suite" value="2">
                    <span>Em alguns</span><input type="radio" name="armarios_suite" id="armarios_suite" value="3" data-required="true">
                </div>
                <div class="row-form">
                    <label for="closet_suites">Closet nas suítes?</label>
                    <span>Sim</span><input type="radio" name="closet_suites" value="1" id="closet_suites">	
                    <span>Não</span><input type="radio" name="closet_suites" value="2" id="closet_suites">
                    <span>Em algumas</span><input type="radio" name="closet_suites" id="closet_suites" value="3" data-required="true">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="eighteen columns vagas-carro-infos">
                <div class="row-form">
                    <label for="outros_detalhes">Outros detalhes importantes (vantagens e desvantagens) que você gostaria de nos contar</label>
                </div>
                <div class="row-form">
                    <textarea name="outros_detalhes" id="outros_detalhes" style="width: 873px"></textarea>
                </div>
            </div>

            <h1>Para finalizar informe alguns dados</h1>

            <div class="sixteen columns">
                <div class="row-form long-text">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" name="nome" id="nome" data-required="true" data-minlength="3" style="width: 750px;">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" data-required="true" data-type="email" style="width: 307px;">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" data-required="true" placeholder="Apenas números" style="width: 301px">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="">Aniversário (dia e mês):</label>
                    <input type="text" data-required="true" class="aniversario" name="aniversario" maxlength="5" style="width: 191px;">
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="celular" placeholder="Apenas números" style="width: 313px;">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="eight columns">
                <div class="row-form long-text">
                    <label for="como_conheceu" style="width: 130px;">Como conheceu a Viver em Cobertura:</label>
                    <select name="como_conheceu" id="como_conheceu" data-required="true" style="width: 275px;">
                        <option value=""></option>
                        <option value="Google ou Bing">Google ou Bing</option>
                        <option value="Facebook">Facebook</option>
                        <option value="YouTube">YouTube</option>
                        <option value="Indicação de um amigo">Indicação de um amigo</option>
                        <option value="Placa de vende/aluga">Placa de vende/aluga</option>
                        <option value="Mídia impressa">Mídia impressa</option>
                        <option value="Internet">Internet</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
                <input type="submit" value="cadastrar" style="float:left; margin-top:20px;">
                <div class="msg-ajax" style="float: left;
                     width: 38%;
                     margin-top: 20px;
                     margin-left: -35px;
                     color: #fff;
                     background-color: green;
                     font-size: 14px;
                     text-align: center;
                     padding: 4px;"></div>
            </div>
        </form>

    </div>

    <?php include 'inc/footer.php'; ?>

    <?php include 'inc/scripts.php'; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal-orange',
            });

            $("#valor_alugar").maskMoney({symbol: 'R$   ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
            $("#valor_condominio").maskMoney({symbol: 'R$   ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
            $("#valor_comprar").maskMoney({symbol: 'R$   ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
            $("#iptu").maskMoney({symbol: 'R$   ', showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});

        });
    </script>

</body>
</html>
