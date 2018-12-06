		<div class="header_container">
				<div class="header clearfix">
					<div class="header_left">
						<a href="home" title="Dr. Vicente Ghilardi">
							<img src="assets/images/header_logo.png" alt="logo" />
						</a>
					</div>
					<div class="destak_right">
						<ul class="home_box_container clearfix">
							<li class="home_box light_blue">
								<h2>
									<a class="fancybox open_lightbox" href="#agende-consulta" >
										Agende uma consulta
									</a>
								</h2>
								
								<div class="hide-content">
									<div id="agende-consulta" class="contact_form">
										<p class="text">
											Para agendar uma consulta para o tratamento que tem interesse, preencha os campos abaixo com seus dados e aguarde o contato e a confirmação da data.
										</p>
										<form class="contact_form" id="appointment_form" method="post" action="contato/send_appointment">
											<ul class="clearfix tabs_box_navigation sf-menu">
												<li class="tabs_box_navigation_selected submenu wide">
													<input type="hidden" name="shift" value="" />
													<span>Preferência de atendimento</span>
													<ul>
														<li>
															<a href="#morning" title="Manhã">
																Manhã
															</a>
														</li>
														<li>
															<a href="#afternoon" title="Tarde">
																Tarde
															</a>
														</li>
													</ul>
												</li>
											</ul>
											<fieldset class="left">
												<label>Nome</label>
												<div class="block">
													<input class="text_input" name="name" type="text" value="" />
												</div>
											</fieldset>

											<fieldset class="left">
												<label>Email</label>
												<div class="block">
													<input class="text_input" name="email" type="email" value="" />
												</div>
											</fieldset>

											<fieldset class="left">
												<label>Telefone</label>
												<div class="block">
													<input class="text_input" name="telephone" type="text" value="" />
												</div>
											</fieldset>

											<fieldset class="left checkbox">
												<div class="block">
												    <label for="opt_in">
												        <input type="checkbox" name="opt_in" id="opt_in"> Desejo receber os informativos da Embryo Fetus
												    </label>
												</div>
											</fieldset>
											<input type="submit" name="submit" value="Enviar" class="more blue" />
										</form>
									</div>
								</div>
								
							<li class="home_box blue">
								<h2>
									<a class="fancybox open_lightbox" href="#ligamos-voce" >
										Nós ligamos para você
									</a>
								</h2>
								<div class="hide-content">
									<p class="text">
										Caso prefira o atendimento telefônico, nós ligamos para você. Para receber um telefonema de nossos atendentes, preencha os campos abaixo com...
									</p>
									<div id="ligamos-voce" class="contact_form">
										<p>
											Caso prefira o atendimento telefônico, nós ligamos para você. <br>Para receber um telefonema de nossos atendentes, insira seu telefone e aguarde o contato.
										</p>
										<form class="contact_form" id="telephone_form" method="post" action="contato/send_telephone">
											<fieldset class="left">
												<label>Nome</label>
												<div class="block">
													<input class="text_input" name="name" type="text" value="" />
												</div>
												<label>E-mail</label>
												<div class="block">
													<input class="text_input" name="email" type="email" value="" />
												</div>
												<label>Cidade</label>
												<div class="block">
													<input class="text_input" name="city" type="text" value="" />
												</div>
												<label>Telefone</label>
												<div class="block">
													<input class="text_input" name="telephone" type="text" value="" />
												</div>
											</fieldset>
											<fieldset class="left checkbox">
												<div class="block">
												    <label for="opt_in">
												        <input type="checkbox" name="opt_in" id="opt_in"> Desejo receber os informativos da Embryo Fetus
												    </label>
												</div>
											</fieldset>
											<input type="submit" name="submit" value="Enviar" class="more blue" />
										</form>
									</div>
								</div>
							</li>
						</ul>
						<ul class="social_icons clearfix">
							<li>
								<a class="social_icon facebook" href="https://www.facebook.com/doutorvicente" title="" target="_blank">
								</a>
							</li>
							<li>
								<a class="social_icon twitter" href="https://twitter.com/doutorvicente" title="" target="_blank">
								</a>
							</li>
							<li>
								<a class="social_icon instagram" href="https://www.instagram.com/drvicenteghilardi/" title="" target="_blank">
								</a>
							</li>
							<li>
								<a class="social_icon youtube" href="https://www.youtube.com/channel/UC_lR_Le7sIW8JEM-Q1SFumg" title="" target="_blank">
								</a>
							</li>
							<li>
								<a class="social_icon blogger" href="http://doutorvicente.wix.com/blog" title="" target="_blank">
								</a>
							</li>
							<li>
								<a class="social_icon linkedin" href="http://www.linkedin.com/in/vicente-ghilardi-a7b30941" title="" target="_blank">
								</a>
							</li>
						</ul>
					</div>
					<ul class="sf-menu header_left">
						<li class="submenu">
							<a title="A Clínica">
								A Clínica
							</a>
							<ul>
								<li><a href="aclinica">Conheça a Clínica</a></li>
								<li><a href="equipe">Equipe</a></li>
							</ul>
						</li>
						<li>
							<a href="outrasclinicas" title="Outras Clínicas">
								Outras Clínicas
							</a>
						</li>
						<li class="submenu">
							<a href="reproducao_humana" title="Tratamentos">
								Reprodução Humana
							</a>
							<ul>
								<li>
									<a>Sistema Reprodutivo</a>
									<ul class="wide">
										<li>
											<a href="sistemareprodutivomasculino">Masculino</a>
										</li>
										<li>
											<a href="sistemareprodutivofeminino">Feminino</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="infertilidade">Infertilidade</a>
									<ul class="wide">
										<li>
											<a href="infertilidademasculina">Masculina</a>
										</li>
										<li>
											<a href="infertilidadefeminina">Feminina</a>
										</li>
									</ul>
								</li>
								<li><a href="avaliacaobasicainfertilidade">Avaliação Básica de Infertilidade</a></li>
								<li><a href="quandoprocurarespecialista">Quando Procurar um Especialista</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="tratamentos" title="tratamentos">
								Tratamentos
							</a>
							<ul>
								<li><a href="inseminacaoartificial">Inseminação Artificial</a></li>
								<li><a href="fertilizacaoinvitro">Fertilização In Vitro (FIV)</a></li>
								<li><a href="icsi">Injeção Intracitoplasmática de Espermatozóides</a></li>
								<li><a href="diagnosticogenericopreimplantacional">Diagnóstico Genético Pré-Implantacional (PGD)</a></li>
								<li><a href="ovodoacao">Ovodoação</a></li>
								<li><a href="congelamentoovulos">Congelamento de Óvulos</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a title="Imprensa">
								Técnicas Complementares
							</a>
							<ul>
								<li><a href="biopsiatesticular">Biópsia Testicular (Micro-TESE)</a></li>
								<li><a href="aspiracaotesticulos">Aspiração de Testiculos e Epidídimos</a></li>
								<li><a href="assistedhatching">Assisted Hatching</a></li>
								<li><a href="congelamentoembrioes">Congelamento de Embriões</a></li>
							</ul>
						</li>
						<li>
							<a href="videos" title="Vídeos">
								Vídeos
							</a>
						</li>
						<li>
							<a href="contato" title="Contato">
								Contato
							</a>
						</li>
					</ul>
					<div class="mobile_menu">
						<select>
							<option value="" selected="selected">Menu</option>
							<option value="">A Clínica</option>
							<option value="aclinica">- A Clínica</option>
							<option value="equipe">- Equipe</option>
							<option value="outrasclinicas">Outras Clínicas</option>
							<option value="reproducao_humana">Reprodução Humana</option>
							<option value="sistemareprodutivomasculino">- Sistema Reprodutivo Masculino</option>
							<option value="sistemareprodutivofeminino">- Sistema Reprodutivo Feminino</option>
							<option value="infertilidade">- Infertilidade</option>
							<option value="infertilidademasculina">-- Masculina</option>
							<option value="infertilidadefeminina">-- Feminina</option>
							<option value="avaliacaobasicainfertilidade">- Avaliação Básica de Infertilidade</option>
							<option value="quandoprocurarespecialista">- Quando Procurar um Especialista</option>
							<option value="tratamentos">Tratamentos</option>
							<option value="inseminacaoartificial">- Inseminação Artificial</option>
							<option value="fertilizacaoinvitro">- Fertilização In Vitro (FIV)</option>
							<option value="icsi">- Injeção Intracitoplasmática de Espermatozóides</option>
							<option value="diagnosticogenericopreimplantacional">- Diagnóstico Genético Pré-Implantacional (PGD)</option>
							<option value="ovodoacao">- Ovodoação</option>
							<option value="congelamentoovulos">- Congelamento de Óvulos</option>
							<option value="">Técnicas Complementares</option>
							<option value="biopsiatesticular">- Biópsia Testicular (Micro-TESE)</option>
							<option value="aspiracaotesticulos">- Aspiração de Testiculos e Epidídimos</option>
							<option value="assistedhatching">- Assisted Hatching</option>
							<option value="congelamentoembrioes">- Congelamento de Embriões</option>
							<option value="videos">Vídeos</option>
							<option value="contato">Contato</option>
						</select>
					</div>
				</div>
			</div>
                        <script>
                        //form ajax
                        $('#appointment_form').submit(function (event) {
                            var form = $(this);

                            var sendButton = $('#appointment_form input[type="submit"]');

                            var virtualPage = 'success-appointment-' + document.location.pathname.split('/').pop();
                            if(virtualPage === '') {
                                virtualPage = 'success-appointment-home'
                            }
                            sendButton.attr('disabled', true);
                            sendButton.val('Enviando...');

                            $.ajax({
                            type: "POST",
                                url: form[0].action,
                                data: form.serialize(),
                                dataType: 'JSON',
                                success: function (retorno) {
                                    sendButton.val(retorno.message);

                                    if(retorno.status == false){
                                        sendButton.removeAttr("disabled");
                                    }else{
                                        gtag('config', 'UA-107013908-1', {'page_path': virtualPage});
                                        form[0].reset();
                                    }
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    $('.msg-ajax').html('Tivemos um problema no envio, tente novamente mais tarde.');
                                    $('.msg-ajax').addClass('alert-danger');
                                }
                            });

                            event.preventDefault();
                        });

                        $('#telephone_form').submit(function (event) {
                            var form = $(this);

                            var sendButton = $('#telephone_form input[type="submit"]');

                            var virtualPage = 'success-phone-' + document.location.pathname.split('/').pop();
                            if(virtualPage === '') {
                                virtualPage = 'success-phone-home'
                            }

                            sendButton.attr('disabled', true);
                            sendButton.val('Enviando...');

                            $.ajax({
                            type: "POST",
                                url: form[0].action,
                                data: form.serialize(),
                                dataType: 'JSON',
                                success: function (retorno) {
                                    sendButton.val(retorno.message);

                                    if(retorno.status == false){
                                        sendButton.removeAttr("disabled");
                                    }else{
                                        gtag('config', 'UA-107013908-1', {'page_path': virtualPage});
                                        form[0].reset();
                                    }
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    $('.msg-ajax').html('Tivemos um problema no envio, tente novamente mais tarde.');
                                    $('.msg-ajax').addClass('alert-danger');
                                }
                            });

                            event.preventDefault();
                        });
                        </script>
