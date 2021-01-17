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
						<li class="menu-title-a"><a href="<?php echo site_url('tp');?>" id="menu-a">Input Data</a></li>
						<li class="menu-title-b-on"><a href="<?php echo site_url('data-tp/display');?>" id="menu-b">Data Training</a></li>
					</ul>
					<div id="content-side">
						<div class="row">
					    	<div class="col s12 m6">
					    		<p id="form-title-a">Tabel Data Training Program</p>
								<p id="form-title-b">PT Ghita Avia Trans</p>
					    	</div>
						</div>
						<div class="row space-btn space mb-a">
					    	<div class="col s12 m6">
					    		<?php echo form_open('pdf-tp','target="_blank"') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Pdf</button>
									<input type="hidden" id="pdf" name="pdf">
								<?php echo form_close() ?>
							    <?php echo form_open('excel-tp') ?>
									<button type="submit" class="btn save col s12 m3 to-left mb-s"><i class="material-icons left">print</i>Excel</button>
									<input type="hidden" id="excel" name="excel">
								<?php echo form_close() ?>
					    	</div>
					    	<div class="col s12 m6 pad">
					    		<?php 
								$attr = array('method'=>'get','autocomplete'=>'off','class'=>'form-inline');
								echo form_open('caridata-tp',$attr); ?>
									<div class="pade">
										<?php if ($this->input->get('kw')){ ?>
								    	<input type="text" class="col s12 m5 browser-default text-box-search mb-s" value="<?php echo $this->input->get('kw') ?>" id="kw" name="kw">
								    	<?php } else { ?>
										<input type="text" class="col s12 m5 browser-default text-box-search mb-s" placeholder="Cari Data..." id="kw" name="kw">
								    	<?php } ?>
									</div>
									<select name="bulan" id="bulan" class="col s12 m4 browser-default select-box-search mb-s">
										<option value="" class="text-box-input">Pilih Bulan</option>
										<?php
										for ($i=1; $i <= 12; $i++) { 
											if ($this->input->get('bulan')==$i){ 
										?>
										<option value="<?php echo $i ?>" class="text-box-input" selected><?php echo strtoupper(date('M',mktime(0,0,0,$i,1,2021))) ?></option>
										<?php } else { ?>
										<option value="<?php echo $i ?>" class="text-box-input"><?php echo strtoupper(date('M',mktime(0,0,0,$i,1,2021))) ?></option>
										<?php
											}
										}
										?>
									</select>
									<button type="submit" class="btn search col s12 m3 mb-s"><i class="material-icons left">search</i>Cari</button>
								<?php echo form_close(); ?>
					    	</div>
					    </div>
					    <?php 
					  	if ($this->input->get('kw')){ 
					  		$angka = '-'.$dataadmin['tepe']->num_rows().'-';
					  		$kw = '-'.$this->input->get('kw');
					  	?>
					  	<p id="search-result">Hasil Pencarian : Ditemukan <?php echo $angka; ?> Data untuk Kata Kunci <?php echo $kw; ?></p>
					  	<?php 
					  	}
						?> 
						<?php if ($dataadmin['tepe']->num_rows() > 0){ ?>
						<?php echo $this->pagination->create_links(); ?>
						<table class="responsive-table table-style mb-a">
					        <thead>
							    <tr>
							    	<th scope="col">
										<label>
											<input type="checkbox" id="cb-all" class="filled-in">
											<span></span>
										</label>
									</th>
							    	<th scope="col" class="center">No.</th>
							    	<th scope="col" class="center">ID</th>
							    	<th scope="col" class="center">Nama</th>
							    	<th scope="col" class="center">Jabatan</th>
							    	<th scope="col" class="center" colspan="2">Aksi</th>
							    </tr>
						  	</thead>
							<tbody>
								<?php
								$no = $this->uri->segment('3') + 1;
								foreach ($dataadmin['tepe']->result() as $data){  
								?>
							    <tr>
							    	<td>
							    		<p>
											<label>
												<input type="checkbox" class="filled-in cb" name="cb[]" value="<?php echo $data->ktp; ?>">
												<span></span>
											</label>
										</p>
							    	</td>
							    	<td scope="row" class="center"><?php echo $no; ?></td>
							    	<td scope="row" class="center"><?php echo $data->nik; ?></td>
							    	<td scope="row"><?php echo $data->nama; ?></td>
							    	<td scope="row"><?php echo $data->jbtn; ?></td>
							    	<td class="center"><button type="submit" class="btn-small btn save detail"><i class="material-icons left">visibility</i>Lihat</button></td>
							    	<td class="center">
										<?php echo form_open('pdf-cv','target="_blank"') ?>
											<button type="submit" class="btn-small btn save"><i class="material-icons left">print</i>CV</button>
											<input type="hidden" name="cv" value="<?php echo $data->ktp.'/' ?>">
										<?php echo form_close(); ?>
									</td>
							    </tr>
							    <tr class="detailview" style="display: none;">
									<td colspan="10">
										<div class="row">
							    			<div class="col s5 m4">No. KTP</div>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo $data->ktp; ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">Divisi</div>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo $data->divisi; ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">History Traning : </div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">Training</div>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo $data->training; ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">Tempat Pelaksanaan</div>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo $data->tmpttraining; ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">Tgl Ikut Training</div>
							    			<?php  
							    			if ($data->tglikut=='0000-00-00') {
								    			$ikut = date("Y-m-d");
								    		} else {
								    			$ikut = $data->tglikut;
								    		}
							    			?>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo date_format(date_create($ikut), "d-m-Y"); ?></span></div>
							    		</div>
										<div class="row">
							    			<div class="col s5 m4">Tgl Berakhir Training</div>
							    			<?php  
							    			if ($data->tglexp=='0000-00-00') {
								    			$exp = date("Y-m-d");
								    		} else {
								    			$exp = $data->tglexp;
								    		}
							    			?>
							    			<div class="col s5 m4"><span class="truncate">: <?php echo date_format(date_create($exp), "d-m-Y"); ?></span></div>
							    		</div>
							    	</td>
							    </tr>
							    <?php 
							    	$no++;
								} 
								?>
							</tbody>
						</table>
					    <?php } else { ?>
						<p class="empty-data center">Tidak Ditemukan Data</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Alert Here -->
		<div id="modal" class="modal">
			<div class="modal-content center"></div>
			<a href="#!" class="btn save right modal-close mb-a to-left"><i class="material-icons modal-close right">close</i>Tutup</a>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/materialize.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/hrd.js');?>"></script>
	</body>
</html>