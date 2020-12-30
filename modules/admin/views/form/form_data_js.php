<table  class="table table-hover" id="" style="">
	<thead>
		<tr class="active">
			<?php 
			$h = '';
			$col = $data_kolom->num_rows();
			$y = 1;
			if($col > 0){
				foreach($data_kolom->result() as $k){
					$h .= '<th width="">'.($k->Nm_Col != '' ? $k->Nm_Col : 'Kolom '.$y).'<input type="hidden" name="col[]" value="'.$k->ID_Col.'" /></th>';
					++$y;
				}
				$h .= '<th width="120px">Aksi</th>';
				
			}
			echo $h;
			?>
		</tr>
	</thead>
	<tbody class="input_fields_wrap">
		<?php
			$m = 0;
			if($data_row->num_rows() > 0){
				$j = '';
				foreach($data_row->result() as $r){
					$j .= '<tr id="tr_'.$r->ID_Row.'">';
					$i = 0;
					if($data_col->num_rows() > 0){
						foreach($data_col->result() as $c){
							$j .= '<td>'.get_form_val($r->ID_Row,$c->ID_Col).'</td>';
							++$i;
						}
						$j .= '<td><input type="button" id="edit_'.$r->ID_Row.'" class="btn btn-blue btn-xs" onclick="edit(\''.$r->ID_Row.'\');" value="Edit" />&nbsp;<input type="button" id="remove_'.$r->ID_Row.'" class="btn btn-red btn-xs" onclick="remove(\''.$r->ID_Row.'\');" value="Hapus" /></td>';
					}
					++$m;
					$j .= '</tr>';
				}
				echo $j;
			}
		?>
	</tbody>
</table>