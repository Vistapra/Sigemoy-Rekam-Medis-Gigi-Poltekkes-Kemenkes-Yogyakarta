

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h2 class="text-black font-w600">Manajemen Kuisioner</h2>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <button onclick="showModal('createKategoriModal')" class="btn btn-primary">Tambah Kategori Baru</button>
            </div>
        </div>

        <div id="kuisionerTables">
            <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Kategori: <?php echo e($k->nama_kategori); ?></h4>
                                <div>
                                    <button onclick="$('#pertanyaan-<?php echo e($k->id); ?>').collapse('toggle')"
                                        class="btn btn-info">Lihat Pertanyaan</button>
                                    <button
                                        onclick="showModal('editKategoriModal', {id: <?php echo e($k->id); ?>, nama_kategori: '<?php echo e($k->nama_kategori); ?>'})"
                                        class="btn btn-warning">Edit Kategori</button>
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete('kategori', <?php echo e($k->id); ?>)">Hapus Kategori</button>
                                </div>
                            </div>
                            <div id="pertanyaan-<?php echo e($k->id); ?>" class="collapse">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50%;">Pertanyaan</th>
                                                    <th style="width: 50%;">Opsi Jawaban</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_2 = true; $__currentLoopData = $k->pertanyaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span><?php echo e($index + 1); ?>. <?php echo e($p->teks_pertanyaan); ?></span>
                                                                <div>
                                                                    <button
                                                                        onclick="showModal('editPertanyaanModal', {id: <?php echo e($p->id); ?>, teks_pertanyaan: '<?php echo e($p->teks_pertanyaan); ?>'})"
                                                                        class="btn btn-sm btn-warning">Edit</button>
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="confirmDelete('pertanyaan', <?php echo e($p->id); ?>)">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php $__empty_3 = true; $__currentLoopData = $p->opsiJawaban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-1">
                                                                    <span><?php echo e($loop->iteration); ?>.
                                                                        <?php echo e($o->teks_opsi); ?></span>
                                                                    <div>
                                                                        <button
                                                                            onclick="showModal('editOpsiJawabanModal', {id: <?php echo e($o->id); ?>, teks_opsi: '<?php echo e($o->teks_opsi); ?>'})"
                                                                            class="btn btn-sm btn-warning">Edit</button>
                                                                        <button class="btn btn-sm btn-danger"
                                                                            onclick="confirmDelete('opsi-jawaban', <?php echo e($o->id); ?>)">Hapus</button>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                                                                <span class="text-muted">Tidak ada opsi jawaban</span>
                                                            <?php endif; ?>
                                                            <button
                                                                onclick="showModal('createOpsiJawabanModal', {pertanyaan_id: <?php echo e($p->id); ?>})"
                                                                class="btn btn-sm btn-info mt-2">Tambah Opsi</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <tr>
                                                        <td colspan="2" class="text-center">Tidak ada pertanyaan untuk
                                                            kategori ini</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <button
                                            onclick="showModal('createPertanyaanModal', {kategori_id: <?php echo e($k->id); ?>})"
                                            class="btn btn-primary">Tambah Pertanyaan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            Belum Ada Survey Yang Tersedia.
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal untuk Tambah Kategori -->
    <div class="modal fade" id="createKategoriModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Kategori Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createKategoriForm" action="<?php echo e(route('kuisioner.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Kategori -->
    <div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editKategoriForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="edit_nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Pertanyaan -->
    <div class="modal fade" id="createPertanyaanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createPertanyaanForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="kategori_id" id="create_kategori_id">
                        <div class="form-group">
                            <label for="teks_pertanyaan">Teks Pertanyaan</label>
                            <textarea class="form-control" id="teks_pertanyaan" name="teks_pertanyaan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Pertanyaan -->
    <div class="modal fade" id="editPertanyaanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPertanyaanForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="edit_teks_pertanyaan">Teks Pertanyaan</label>
                            <textarea class="form-control" id="edit_teks_pertanyaan" name="teks_pertanyaan" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Opsi Jawaban -->
    <div class="modal fade" id="createOpsiJawabanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Opsi Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createOpsiJawabanForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="pertanyaan_id" id="create_pertanyaan_id">
                        <div class="form-group">
                            <label for="teks_opsi">Teks Opsi</label>
                            <input type="text" class="form-control" id="teks_opsi" name="teks_opsi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit Opsi Jawaban -->
    <div class="modal fade" id="editOpsiJawabanModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Opsi Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editOpsiJawabanForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="edit_teks_opsi">Teks Opsi Jawaban</label>
                            <input type="text" class="form-control" id="edit_teks_opsi" name="teks_opsi" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Opsi Jawaban</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bumn7534/sigemoy/resources/views/kuisioner/index.blade.php ENDPATH**/ ?>