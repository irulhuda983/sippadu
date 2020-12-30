
				</td>
			</tr>
		</table>
		
		<table width="964" align="center" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td height="22" align="right" valign="middle" style="border-radius:5px; box-shadow: 0 0 3px rgba(0, 0, 0, .5); font-family:Questrial;" bgcolor="#034B7A" class="style15">&copy;2017 SIPPADU - System Layanan Perijinan Terpadu Bojonegoro&nbsp;</td>
			</tr>
		</table>
		
		<script src="<?php echo base_url(); ?>themes/<?php echo config('theme'); ?>/js/jquery.min.js"></script>
		<script>
		
		$(document).ready(function() {
			$('#delete').click(function(){
				$('<input />').attr('type','hidden').attr('name','delete').attr('value','1').appendTo('#form');
				$('#form').submit(); 
			 });
			 
			$(function() {
				$('.upper').keyup(function() {
					this.value = this.value.toLocaleUpperCase();
				});
			});
			
			
			$('.autonumber').keyup(function(){
				var separator = ".";
				a = this.value;
				b = a.replace(/[^\d]/g,"");
				//b = a.replace(/[^0-9.]/g,"");
				c = "";
				panjang = b.length;
				j = 0;
				for (i = panjang; i > 0; i--) {
					j = j + 1;
					if (((j % 3) == 1) && (j != 1)) {
						c = b.substr(i-1,1) + separator + c;
					} else {
						c = b.substr(i-1,1) + c;
					}
				}
				this.value = c;
			});
		});
        </script>
    </body>
</html>