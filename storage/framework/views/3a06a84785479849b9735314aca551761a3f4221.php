

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Rekam Medis Kader</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('rekammediskaderkesehatan.update', $rekamMedisKader->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="pasien_id">Nama Pasien</label>
                            <input type="text" class="form-control" value="<?php echo e($rekamMedisKader->pasien->nama); ?>"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label for="namakondisigigi_id">Kondisi Gigi</label>
                            <select name="namakondisigigi_id" id="namakondisigigi_id" class="form-control" required>
                                <?php $__currentLoopData = $kondisiGigi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kondisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kondisi->id); ?>"
                                        <?php echo e($rekamMedisKader->namakondisigigi_id == $kondisi->id ? 'selected' : ''); ?>>
                                        <?php echo e($kondisi->nama_kondisi); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" name="total" id="total" class="form-control"
                                value="<?php echo e($rekamMedisKader->total); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?php echo e($rekamMedisKader->keterangan); ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Rekam Medis</button>
                            <a href="<?php echo e(route('rekammediskaderkesehatan.index')); ?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/rekammediskaderkesehatan/edit.blade.php ENDPATH**/ ?>