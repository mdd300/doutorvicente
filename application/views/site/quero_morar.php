<?php include 'inc/head.php'; ?>
    <body class="buscar-imovel">
        <?php include 'inc/chromeframe.php'; ?>

        <?php include 'inc/header.php'; ?>

		<div class="big-title-container">
			<div class="container">
				<h1 class="big-title">
					Quero Morar
				<span class="small">Ah, eu quero morar em uma cobertura! Anotem meus dados aí!</span>
				</h1><!-- big-title -->	
			</div>
		</div>

		<div class="container box">
			<h1 class="top-title">A Cobertura que você busca é para:</h1>
			
			<form action="quero_morar/save" data-validate="parsley">
				<div class="eight columns">
					<div class="row-form">
						<span>Comprar</span><input type="radio" class="comprar" name="comprar_ou_alugar" value="1">
						<span>Alugar</span><input type="radio" class="alugar" name="comprar_ou_alugar" value="2">
						<span>Tanto Faz</span><input type="radio" checked="checked" name="comprar_ou_alugar" data-required="true" value="3">
					</div>
				</div>

				<h1>Em que bairros você gostaria de morar?</h1>
				
				<div class="eight columns">
					<div class="row-form">
						<label for="bairro1">Bairro 1:</label>
						<input type="text" name="bairro1" id="bairro1" data-required="true" style="width: 315px;">
					</div>

					<div class="row-form">
						<label for="bairro2" style="margin-right: 5px;">Bairro 2:</label>
						<input type="text" name="bairro2" id="bairro2" style="width: 315px;">
					</div>
				</div>
				
				<div class="eight columns">
					<div class="row-form">
						<label for="bairro3">Bairro 3:</label>
						<input type="text" name="bairro3" id="bairro3">
					</div>

					
					<div class="row-form">
						<label for="bairro4">Bairro 4:</label>
						<input type="text" name="bairro4" id="bairro4">
					</div>
				</div>

				<h1>Quanto você está disposto a pagar?</h1>
				
				<div class="eight columns">
					<div class="row-form medium-text">
						<label for="valor_comprar">Para comprar até: R$</label>
						<input type="text" name="valor_comprar" id="valor_comprar">
					</div>
				</div>
				
				<div class="eight columns">
					<div class="row-form medium-text">
						<label for="valor_alugar">Para alugar até: R$</label>
						<input type="text" name="valor_alugar" id="valor_alugar">
					</div>
				</div>

				<h1>Outras Informações</h1>
				
				<div class="sixteen columns">
					<div class="row-form long-text">
						<label for="nome">Nome Completo:</label>
						<input type="text" name="nome" id="nome" data-required="true" style="width:753px">
					</div>
				</div>

				<div class="eight columns">
					<div class="row-form">
						<label for="email">Email:</label>
						<input type="email" name="email" id="email" data-required="true" data-type="email">
					</div>
				</div>

				<div class="eight columns">
					<div class="row-form">
						<label for="telefone">Tel. Fixo:</label>
						<input type="tel" name="telefone" id="telefone" data-required="true">
					</div>
				</div>
				
				<div class="eight columns">
					<div class="row-form">
						<label for="aniversario">Aniversário: (dia e mês)</label>
						<input name="aniversario"  style="width:195px;" id="aniversario" class="aniversario" maxlength="5" style="width: 269px;">
					</div>
				</div>

				<div class="eight columns">
					<div class="row-form">
						<label for="celular" style="margin-right: 17px;">Celular:</label>
						<input type="tel" name="celular" id="celular" style="width: 310px;">
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="eight columns">
					<div class="row-form long-text">
						<label for="como_conheceu" style="width: 130px;">Como conheceu a Viver em Cobertura?</label>
						<select name="como_conheceu" id="como_conheceu" style="width: 275px;">
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
					<input type="submit" value="Enviar" style="float:left; margin-top:20px;">
					<div class="msg-ajax" style="float: left; width: 38%; margin-top: 20px; margin-left: -35px; color: rgb(255, 255, 255); background-color: green; font-size: 14px; text-align: center; padding: 4px;"></div>
				</div>
			</form>
			
		</div>

        <?php include 'inc/footer.php'; ?>
      
        <?php include 'inc/scripts.php'; ?>

  		<script>
			$(document).ready(function(){
			  // $('input').iCheck({
			  //   checkboxClass: 'icheckbox_minimal',
			  //   radioClass: 'iradio_minimal-orange',
			  //   // increaseArea: '20%' // optional
			  // });
                          
	            $("#valor_alugar").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
	            $("#valor_comprar").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
        		
        		
			});
		</script>
    </body>
</html>
