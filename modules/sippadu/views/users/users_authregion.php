<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('head'); ?>
</head>
<body>
    
    <?php $this->load->view('menu'); ?>
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <?php $this->load->view('breadcrumb'); ?>
                        
			<?php $this->load->view('top'); ?>
            
            
        </div>
        <div class="workplace">
            <?php echo alert(); ?>                        
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-lock"></div>
                        <h1><?php echo $title; ?></h1>  
                    </div>
					<?php echo form_open('',array('id'=>'frm','name'=>'frm')); ?>
                    <div class="block-fluid">
						<div class="row-form clearfix">
                            <div class="span3">Pilih User</div>
							<div class="span3"><?php echo form_dropdown('op_user',$op_users,set_value('op_user',$slc_op_users),'class="chosen-select" style="width:100%"'); ?></div>
                        </div>
						
						<div class="row-form clearfix">
                            <div class="span3"></div>
							<div class="span3"><?php echo form_submit('refresh','Refresh','class="btn"'); ?></div>
                        </div>
						<?php if($slc_op_users > 0){ ?>
						<div class="row-form clearfix">
							<div class="span3">Region Level:</div>
							<div class="span3"><?php echo form_dropdown('op_region',$op_region,set_value('op_region',$slc_op_region),'id="op_region" class="chosen-select" style="width:100%"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="snegara" style="display:none;">
							<div class="span3">Pilih Negara:</div>
							<div class="span3"><?php echo form_dropdown('op_negara[]',$op_negara,set_value('op_negara',$slc_op_negara),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="sprovinsi" style="display:none;">
							<div class="span3">Pilih Provinsi:</div>
							<div class="span3"><?php echo form_dropdown('op_provinsi[]',$op_provinsi,set_value('op_provinsi',$slc_op_provinsi),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="skabupaten" style="display:none;">
							<div class="span3">Pilih Kabupaten:</div>
							<div class="span3"><?php echo form_dropdown('op_kabupaten[]',$op_kabupaten,set_value('op_kabupaten',$slc_op_kabupaten),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="skecamatan" style="display:none;">
							<div class="span3">Pilih Kecamatan:</div>
							<div class="span3"><?php echo form_dropdown('op_kecamatan[]',$op_kecamatan,set_value('op_kecamatan',$slc_op_kecamatan),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="sdesa" style="display:none;">
							<div class="span3">Pilih Desa:</div>
							<div class="span3"><?php echo form_dropdown('op_desa[]',$op_desa,set_value('op_desa',$slc_op_desa),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div>   
						<div class="row-form clearfix" id="sdusun" style="display:none;">
							<div class="span3">Pilih Dusun:</div>
							<div class="span3"><?php echo form_dropdown('op_dusun[]',$op_dusun,set_value('op_dusun',$slc_op_dusun),'class="chosen-select" style="width:100%" multiple="multiple"'); ?></div>
						</div> 
						<div class="row-form clearfix" >
							<div class="span3"></div>
							<div class="span3"><?php echo form_submit('submit','Simpan','class="btn"'); ?></div>
						</div> 
						<?php } ?>
                    </div>
					<?php echo form_close(); ?>
                </div>
            </div>
                        
            <div class="dr"><span></span></div>
        
        </div>
        
    </div>   
    <script type="text/javascript">
		
			var id = "<?php echo $slc_op_region; ?>";
			switch(id){
				case "1":
					$("#snegara").show();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "2":
					$("#snegara").hide();
					$("#sprovinsi").show();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "3":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").show();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "4":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").show();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "5":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").show();
					$("#sdusun").hide();
					break;
				case "6":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").show();
					break;
			}
	    
		
	  	$("#op_region").change(function(){
			var id = $("#op_region").val();
			switch(id){
				case "1":
					$("#snegara").show();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "2":
					$("#snegara").hide();
					$("#sprovinsi").show();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "3":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").show();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "4":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").show();
					$("#sdesa").hide();
					$("#sdusun").hide();
					break;
				case "5":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").show();
					$("#sdusun").hide();
					break;
				case "6":
					$("#snegara").hide();
					$("#sprovinsi").hide();
					$("#skabupaten").hide();
					$("#skecamatan").hide();
					$("#sdesa").hide();
					$("#sdusun").show();
					break;
			}
	    });
	</script>
</body>
</html>
