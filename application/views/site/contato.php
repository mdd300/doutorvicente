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
							<h1 class="page_title">Contato</h1>
						</div>
					</div>
					<div class="clearfix">
						<div class="contact_map page_margin_top html" id="map">
						</div>
						<div class="page_margin_top clearfix">
							<div class="page_left">
								<form class="contact_form" id="contact_form" method="post" action="contato/send_contact">
									<fieldset class="left">
										<label>Nome</label>
										<div class="block">
											<input class="text_input" name="name" type="text" value="" required />
										</div>
									</fieldset>
									<fieldset class="left">
										<label>E-mail</label>
										<div class="block">
											<input class="text_input" name="email" type="text" value="" required />
										</div>
									</fieldset>
									<fieldset class="left">
										<label>Telefone</label>
										<div class="block">
											<input class="text_input" name="telephone" type="text" value=""/>
										</div>
									</fieldset>
									<fieldset class="left">
										<label>Mensagem</label>
										<div class="block">
											<textarea name="message"></textarea>
										</div>
									</fieldset>
									<fieldset class="left checkbox">
										<div class="block">
										    <label for="opt_in">
										        <input type="checkbox" name="opt_in" id="opt_in"> Desejo receber os informativos da Embryo Fetus
										    </label>
										</div>
									</fieldset>
									<fieldset class="left contact-submit">
										<div class="block">
											<input type="submit" name="submit" value="Enviar" class="more blue" required />
										</div>
									</fieldset>
								</form>
							</div>
							<div class="page_right">
								<h3 class="box_header">
									EMBRYO FETUS
								</h3>
								<ul class="contact_data page_margin_top">
									<li>
										Av. Brasil, 583 Jd. América – São Paulo – SP<br />
									</li>
									<li>
										CEP: 01431-000<br />
									</li>
									<li>
										Tel.: 55 (11) 3051-2313<br />
									</li>
								</ul>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include 'inc/footer.php'; ?>
                        <script>
                        //form ajax
                        $('#contact_form').submit(function (event) {
                            var form = $(this);
                            var sendButton = $('#contact_form input[type="submit"]');

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
                                        gtag('config', 'UA-107013908-1', {'page_path': 'success-contato'});
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
		</div>
	</body>
</html>
