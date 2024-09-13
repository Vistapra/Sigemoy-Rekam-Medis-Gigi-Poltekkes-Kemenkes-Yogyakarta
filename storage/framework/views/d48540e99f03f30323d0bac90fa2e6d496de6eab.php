

<?php $__env->startSection('content'); ?>
    <div class="mr-auto">
        <h2 class="text-black font-w600">Nama Kondisi Gigi</h2>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addKondisiGigiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kondisi Gigi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('rekammediskader.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="text-black font-w500">Nama Kondisi*</label>
                            <input type="text" name="nama_kondisi" required class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group col-lg-6" style="float: left">
                        <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal"
                            data-target="#addKondisiGigiModal">+Tambah Kondisi Gigi</a>
                    </div>
                    <div class="form-group col-lg-6" style="float: right">
                        <form method="get" action="<?php echo e(url()->current()); ?>">
                            <div class="input-group">
                                <input type="text" class="form-control gp-search" name="keyword"
                                    value="<?php echo e(request('keyword')); ?>" placeholder="Cari" autocomplete="off">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default no-border btn-sm gp-search">
                                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $namaKondisiGigi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kondisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($kondisi->nama_kondisi); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#editKondisiGigi<?php echo e($kondisi->id); ?>"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="flaticon-381-edit"></i></a>
                                                <button type="button"
                                                    class="btn btn-danger shadow btn-xs sharp delete-kondisi"
                                                    data-id="<?php echo e($kondisi->id); ?>" data-name="<?php echo e($kondisi->nama_kondisi); ?>">
                                                    <i class="flaticon-381-trash"></i>
                                                </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editKondisiGigi<?php echo e($kondisi->id); ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Kondisi Gigi</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo e(route('rekammediskader.update', $kondisi->id)); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <div class="form-group">
                                                            <label class="text-black font-w500">Nama Kondisi*</label>
                                                            <input type="text" name="nama_kondisi"
                                                                value="<?php echo e($kondisi->nama_kondisi); ?>" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Belum Ada Data Kondisi Gigi</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle delete confirmation
            $('.delete-kondisi').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus kondisi gigi: " + name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?php echo e(route('rekammediskader.destroy', '')); ?>/" + id,
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Kondisi gigi telah dihapus.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Display success message
            <?php if(session('success')): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '<?php echo e(session('success')); ?>',
                });
            <?php endif; ?>

            // Display error message
            <?php if(session('error')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?php echo e(session('error')); ?>',
                });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Vista Pramudya\sigemoy\resources\views/rekammediskader/index.blade.php ENDPATH**/ ?>