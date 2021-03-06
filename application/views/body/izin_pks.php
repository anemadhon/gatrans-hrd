		<div class="container-fluid">
			<div class="row">
				<div class="hide-on-med-and-down" id="side-bar">
					<ul class="nav-btn">
						<li class="li-menu"><span class="span-user"><i class="material-icons">account_circle</i></span><a href="<?php echo site_url('datauser');?>" class="li-a"><?php echo $dataadmin['username'] ?></a></li><span class="span-title" id="menu"><i class="material-icons">menu</i></span>
					</ul>
					<ul class="ulli">
						<li class="li-menu"><a href="<?php echo site_url('input');?>" class="li-a tooltipped" data-position="left" data-tooltip="Basis Data">Basis Data<span class="span-li"><i class="material-icons">folder_shared</i></span></a></li>
						<?php if ($dataadmin['username'] == 'Kang Randi' || $dataadmin['username'] == '@anemadhon' || $dataadmin['username'] == 'Faisal G'){ ?>
						<li class="li-menu"><a href="<?php echo site_url('gaji');?>" class="li-a tooltipped" data-position="left" data-tooltip="Slip Gaji">Slip Gaji<span class="span-li"><i class="material-icons">monetization_on</i></span></a></li>
						<?php } ?>
						<li class="li-menu"><a href="<?php echo site_url('akta');?>" class="li-a tooltipped" data-position="left" data-tooltip="Legalitas">Legalitas<span class="span-li"><i class="material-icons">assignment</i></span></a></li>
						<li class="li-menu"><a href="<?php echo site_url('tp');?>" class="li-a tooltipped" data-position="left" data-tooltip="Training Program">Training Program<span class="span-li"><i class="material-icons">group_work</i></span></a></li>
						<li class="space"></li>
						<li class="li-menu"><a href="<?php echo site_url('logout');?>" class="li-a tooltipped" data-position="left" data-tooltip="Keluar">Keluar<span class="span-li"><i class="material-icons">assignment_return</i></span></a></li>
					</ul>
				</div>
				<div id="content-bar">
					<ul id="title-content">
						<li class="menu-title-a"><a href="<?php echo site_url('akta');?>" id="menu-a">Akta</a></li>
						<li class="menu-title-b-on"><a href="<?php echo site_url('pks');?>" id="menu-b">Perjanjian</a></li>
						<li class="menu-title-c"><a href="<?php echo site_url('izin');?>" id="menu-c">Perizinan</a></li>
					</ul>
					<div id="content-side">
						<p id="form-title-a">Legalitas - Perjanjian</p>
						<p id="form-title-b">PT Ghita Avia Trans</p>
						<?php
						echo form_open_multipart('legal-pks','autocomplete="off"');
						date_default_timezone_set('Asia/Jakarta');
						function get_client_ip() {
						    $ipaddress = '';
						    if (getenv('HTTP_CLIENT_IP'))
						        $ipaddress = getenv('HTTP_CLIENT_IP');
						    else if(getenv('HTTP_X_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
						    else if(getenv('HTTP_X_FORWARDED'))
						        $ipaddress = getenv('HTTP_X_FORWARDED');
						    else if(getenv('HTTP_FORWARDED_FOR'))
						        $ipaddress = getenv('HTTP_FORWARDED_FOR');
						    else if(getenv('HTTP_FORWARDED'))
						       $ipaddress = getenv('HTTP_FORWARDED');
						    else if(getenv('REMOTE_ADDR'))
						        $ipaddress = getenv('REMOTE_ADDR');
						    else
						        $ipaddress = 'UNKNOWN';
						    return $ipaddress;
						}
						?>
						<div class="row space ml-lg">
							<div class="col s12 m8 l9">
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="noIP" name="noizinpks" placeholder="No. PKS">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="perihal" name="perihal" placeholder="Perihal">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="instansi" name="instansi" placeholder="Instansi">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="tglAwal" name="tglawal" placeholder="Tanggal Pembuatan : DD-MM-YYYY">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<input type="text" class="browser-default text-input text-box-input" id="tglAkhir" name="tglakhir" placeholder="Tanggal Berakhir : DD-MM-YYYY">
							        </div>
								</div>
								<div class="row">
							        <div class="col s12">
							        	<select name="ket" id="ket" class="browser-default text-input select-box-input">
								    		<option value="" class="text-box-input">Keterangan</option>
								    		<option value="PKS AIRLINE" class="text-box-input">PKS AIRLINE</option>
								    		<option value="PKS NON AIRLINE" class="text-box-input">PKS NON AIRLINE</option>
								    	</select>
							        </div>
								</div>
								<div class="row">
					    			<div class="space-file">
						    			<label for="attach" class="col s10 m10 l10 text-file text-box-input">
								        	<i class="material-icons left up-plus">add</i><p class="nama-file add">Pilih File PKS</p>
							    		</label>
							    		<input type="file" id="attach" name="attach" class="up-file" accept=".jpg,.jpeg,.png,.doc,.docx,.pdf" hidden>
					    			</div>
					    			<i class="material-icons right dlt-img">close</i>
								</div>
							</div>
						</div>
						<div hidden>
							<input type="hidden" name="userinput" value="<?php echo $dataadmin['username'] ?>">
							<input type="hidden" name="tgljaminput" value="<?php echo date('Y-m-d H:i:s') ?>">
							<input type="hidden" name="ippc" value="<?php echo get_client_ip() ?>">
						</div>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<button class="btn save" type="submit"><i class="material-icons left">save</i>Simpan</button>
							</div>
						</div>
						<?php if ($dataadmin['izin_pks']->num_rows() > 0): ?>
						<div class="col s12 m8 l9">
							<div class="row right-align to-left mb-a">
								<a href="<?php echo site_url('data-pks/display');?>" class="to-data"><i class="material-icons right">arrow_forward</i> Lihat Data</a>
							</div>
						</div>
						<?php endif ?>
						<?php
						echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>