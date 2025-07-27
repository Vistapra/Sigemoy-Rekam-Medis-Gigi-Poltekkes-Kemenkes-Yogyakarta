<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <div class="form-group col-lg-6" style="float: left">
                            <a class="btn btn-primary mr-3">Rekam Medis Terapis Gigi</a>
                        </div>
                        <div class="form-group col-lg-6" style="float: right">
                            <form method="get" action="<?php echo e(url()->current()); ?>">
                                <div class="input-group">
                                    <input type="text" class="form-control gp-search" name="keyword"
                                        value="<?php echo e(request('keyword')); ?>" placeholder="Cari" value=""
                                        autocomplete="off">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                            <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        
                        

                    </ul>

                    <div class="table-responsive card-table">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>

                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Dokter</th>
                                    <th>Keluhan </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rekam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td align="center"><?php echo e($rekam->firstItem() + $key); ?></td>
                                        <td><?php echo e($row->no_rekam); ?><br /><?php echo e($row->tgl_rekam); ?></td>
                                        <td><a
                                                href="<?php echo e(Route('rekam.detail', $row->pasien_id)); ?>"><?php echo e($row->pasien->nama); ?></a>
                                        </td>
                                        <td><?php echo e($row->user->name); ?></td>
                                        <td><?php echo e($row->keluhan); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?php echo e(Route('rekam.detail', $row->pasien_id)); ?>"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-user-md"></i></a>
                                                
                                                <a href="<?php echo e(Route('rekam.edit', $row->id)); ?>"
                                                    class="btn btn-info shadow btn-xs sharp mr-1">
                                                    <i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp delete"
                                                    r-link="<?php echo e(Route('rekam.delete', $row->id)); ?>"
                                                    r-name="<?php echo e($row->pasien->nama); ?>" r-id="<?php echo e($row->id); ?>"><i
                                                        class="fa fa-trash"></i></a>
                                                


                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                        <?php echo e($rekam->appends(request()->except('page'))->links()); ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $().ready(function() {
            $(".delete").click(function() {
                var id = $(this).attr('r-id');
                var name = $(this).attr('r-name');
                var link = $(this).attr('r-link');

                Swal.fire({
                    title: 'Ingin Menghapus?',
                    text: "Yakin ingin menghapus data  : " + name + " ini ?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus !'
                }).then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = link;
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Vista Pramudya\sigemoy\resources\views/rekam/index.blade.php ENDPATH**/ ?>