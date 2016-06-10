<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Users</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<table id="data-user" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Username</td>
					<td>Email</td>
					<td>Level</td>
					<td>Reg. Date</td>
					<td>Action</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td>Username</td>
					<td>Email</td>
					<td>Level</td>
					<td>Reg. Date</td>
					<td>Action</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($users as $user) : ?>
				<tr>
					<td><?= $user->username; ?></td>
					<td><?= $user->email; ?></td>
					<td><?= $user->lv_nama; ?></td>
					<td><?= $user->regdate; ?></td>
					<td>
						<?php if ($user_lv < $user->level) : ?>
						<a class="btn btn-success no-radius" title="Edit Level User" data-toggle="modal" data-target="#modal-edit-user" data-username="<?= $user->username; ?>" data-id-lv="<?= $user->level; ?>"><i class="fa fa-edit fa-fw"></i></a>
						<a class="btn btn-danger no-radius" title="Delete User" data-toggle="modal" data-target="#modal-delete-user" data-username="<?= $user->username; ?>"><i class="fa fa-trash fa-fw"></i></a>
						<?php endif; ?>
						<a class="btn btn-info no-radius" href="<?= base_url('dashboard/user/' . $user->username); ?>" title="View User"><i class="fa fa-eye fa-fw"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section><!-- .content -->
</div><!-- .content-wrapper -->

<!-- Modal Edit User -->
<div id="modal-edit-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-base="<?= base_url(); ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="level_id" class="control-label col-xs-12 col-md-3">Level</label>
						<div class="col-xs-12 col-md-9">
							<select id="level_id" class="form-control">
								<?php if ($lv_data) : foreach ($lv_data as $lv) : ?>
								<option value="<?= $lv->level; ?>"><?= $lv->lv_nama; ?></option>
								<?php endforeach; endif; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="modal_button">
					<button type="button" class="btn btn-success no-radius" data-dismiss="modal">Batal</button>
					<button id="edit_user" data-username="" type="button" class="btn btn-danger no-radius">Simpan</button>
				</div>
				<div id="modal_loading" class="sr-only">
					<i class="fa fa-spinner fa-pulse"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Delete User-->
<div id="modal-delete-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-base="<?= base_url(); ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<div id="modal_button">
					<button type="button" class="btn btn-success no-radius" data-dismiss="modal">Tidak</button>
					<button id="delete_user" data-username="" type="button" class="btn btn-danger no-radius">Hapus</button>
				</div>
				<div id="modal_loading" class="sr-only">
					<i class="fa fa-spinner fa-pulse"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Scripts for this page -->
<script src="<?= base_url('vendor/DataTables-1.10.11/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/natural.js'); ?>"></script>
<script src="<?= base_url('assets/js/member.init.js'); ?>"></script>
