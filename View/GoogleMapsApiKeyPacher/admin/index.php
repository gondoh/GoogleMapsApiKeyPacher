<?php echo $this->BcForm->create('SiteConfig') ?>

<!-- form -->
<div class="section">
	<table cellpadding="0" cellspacing="0" class="form-table">
		<tr>
			<th class="col-head"><?php echo $this->BcForm->label('GoogleMapsApiKeyPacher.key', 'クライアントID') ?></th>
			<td class="col-input">
				<?php echo $this->BcForm->input('GoogleMapsApiKeyPacher.key', array('type' => 'text', 'size' => 40, 'class' => 'full-width')) ?>
				<?php echo $this->BcForm->error('Page.title') ?>
			</td>
		</tr>
	</table>
</div>

<div class="submit">
	<?php echo $this->BcForm->button('保存', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
</div>

<?php echo $this->BcForm->end(); ?>
