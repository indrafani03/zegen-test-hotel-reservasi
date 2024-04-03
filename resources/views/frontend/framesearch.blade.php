<div class="table-responsive">
	<table class="table gs-7 gy-7 gx-7">
		<thead>
			<tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
				<th>Hotel</th>
				<th>Gambar</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($data as $read) { ?>
            <tr>
				<td><?= $read->nama ?></td>
				<td><div class="symbol symbol-100px" >
                            <div class="symbol-label" style="background-image:url(<?= url('/hotel/') ?>/<?= $read->gambar ?>)" ></div>
                        </div></td>
				<td><?= $read->alamat ?></td>
				<td><a href="#" class="btn btn-primary hover-scale" data-bs-toggle="modal" id="book" data-bs-target="#kt_modal_1" data-id="<?= $read->id ?>" data-nama="<?=$read->nama ?>" data-img="<?= url('/hotel/') ?>/<?= $read->gambar ?>">Book now</a></td>
			</tr>
            <?php } ?>
			
		</tbody>
	</table>
</div>