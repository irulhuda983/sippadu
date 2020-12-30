<?php
if($data->num_rows() > 0){
	foreach($data->result() as $d){
		if($d->ID_User == $this->session->userdata('userid')){
			echo '
				<li class="online">
					<div class="media" style="cursor: help;" >
						<a class="pull-left thumb thumb-sm" role="button" tabindex="0" href="javascript:void(0)" style="cursor: help;">
							<img class="media-object img-circle" src="'.base_url('themes').'/'.config('theme').'/images/user-profile.png" alt>
						</a>
						<div class="media-body">
							<span class="media-heading" style="font-weight:bold;">'.$d->Username.'</span>
							 <small style="color:#16a085;font-weight:bold;">Online</small>
							<span class="badge badge-outline status"></span>
						</div>
					</div>
				</li>';
		}
		else{
			if($d->Status == 1){
				echo '
				<li class="online">
					<div class="media" style="cursor: pointer; cursor: hand;" onClick="javascript:chatWith(\''.$d->Username.'\')">
						<a class="pull-left thumb thumb-sm" role="button" tabindex="0" href="javascript:void(0)">
							<img class="media-object img-circle" src="'.base_url('themes').'/'.config('theme').'/images/user-profile.png" alt>
						</a>
						<div class="media-body">
							<span class="media-heading" style="font-weight:bold;">'.$d->Username.'</span>
							 <small style="color:#16a085;font-weight:bold;">Online</small>
							<span class="badge badge-outline status"></span>
						</div>
					</div>
				</li>';
			}
			/* else{
				echo '
				<li class="offline" style="font-style:italic;">
					<div class="media" style="cursor: pointer; cursor: hand;" onClick="javascript:chatWith(\''.$d->Username.'\')">
						<a class="pull-left thumb thumb-sm" role="button" tabindex="0" href="javascript:void(0)">
							<img class="media-object img-circle" src="'.base_url('themes').'/'.config('theme').'/images/user-profile.png" alt>
						</a>
						<div class="media-body">
							<span class="media-heading">'.$d->Username.'</span>
							 <small style="color:#e05d6f;font-weight:bold;">Offline</small>
							<span class="badge badge-outline status"></span>
						</div>
					</div>
				</li>';
			} */
		}
	}
}
?>