<!DOCTYPE html>
<html>
	<?php include 'inc/head.php' ?>
	<body class="ovodoacao">
		<div class="site_container">
			<?php include 'inc/header.php' ?>
			<div class="page relative">
				<div class="page_layout page_margin_top clearfix">
					<div class="page_header clearfix">
						<div class="page_header_left">
							<h1 class="page_title">
								<small>Tratamentos:</small>
								Programa de Doação Compartilhada de Óvulos
							</h1>
							
						</div>
					</div>
					<div class="clearfix">

						<div class="gallery_item_details_list clearfix page_margin_top about-right">
							<ul class="columns full_width page_margin_top clearfix">
								
								<li class="column no_width">
									<div class="dropcap">
											<p>
												Algumas mulheres que perderam a função de seus ovários, ou que tem uma baixa qualidade de seus óvulos, só vão conseguir engravidar com a Fertilização In Vitro utilizando óvulos de uma doadora.
											</p>

											<p>
												No entanto existe uma dificuldade de se obter doadoras, e por isso, ainda não existem bancos de óvulos, como há bancos de doadores de sêmen. A alternativa é o compartilhamento de óvulos, procedimento recentemente acolhido pelo Conselho Federal de Medicina, que passou a figurar como resolução publicada no Diário Oficial, do dia 09/05/2013.
											</p>

											<p>
												Nesse processo, uma mulher com menos de 35 anos de idade e que necessita de Fertilização in Vitro para engravidar, concorda em ceder, de forma anônima, parte dos óvulos coletados para o seu próprio tratamento.
											</p>

											<p>
												A idade da mulher que doa é importante para haver óvulos suficientes para compartilhar, sem prejudicar seu próprio tratamento. A doação compartilhada traz benefícios ao tratamento de dois casais simultaneamente: aquele cuja mulher não tem óvulos viáveis para conseguir a gravidez e o outro, cuja mulher pode doar, e tem, com essa doação, uma redução importante nos custos de seu tratamento, já que é um processo em que duas Fertilzações in Vitro são realizadas consecutivamente.
											</p>

											<p>
												Caso tenha interesse em participar, ou mesmo saber mais sobre o programa, agende uma entrevista/consulta na EMBRYO FETUS pelo telefone (11) 3051-2313 ou entre em contato por email: contato@embryofetus.com.br
											</p>
											<br><br>
											

											<div class="dropcap_label logo-title">
												<h3>Cadastro para doação compartilhada</h3>
											</div>
											Para doar óvulos, você deve ter menos de 35 anos, histórico negativo de doenças genéticas transmissíveis e histórico negativo para doenças infecciosas sexualmente transmissíveis, como hepatite, sífilis, AIDS, etc...
											<form action="ovodoacao/cadastro_doacao" class="contact_form">
												<div class="column_left">
													<label for="nome">Nome Completo:</label>
													<input type="text" class="text_input" id="nome" name="nome">

													<label for="idade">Idade:</label>
													<input type="text" class="text_input" id="idade" name="idade">

													<label for="grupo_etnico">Grupo Étnico:</label>
													<select name="grupo_etnico" id="grupo_etnico">
														<option value="Branca">Branca</option>
														<option value="Parda">Parda</option>
														<option value="Negra">Negra</option>
														<option value="Asiática">Asiática</option>
														<option value="Índia">Índia</option>
														<option value="Outra">Outra</option>
													</select>

													<label for="endereco">Endereço Completo:</label>
													<input type="text" class="text_input" id="endereco" name="endereco">

													<label for="cidade">Cidade:</label>
													<input type="text" class="text_input" id="cidade" name="cidade">
												</div>

												<div class="column_right">
													<label for="estado">Estado:</label>
													<input type="text" class="text_input" id="estado" name="estado">

													<label for="CEP">CEP:</label>
													<input type="text" class="text_input" id="CEP" name="CEP">

													<label for="tel">Telefone:</label>
													<input type="text" class="text_input" id="tel" name="tel">

													<label for="email">Email:</label>
													<input type="email" class="text_input" id="email" name="email">

													<input type="submit" value="Enviar" />
												</div>
											</form>
									</div>
								</li>
							</ul>
						</div>
						
						<?php include 'inc/tratamentos.php' ?>
					</div>
				</div>
			</div>
			<?php include 'inc/footer.php'; ?>
		</div>
	</body>
</html>