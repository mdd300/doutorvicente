<?php $messages = $this->session->flashdata('messages'); ?>
<?php $errors = $this->session->flashdata('errors'); ?>
<?php $avisos = $this->session->flashdata('avisos'); ?>
<?php if ($messages || $errors || $avisos){ ?>
<div class="pad20" id="box_msg">
    <?php if($messages){ ?>
	<div id="messages" class="message success close">
		<h2><?php echo $messages ?></h2>
	</div>
    <?php } ?>
    <?php if($avisos){ ?>
	<div id="avisos" class="message warning close">
		<h2><?php echo $avisos ?></h2>
	</div>
    <?php } ?>
    <?php if($errors){ ?>
	<div class="message error close">
		<h2><?php echo $errors ?></h2>
	</div>
    <?php } ?>
</div>
<script type="text/javascript">
    setTimeout(function(){ $("#box_msg").slideUp() }, 5000);
</script>
<?php
}
?>
<hr />