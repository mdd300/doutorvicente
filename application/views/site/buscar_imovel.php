<?php include 'inc/head.php'; ?>
<body class="buscar-imovel">
    <?php include 'inc/chromeframe.php'; ?>

    <?php include 'inc/header.php'; ?>

    <div class="big-title-container">
        <div class="container">
            <h1 class="big-title">
                Buscar Imóvel
                <span class="small">Você que morar em cobertura? Podemos lhe ajudar!</span>
            </h1><!-- big-title -->	
        </div>
    </div>

    <div class="container box">
        <h1 class="top-title">A Cobertura que você busca é para:</h1>

        <form action="buscar_imovel/find" method="POST">
            <div class="eight columns">
                <div class="row-form">
                    <span>Comprar</span><input type="radio" name="comprar_ou_alugar" id="comprar_ou_alugar" class="comprar comprar_ou_alugar" checked value="1">
                    <span>Alugar</span><input type="radio" name="comprar_ou_alugar" id="comprar_ou_alugar" class="alugar comprar_ou_alugar" value="2">
                    <span>Tanto Faz</span><input type="radio" name="comprar_ou_alugar" id="compraralugar" value="3" class="comprar_ou_alugar" data-required="true">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="bairro1">Bairro 1:</label>
                    <select name="bairro1" id="bairro1" data-required="true" style="width: 315px;">
                        <option value="">Selecione um bairro</option>
                        <?PHP foreach ($bairros as $bairro): ?>    
                            <option value="<?= $bairro->bairro_google; ?>"><?= $bairro->bairro_google; ?></option>
                        <?PHP endforeach; ?>
                    </select>
                </div>

                <div class="row-form">
                    <label for="bairro2" style="margin-right: 5px;">Bairro 2:</label>
                    <select name="bairro2" id="bairro2" style="width: 316px;">
                        <option value="">Selecione um bairro</option>
                        <?PHP foreach ($bairros as $bairro): ?>    
                            <option value="<?= $bairro->bairro_google; ?>"><?= $bairro->bairro_google; ?></option>
                        <?PHP endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="eight columns">
                <div class="row-form">
                    <label for="bairro3">Bairro 3:</label>
                    <select name="bairro3" id="bairro3">
                        <option value="">Selecione um bairro</option>
                        <?PHP foreach ($bairros as $bairro): ?>    
                            <option value="<?= $bairro->bairro_google; ?>"><?= $bairro->bairro_google; ?></option>
                        <?PHP endforeach; ?>
                    </select>
                </div>


                <div class="row-form">
                    <label for="bairro4">Bairro 4:</label>
                    <select name="bairro4" id="bairro4">
                        <option value="">Selecione um bairro</option>
                        <?PHP foreach ($bairros as $bairro): ?>    
                            <option value="<?= $bairro->bairro_google; ?>"><?= $bairro->bairro_google; ?></option>
                        <?PHP endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="englobavalor">
                <div class="eight columns">
                    <div class="row-form">
                        <label style="width: 94px;" for="valor_alugar">Valor Locação:</label>
                        <select name="valor_alugar" id="valor_alugar" data-required="true" style="width: 271px">
                            <option value="">Escolha um Valor</option>
                            <option value="35">até R$ 3.500 mil</option>
                            <option value="50">de R$ 3.501 à R$ 5.000</option>
                            <option value="500">acima de R$ R$ 5.000</option>
                        </select>
                    </div>
                </div>
            </div>
            
            
                <div class="eight columns">
                    <div class="englobavalor">
                        <div class="row-form">
                            <label style="width: 94px;" for="valor_comprar">Valor Venda:</label>
                            <select name="valor_comprar" id="valor_comprar" style="width: 281px">
                                <option value="">Escolha um Valor</option> 
                                <option value="800">até R$ 800.000 mil</option>
                                <option value="15">de R$ 800.001 à R$ 1,5 milhão</option>
                                <option value="15+">acima de R$ 1,5 milhão</option> 
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Filtrar" style="margin-right:54px;">
                    <div class="msg-ajax"></div>
                    <!-- <input type="range"> -->
                </div>
        </form>

    </div>
    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/scripts.php'; ?>
    <script>
        $(function(){
            $("input.comprar_ou_alugar").change(function() {
                console.log("asdfasdf");
                        var comprar_ou_alugar = $(this).val();
                        var html;
                        if (comprar_ou_alugar == 1) {
                                var bairros;
                                $.ajax({
                                    type: "POST",
                                    url: "home/get_bairros_comprar",
                                    async:false,
                                    success: function(data){
                                        bairros = $.parseJSON(data);
                                    }
                                });
                                
                                if(bairros){
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                    $.each(bairros, function(key, value){
                                        html2 += '<option value="'+ value.bairro_google +'">'+ value.bairro_google +'</option>';
                                    })
                                } else {
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                }
                                $("#bairro1, #bairro2, #bairro3, #bairro4").empty();
                                $("#bairro1, #bairro2, #bairro3, #bairro4").append(html2);

                        } else if(comprar_ou_alugar == 2) {
                                var bairros;
                                $.ajax({
                                    type: "POST",
                                    url: "home/get_bairros_alugar",
                                    async:false,
                                    success: function(data){
                                        bairros = $.parseJSON(data);
                                    }
                                });
                                
                                if(bairros){
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                    $.each(bairros, function(key, value){
                                        html2 += '<option value="'+ value.bairro_google +'">'+ value.bairro_google +'</option>';
                                    })
                                } else {
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                }
                                $("#bairro1, #bairro2, #bairro3, #bairro4").empty();
                                $("#bairro1, #bairro2, #bairro3, #bairro4").append(html2);
                        } else {
                                var bairros;
                                $.ajax({
                                    type: "POST",
                                    url: "home/get_bairros",
                                    async:false,
                                    success: function(data){
                                        bairros = $.parseJSON(data);
                                    }
                                });
                                
                                if(bairros){
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                    $.each(bairros, function(key, value){
                                        html2 += '<option value="'+ value.bairro_google +'">'+ value.bairro_google +'</option>';
                                    })
                                } else {
                                    var html2 = '<option value="">Selecione um bairro</option>';
                                }
                                $("#bairro1, #bairro2, #bairro3, #bairro4").empty();
                                $("#bairro1, #bairro2, #bairro3, #bairro4").append(html2);
                        }

                        $("#valor").empty();
                        $("#valor").append(html);
                });
        })
        
        
        hideFields()
    </script>
</body>
</html>
