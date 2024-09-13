<!-- Add -->
<div class="modal fade" id="addDiagnosa">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Diagnosa </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(Route('diagnosa.update')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" id="rekamId" name="rekam_id" value="0">
                    <input type="hidden" id="pasienId" name="pasien_id" value="<?php echo e($pasien->id); ?>">
                    <div class="form-group">
                        
                        <div class="row">
                            <table class="display white-border table-responsive-sm"
                                style="width: 100%"
                             id="icd-table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 15%">Kode</th>
                                        <th style="width: 80%">Nama</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <?php $__errorArgs = ['diagnosa'];
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
                    
                   
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Vista Pramudya\sigemoy\resources\views/rekam/partial/modal-diagnosa.blade.php ENDPATH**/ ?>