
<div class="modal fade" id="addPemeriksaan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemeriksaan </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(Route('pemeriksaan.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" id="rekamId" name="rekam_id" value="0">
                    <input type="hidden" id="pasienId" name="pasien_id" value="<?php echo e($pasien->id); ?>">
                    <div class="form-group">
                        <label class="text-black font-w500">Pemeriksaan*</label>
                        <textarea name="pemeriksaan"  required
                        id="editor" 
                        class="form-control" 
                        rows="10"></textarea>
                        <?php $__errorArgs = ['pemeriksaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback animated fadeInUp"
                        style="display: block;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                       
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Foto</label>
                        <input type="file" name="file">
                        <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback animated fadeInUp"
                        style="display: block;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/bumn7534/sigemoy/resources/views/rekam/partial/modal-pemeriksaan.blade.php ENDPATH**/ ?>