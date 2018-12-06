<!DOCTYPE html>
<html>
	<?php include 'inc/head.php' ?>
	<body>
		<div class="site_container">
			<div class="header_container">
				<?php include 'inc/header.php' ?>
			</div>
			<div class="page relative">
				<div class="page_layout page_margin_top clearfix">
					<div class="page_header clearfix">
						<div class="page_header_left">
							<h1 class="page_title">Notícias</h1>
						</div>
					</div>
					<div class="page_left">
						<ul class="blog clearfix">
							<li class="post">
								<ul class="comment_box">
									<li class="date clearfix">
										<div class="value"><?= format_data_mysql($noticia->data_publicacao); ?></div>
										<div class="arrow_date"></div>
									</li>
								</ul>
								<div class="post_content">
									<a class="post_image" title="<?= $noticia->titulo; ?>">
										<img src="assets/uploads/noticias/<?= $noticia->imagem; ?>" alt="" />
									</a>
									<h2>
										<a title="<?= $noticia->titulo; ?>">
											<?= $noticia->titulo ?>
										</a>
									</h2>
									<p>
										<?= $noticia->descricao ?>
									</p>
								</div>
							</li>
						</ul>
						<!--
						<ul class="pagination page_margin_top">
							<li class="selected">
								<a href="#" title="">
									1
								</a>
							</li>
							<li>
								<a href="#" title="">
									2
								</a>
							</li>
							<li>
								<a href="#" title="">
									3
								</a>
							</li>
						</ul>
						-->
					</div>
					
				</div>
			</div>
			<?php include 'inc/footer.php'; ?>
		</div>
	</body>
</html>