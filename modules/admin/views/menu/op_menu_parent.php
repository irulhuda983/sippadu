<div class="form-group">
	<label for="" class="col-sm-2 control-label">Parent</label>
	<div class="col-sm-5"><?php echo level_menu_dropdown('op_parent',ifnull($selected,0),'class="form-control chosen-select"',ifnull($except,0),ifnull($category,0)); ?></div>
</div> 