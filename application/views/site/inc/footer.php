				<div class="footer_container">
				<div class="footer">
					<?php 
						if(!isset($remover_tratamento)){
					?>
							<h3 class="box_header page_margin_top_section galeria">
								Conheça nossos tratamentos
							</h3>
							<ul class="gallery footer_banner_box_container clearfix">
								<li class="gallery_box">
									<img src="assets/images/content/inseminacao-artificial.jpg" alt="" />
									<div class="description">
										<h3>
											Inseminação Artificial
										</h3>
									</div>
									<ul class="controls">
										<li>
											<a href="inseminacaoartificial" class="open_details"></a>
										</li>
									</ul>
								</li>
								<li class="gallery_box">
									<img src="assets/images/content/fertilizacao-in-vitro.jpg" alt="" />
									<div class="description">
										<h3>
											Fertilização In Vitro
										</h3>
									</div>
									<ul class="controls">
										<li>
											<a href="fertilizacaoinvitro" class="open_details"></a>
										</li>
									</ul>
								</li>
								<li class="gallery_box">
									<img src="assets/images/content/ovodoacao.jpg" alt="" />
									<div class="description">
										<h3>
											Ovodoação
										</h3>
									</div>
									<ul class="controls">
										<li>
											<a href="ovodoacao" class="open_details"></a>
										</li>
									</ul>
								</li>
								<li class="gallery_box">
									<img src="assets/images/content/congelamento-ovulos.jpg" alt="" />
									<div class="description">
										<h3>
											Congelamento de Óvulos
										</h3>
									</div>
									<ul class="controls">
										<li>
											<a href="congelamentoovulos" class="open_details"></a>
										</li>
									</ul>
								</li>
							</ul>
					<?php  
						}
					?>
					<div class="footer_box_container contact clearfix" <?php echo (isset($remover_tratamento)) ? "style='margin-top:20px;'" : ''; ?>>
						<div class="footer_box">
							<h3 class="box_header">
								Localização
							</h3>
							<p class="info">
								Av. Brasil, 583 - Jardim América<br />
								01431-000 São Paulo / SP <br />
								Tel.: 55 (11) 3051-2313
							</p>
						</div>
						<div class="footer_box newsletter">
							<div class="clearfix">
								<h3 class="box_header">
									Newsletter
								</h3>
								<p>
									Preencha com nome e e-mail e receba novidades, descontos e informações.
								</p>
								<div class="footer_box">
									<form action="contato/newsletter" method="POST" class="newsletter_form" id="newsletter_form">
										<input type="email" name="email" required="required">
										<input type="submit" value="Enviar" name="submit">
									</form>
									<div class="message-newsletter" id="message-newsletter"></div>
								</div>
							</div>
							
						</div>
						<div class="footer_box last">
							<div class="clearfix">
								<h3 class="box_header">
									Redes Sociais
								</h3>
							</div>
							<div class="footer_box">
								<ul class="social_icons clearfix">
									<li>
										<a class="social_icon facebook" href="https://www.facebook.com/doutorvicente" title="" target="_blank">
											<span>/embryofetus</span>
										</a>
									</li>
									<li>
										<a class="social_icon twitter" href="https://twitter.com/doutorvicente" title="" target="_blank">
											<span>@doutorvicente</span>
										</a>
									</li>
									<li>
										<a class="social_icon instagram" href="https://www.instagram.com/drvicenteghilardi/" title="" target="_blank">
											<span>/drvicenteghilardi</span>
										</a>
									</li>
									<li>
										<a class="social_icon youtube" href="https://www.youtube.com/channel/UC_lR_Le7sIW8JEM-Q1SFumg" title="" target="_blank">
											<span>/embryofetus</span>
										</a>
									</li>
									<li>
										<a class="social_icon blogger" href="http://doutorvicente.wix.com/blog" title="" target="_blank">
											<span>/blog</span>
										</a>
									</li>
									<li>
										<a class="social_icon linkedin" href="http://www.linkedin.com/in/vicente-ghilardi-a7b30941" title="" target="_blank">
											<span>/linkedin</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="footer_box_container disclaimer clearfix">
						© 2017 por Vicente Ghilardi. As informações contidas nesse site têm caráter informativo e educacional. O seu conteúdo jamais deverá ser utilizado para auto-diagnóstico, auto-tratamento e auto-medicação. Em caso de dúvida, o profissional médico deverá ser consultado, pois somente ele está habilitado para praticar o ato médico, conforme recomendação do CONSELHO FEDERAL DE MEDICINA.
					</div>
					<div class="copyright_area clearfix">
						<div class="copyright_left">
							Todos os direitos reservado © Embryo Fetus - <?= gmdate("Y") ?> - Reprodução Humana Medicina Fetal - Dr. Vicente Ghilardi - CRM 79654 - by <a href="http://www.vioti.com.br" title="Vioti Comunicação" target="_blank">Vioti</a>
						</div>
						<div class="copyright_right">
							<a class="scroll_top icon_small_arrow top_white" href="#top" title="Scroll to top">Topo</a>
						</div>
					</div>
				</div>
			</div>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=321916167895471";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
