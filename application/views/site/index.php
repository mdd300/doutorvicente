<!DOCTYPE html>
<html>
	<?php include 'inc/head.php' ?>
	<body>
		<div class="site_container">
			<?php include 'inc/header.php' ?>
			<!-- slider -->
			<ul class="slider">
				<?php foreach ($banners as $key => $banner): ?>
					<li style="background-image: url('assets/uploads/banners/<?= $banner->path ?>');">
						&nbsp;
					</li>
				<?php endforeach ?>
			</ul>
			<div class="page relative noborder">
				<div class="slider_content_box clearfix">
					<?php foreach ($banners as $key => $banner): ?>
						<div class="slider_content">
							<h1 class="title">
								<?= $banner->titulo1 ?><br />
								<?= $banner->titulo2 ?>
							</h1>
						</div>
					<?php endforeach ?>
				</div>
				<!-- home box -->
				<ul class="home_box_container clearfix">
					<?php
						$menu_reproducao = array(0 => 'Reprodução Humana/Sistema Reprodutivo Masculino/reproducao_humana/sistemareprodutivomasculino',
									  			 1 => 'Reprodução Humana/Sistema Reprodutivo Feminino/reproducao_humana/sistemareprodutivofeminino',
									  			 2 => 'Reprodução Humana/Infertilidade Masculina/reproducao_humana/infertilidademasculina',
									  			 3 => 'Reprodução Humana/Infertilidade Feminina/reproducao_humana/infertilidadefeminina',
									  			 4 => 'Reprodução Humana/Avaliação Básica de Infertilidade/reproducao_humana/avaliacaobasicainfertilidade',
									  			 5 => 'Reprodução Humana/Quando Procurar um Especialista/reproducao_humana/quandoprocurarespecialista'
											);	  
						shuffle($menu_reproducao);
						$menu_tratamentos = array(0 => 'Tratamentos/Inseminação Artificial/tratamentos/inseminacaoartificial',
									  			  1 => 'Tratamentos/Fertilização In Vitro (FIV)/tratamentos/fertilizacaoinvitro',
									  			  2 => 'Tratamentos/Injeção Intracitoplasmática de Espermatozóides/tratamentos/icsi',
									  			  3 => 'Tratamentos/Diagnóstico Genético Pré-Implantacional (PGD)/tratamentos/diagnosticogenericopreimplantacional',
									  			  4 => 'Tratamentos/Ovodoação/tratamentos/ovodoacao',
									  			  5 => 'Tratamentos/Congelamento de Óvulos/tratamentos/congelamentoovulos'
									  		);
						shuffle($menu_tratamentos);
						$menu_tecnicas = array(0 => 'Técnicas Complementares/Biópsia Testicular (Micro-TESE)/biopsiatesticular',
									  		   1 => 'Técnicas Complementares/Aspiração de Testiculos e Epidídimos/aspiracaotesticulos',
									  		   2 => 'Técnicas Complementares/Assisted Hatching/assistedhatching',
									  		   3 => 'Técnicas Complementares/Congelamento de Embriões/congelamentoembrioes'
									  		);
						shuffle($menu_tecnicas);

						$item_reproducao = array_shift($menu_reproducao);
						$item_tratamentos = array_shift($menu_tratamentos);
						$item_tecnicas = array_shift($menu_tecnicas);

						$items = array($item_reproducao, $item_tratamentos, $item_tecnicas);

						foreach ($items as $key => $item) {
							$menu_item = explode('/',$item);
					?>
							<li class="home_box light_blue">
								<h2>
									<?php
										if(isset($menu_item[3])){
									?>
											<a href="<?php echo $menu_item[2]; ?>" title="<?php echo $menu_item[0]; ?>">
												<?php echo $menu_item[0]; ?>
											</a>
									<?php
										}else{
											echo $menu_item[0];
										}
									?>
								</h2>
								<div class="news purple clearfix">
									<?php
										if(isset($menu_item[3])){
									?>
											<a href="<?php echo $menu_item[3]; ?>" class="icon_small_arrow margin_right_white submenu-item-purple" title="<?php echo $menu_item[1]; ?>">
												<?php echo $menu_item[1]; ?>
											</a>
									<?php
										}else{
									?>
											<a href="<?php echo $menu_item[2]; ?>" class="icon_small_arrow margin_right_white submenu-item-purple" title="<?php echo $menu_item[1]; ?>">
												<?php echo $menu_item[1]; ?>
											</a>
									<?php
										}
									?>
								</div>
							</li>					
					<?php
						}
					?>
				</ul>
				<div class="page_layout page_margin_top clearfix">
					<div class="page_left">
						<h3 class="box_header">
							Últimas Notícias
						</h3>
						<div class="columns clearfix">
							<?php foreach ($noticias as $key => $noticia): ?>
								<ul class="blog <?php echo $key == 0 ? 'column_left' : 'column_right' ?> ">
									<li class="post">
										<ul class="comment_box clearfix">
											<li class="date">
												<div class="value"><?= format_data_mysql($noticia->data_publicacao); ?></div>
												<div class="arrow_date"></div>
											</li>
										</ul>
										<div class="post_content">
											<a class="post_image" href="noticias/load/<?= $noticia->noticiaID ?>" title="<?= $noticia->legenda ?>">
												<img src="assets/uploads/noticias/<?= $noticia->imagem ?>" alt="<?= $noticia->titulo ?>" />
											</a>
											<h2>
												<a href="noticias/load/<?= $noticia->noticiaID ?>" title="<?= $noticia->titulo ?>">
													<?= $noticia->titulo ?>
												</a>
											</h2>
											<p>
												<?= $noticia->resumo; ?>
											</p>
										</div>
									</li>
								</ul>
							<?php endforeach ?>
						</div>
						<div class="show_all clearfix">
							<a class="more" href="noticias" title="Ver todas">
								Ver todas &rarr;
							</a>
						</div>
						<div class="columns clearfix home-video">
							<h3 class="box_header videos">
								Galeria de Vídeos
							</h3>
							<?php
								$videos = array(
											0 => '//www.youtube.com/embed/UugttuKPWI0?rel=0',
											1 => '//www.youtube.com/embed/VxkRHDvETto?rel=0',
											2 => '//www.youtube.com/embed/tKRHcIio5oU?rel=0',
											3 => '//www.youtube.com/embed/CD_f9Gx9qZ4?rel=0',
											4 => '//www.youtube.com/embed/z7L0dC0eaS8?rel=0',
											5 => '//www.youtube.com/embed/J-f16hvDCmw?rel=0',
											6 => '//www.youtube.com/embed/mk-_Jf9-ZhM?rel=0',
											7 => '//www.youtube.com/embed/9B7UPiBy6kI?rel=0',
											8 => '//www.youtube.com/embed/n_Xez9Ngto4?rel=0',
											9 => "//www.youtube.com/embed/kaGi-s4UEy0?rel=0",
											10 => "//www.youtube.com/embed/XJ5Koug9Dto?rel=0",
											11 => "//www.youtube.com/embed/YFUO2B31egk?rel=0",
											12 => "//www.youtube.com/embed/g4crHfMSYFA?rel=0",
											13 => "//www.youtube.com/embed/72rrSLxM57Q?rel=0",
											14 => "//www.youtube.com/embed/C6a8KhfQVl8?rel=0",
											15 => "//www.youtube.com/embed/vpWcdBqUqH4?rel=0",
											16 => "//www.youtube.com/embed/UJj1o2qyGEs?rel=0",
											17 => "//www.youtube.com/embed/L16Ru8j1d1k?rel=0",
											18 => "//www.youtube.com/embed/Y4brFwZlJSA?rel=0",
											19 => "//www.youtube.com/embed/bTd0nscA_vY?rel=0",
											20 => "//www.youtube.com/embed/n-JJJQJhr2k?rel=0",
											21 => "//www.youtube.com/embed/FNkheYxZkgM?rel=0"
										  );
								shuffle($videos);

								$videos = array_slice($videos, 0, 2);

								foreach ($videos as $key => $video) {
							?>
									<div class="<?php echo ($key == 0) ? "column_left" : "column_right"; ?>">
										<iframe style="width:100%;" height="315" src="<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
									</div>
							<?php
								}
							?>
						</div>
						<div class="show_all clearfix">
							<a class="more" href="videos" title="Ver todos os vídeos">
								Ver todos os vídeos &rarr;
							</a>
						</div>
					</div>
					<div class="page_right facebook">
						<div class="sidebar_box first">
							<div class="fb-like-box" data-href="https://www.facebook.com/doutorvicente" data-width="330" data-height="540" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
							<div class="clearfix"></div>
							<ul class="accordion ui-accordion ui-widget ui-helper-reset" role="tablist">
								<li>
									<div id="accordion-icsi" class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-header-active ui-state-active ui-corner-top ui-accordion-icons" role="tab" aria-controls="ui-accordion-1-panel-0" aria-selected="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>
										<h3>ICSI</h3>
									</div>
									<div class="clearfix ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" id="ui-accordion-1-panel-0" aria-labelledby="accordion-icsi" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
										<div class="item_content clearfix">
											<p>
												Injeção Intracitoplasmática de Espermatozóides (ICSI) <br>
												Há cerca de 20 anos uma colaboração entre Steptoe, um ginecologista, e Edwards, um fisiologista, resultou no nascimento do primeiro bebê após a fertilização "in vitro" com transferência de embriões ( FIV-TE ). 
											</p>
										</div>
										<div class="item_footer clearfix">
											<a class="more blue icon_small_arrow margin_right_white" href="icsi" title="Details">Saiba Mais</a>
										</div>
									</div>
								</li>
								<li>
									<div id="accordion-infertilidade-feminina" class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" aria-controls="ui-accordion-1-panel-1" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
										<h3>Infertilidade Feminina</h3>
									</div>
									<div class="clearfix ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-1" aria-labelledby="accordion-infertilidade-feminina" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
										<div class="item_content clearfix">
											<p>
												O decréscimo da fertilidade com o passar do tempo é um fato biológico. A diminuição das chances de engravidar ocorre em consequência das mudanças normais que acompanham o envelhecimento
											</p>
										</div>
										<div class="item_footer clearfix">
											<a class="more blue icon_small_arrow margin_right_white" href="infertilidadefeminina" title="Details">Saiba Mais</a>
										</div>
									</div>
								</li>
								<li>
									<div id="accordion-infertilidademasculina" class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" aria-controls="ui-accordion-1-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
										<h3>Infertilidade Masculina</h3>
									</div>
									<div class="clearfix ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-2" aria-labelledby="accordion-infertilidademasculina" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
										<div class="item_content clearfix">
											<p>
												Quando atingem as vesículas seminais ou a próstata - as glândulas responsáveis pela produção do líquido seminal
											</p>
										</div>
										<div class="item_footer clearfix">
											<a class="more blue icon_small_arrow margin_right_white" href="infertilidademasculina" title="Details">Saiba Mais</a>
										</div>
									</div>
								</li>
								<li>
									<div id="accordion-quero_ser_doadora" class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" aria-controls="ui-accordion-1-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
										<h3>Quero ser Doadora</h3>
									</div>
									<div class="clearfix ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-2" aria-labelledby="accordion-quero_ser_doadora" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
										<div class="item_content clearfix">
											<p>
												Para ser doadora é necessário ter menos de 35 anos, ser saudável e apresentar boa resposta aos medicamentos indutores de ovulação. Ainda há necessidade de fazer uma consulta médica para se cadastrar e receber as devidas orientações.
											</p>
										</div>
										<div class="item_footer clearfix">
											<a class="more blue icon_small_arrow margin_right_white" href="queroserdoadora" title="Details">Saiba Mais</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include 'inc/footer.php'; ?>
		</div>
	</body>
</html>