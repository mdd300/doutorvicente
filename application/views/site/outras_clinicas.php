<!DOCTYPE html>
<html>
	<?php include 'inc/head.php' ?>
	<body>
		<div class="site_container">
			<?php include 'inc/header.php' ?>
			<div class="page relative">
				<div class="page_layout page_margin_top clearfix">
					<div class="page_header clearfix">
						<div class="page_header_left">
							<h1 class="page_title"><?php echo $outras_clinicas->titulo; ?></h1>
						</div>
					</div>
					<div class="clearfix">
						
						<div class="gallery_item_details clearfix">
							<div class="columns no_width">
								<div class="">
									<div class="gallery_item_details_list clearfix page_margin_top">
										<?php echo $outras_clinicas->descricao; ?>
									</div>
								</div>
							</div>
						</div>						
						
						<?php include 'inc/tratamentos.php' ?>

					</div>
				</div>
			</div>
			<?php include 'inc/footer.php'; ?>
		</div>
	</body>
</html>