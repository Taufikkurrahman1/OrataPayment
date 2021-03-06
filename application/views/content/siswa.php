<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title"><?= $nama_sekolah ?></h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="#"><?= $nama_apps ?></a></li>
				<li><a href="#">Data Master</a></li>
				<li class="active">Siswa</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /row -->
	<div id="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Siswa<button class="btn btn-primary btn-outline btn-rounded" style="float:right" id="btnTambah"><i class="ti-plus"></i> Tambah</button></h3>
					<p class="text-muted m-b-30">Menampilkan data Siswa</p>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<select name="" id="filter_ta" class="form-control">
									<option value="">-- Pilih Tahun Ajaran --</option>
									<?php foreach($data_ta as $data){ ?>
										<option value="<?= $data['id_ta'] ?>"><?= $data['tahun_ajaran'] ?> <?php if($data['sta_aktif']=='1'){echo "[ Sedang Aktif ]";} ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<select name="" id="filter_kelas" class="form-control" disabled>
									<option value="">-- Pilih Kelas --</option>
									<?php foreach($data_kls as $data){ ?>
										<option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<select name="" id="filter_status" class="form-control" disabled>
									<option value="">-- Pilih Status --</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<button class="btn btn-danger btn-rounded col-md-12" id="btnFilter">Filter</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<div id="alert_filter">
						<div class="alert alert-info alert-dismissable" id="notif_filter"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> Menampilkan data yang difilter. </div>
					</div>
					<div class="table-responsive">
						<table id="data-siswa" class="table table-striped">
							<thead>
								<tr>
									<th width="15%">NIS</th>
									<th width="11%"></th>
									<th width="32%">Nama Siswa</th>
									<th width="13%">Status</th>
									<th width="29%">Aksi</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="form-tambah">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Tambah Siswa Baru<button class="btn btn-danger btn-outline btn-rounded" style="float:right" id="btnCancel"><i class="ti-close"></i> Batal</button></h3>
					<p class="text-muted m-b-30">Silahkan isi form berikut ini :</p>
					<div class="form-group" id="validation"></div>
					<div class="row">
						<?php echo form_open_multipart('siswa/create', array('class'=>'form-material', 'id'=>'form_tambah'));?>
							<div class="col-md-3">
								<input type="file" name="foto" data-default-file="<?=base_url()?>plugins/images/no-pict.png" id="input-file-disable-remove" class="dropify" data-show-remove="false" data-show-errors="true" data-show-loader="false" data-allowed-file-extensions="png" allowed=".png"/> 
								<p for="">Tekan atau seret untuk menambahkan foto</p>
								
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<h4 class="box-title m-b-0">Informasi Pribadi</h4>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group" id="layout_nis">
											<label for="">NIS / NISN</label>
											<input type="text" name="nis" id="nis" class="form-control">
										</div>
										<div class="form-group" id="layout_nama">
											<label for="">Nama Lengkap</label>
											<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
										</div>
										<div class="form-group" id="layout_tgl">
											<label for="">Tempat & Tgl Lahir</label>
											<div class="row">
												<div class="col-md-8">
													<input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control">
												</div>
												<div class="col-md-4">
													<input type="text" class="form-control" name="tgl_lahir" id="datepicker-autoclose" readonly>
												</div>
											</div>
										</div>
										<div class="form-group" id="layout_jk">
											<label for="">Jenis Kelamin</label>
											<select name="jk" id="jk" class="form-control">
												<option value="">-- Pilih Jenis Kelamin --</option>
												<option value="Laki-laki">Laki-laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
										<div class="form-group" id="layout_nama_ayah">
											<label for="">Nama Ayah</label>
											<input type="text" name="nama_ayah" id="nama_ayah" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="layout_nama_ibu">
											<label for="">Nama Ibu</label>
											<input type="text" name="nama_ibu" id="nama_ibu" class="form-control">
										</div>
										<div class="form-group" id="layout_no_hp">
											<label for="">No Hp</label>
											<input type="text" name="no_hp" id="no_hp" class="form-control">
										</div>
										<div class="form-group" id="layout_email">
											<label for="">Email</label>
											<input type="text" name="email" id="email" class="form-control" require>
										</div>
										<div class="form-group" id="layout_alamat">
											<label for="">Alamat</label>
											<textarea name="alamat" id="alamat" cols="30" rows="6" class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p>Keterangan : Periksa kembali data yang anda inputkan, setelah selesai tekan tombol simpan perubahan</p>
											<input type="submit" value="Simpan perubahan" class="btn btn-primary col-md-12">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="form-detail">
		<div class="row">
			<div class="col-sm-12">
				<div class="white-box">
					<h3 class="box-title m-b-0">Detail Siswa<button class="btn btn-danger btn-outline btn-rounded" style="float:right" id="btnClose"><i class="ti-arrow-left"></i> Kembali</button></h3>
					<div class="row" style="margin-top:30px">
						<div class="col-md-3 text-center">
							<img class="img-circle" id="detail_foto" style="width:128px;height:128px;padding-right:-5px" src="<?= base_url() ?>/media/siswa/8555.jpg" alt="user" />
						</div>
						<div class="col-md-9">
							<h4 class="page-title" id="detail_nis">NIS : 123456789</h4>
							<table class="table table-borderless">
								<tr>
									<td>Nama Siswa</td>
									<td id="detail_nama">Oratakashi Nhamako</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td id="detail_jk">Perempuan</td>
								</tr>
								<tr>
									<td>Tempat & Tgl lahir</td>
									<td id="detail_ttl">Pekalongan, 12 September 1996</td>
								</tr>
								<tr>
									<td>Nama Ayah</td>
									<td id="detail_ayah">Nama Ayah</td>
								</tr>
								<tr>
									<td>Nama Ibu</td>
									<td id="detail_ibu">Nama Ibu</td>
								</tr>
								<tr>
									<td>Email</td>
									<td id="detail_email">Email</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td id="detail_alamat">Alamat</td>
								</tr>
								<tr>
									<td>Saat ini di kelas</td>
									<td id="detail_kelas">XI IPA 1</td>
								</tr>
							</table>
							<h4 class="page-title">Riwayat Kelas</h4>
							<table class="table">
								<thead>
									<th>No</th>
									<th>Tahun Ajaran</th>
									<th>Kelas</th>
								</thead>
								<tbody id="detail_riwayat">
									<th>1</th>
									<th>1</th>
									<th>1</th>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>
