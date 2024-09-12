

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('rekam.detail', $pasien->id)); ?>">Rekam Medis</a></li>
                <li class="breadcrumb-item active">Tambah Rekam Medis Kader Kesehatan <?php echo e($pasien->nama); ?></li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title mb-4">Tambah Rekam Medis Kader Kesehatan</h5>

                <form action="<?php echo e(route('rekammediskaderkesehatan.store')); ?>" method="POST" id="rekamKaderForm">
                    <?php echo csrf_field(); ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Pasien:</label>
                                <input type="text" class="form-control" value="<?php echo e($pasien->nama); ?>" readonly>
                                <input type="hidden" name="pasien_id" value="<?php echo e($pasien->id); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Petugas Kesehatan yang Menangani:</label>
                                <input type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>" readonly>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm mt-4">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-3">Kondisi Gigi</h6>
                            <table class="table table-bordered table-hover" id="kondisiGigiTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Kondisi Gigi</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="kondisi_gigi[]" class="form-select" required>
                                                <option value="">Pilih Kondisi Gigi</option>
                                                <?php $__currentLoopData = $kondisiGigi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($kg->id); ?>"><?php echo e($kg->nama_kondisi); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="keterangan[]" class="form-control" rows="2"></textarea>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm removeRow">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm mt-2" id="addRow">
                                <i class="fa fa-plus"></i> Tambah Kondisi Gigi
                            </button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?php echo e(route('rekammediskaderkesehatan.index')); ?>" class="btn btn-secondary">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <style>
        .table th {
            background-color: #f8f9fa;
        }

        .removeRow {
            color: white;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            // Add new row
            $("#addRow").click(function() {
                var newRow = $("#kondisiGigiTable tbody tr:first").clone();
                newRow.find('input, select, textarea').val('');
                $("#kondisiGigiTable tbody").append(newRow);
            });

            // Remove row
            $(document).on('click', '.removeRow', function() {
                if ($("#kondisiGigiTable tbody tr").length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    Swal.fire({
                        type: 'warning',
                        title: 'Perhatian',
                        text: 'Minimal satu kondisi gigi harus diisi.',
                    });
                }
            });

            // Form submission

        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bumn7534/sigemoy/resources/views/rekammediskaderkesehatan/create.blade.php ENDPATH**/ ?>