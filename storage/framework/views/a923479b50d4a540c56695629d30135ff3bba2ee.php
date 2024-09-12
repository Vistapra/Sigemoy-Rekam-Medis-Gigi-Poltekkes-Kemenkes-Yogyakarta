
<?php $__env->startSection('content'); ?>
    <div class="mr-auto">
        <h2 class="text-black font-w600">Kader Kesehatan</h2>
    </div>

    <!-- Add -->
    <div class="modal fade" id="addOrderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Petugas Baru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(Route('petugas.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label class="text-black font-w500">Nama*</label>
                            <input type="text" name="name" required class="form-control">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback animated fadeInUp" style="display: block;"><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label class="text-black font-w500">No HP*</label>
                            <input type="text" name="phone" required class="form-control">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback animated fadeInUp" style="display: block;"><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Email(Login)*</label>
                            <input type="email" name="email" required class="form-control">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback animated fadeInUp" style="display: block;"><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="text-black font-w500">Password Login*</label>
                            <input type="password" name="password" required class="form-control">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback animated fadeInUp" style="display: block;"><?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <input type="hidden" name="role" value="2">
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">BUAT</button>
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
                            data-target="#addOrderModal">+Tambah Petugas</a>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($row->name); ?></td>
                                        <td><?php echo e($row->email); ?></td>
                                        <td><?php echo e($row->phone); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#key<?php echo e($row->id); ?>"
                                                    class="btn btn-warning shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-key"></i></a>

                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#edit<?php echo e($row->id); ?>"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="flaticon-381-edit"></i></a>

                                                <!-- Form Delete -->
                                                <form id="delete-form-<?php echo e($row->id); ?>"
                                                    action="<?php echo e(Route('petugas.delete', $row->id)); ?>" method="POST"
                                                    style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                                <a href="javascript:void(0)"
                                                    class="btn btn-danger shadow btn-xs sharp delete"
                                                    data-id="<?php echo e($row->id); ?>" data-name="<?php echo e($row->name); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                                <!-- Ganti Password Modal -->
                                                <div class="modal fade" id="key<?php echo e($row->id); ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ganti Password</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(Route('gantipassword', $row->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Password
                                                                            Baru*</label>
                                                                        <input type="password" name="password" required
                                                                            class="form-control">
                                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;"><?php echo e($message); ?>

                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Password
                                                                            Konfirmasi*</label>
                                                                        <input type="password" name="password_konfirm"
                                                                            required class="form-control">
                                                                        <?php $__errorArgs = ['password_konfirm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;"><?php echo e($message); ?>

                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">GANTI
                                                                            PASSWORD</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?php echo e($row->id); ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Petugas</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(Route('petugas.update', $row->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Nama*</label>
                                                                        <input type="text" name="name"
                                                                            value="<?php echo e($row->name); ?>" required
                                                                            class="form-control">
                                                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;"><?php echo e($message); ?>

                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">No HP
                                                                            (Login)
                                                                            *</label>
                                                                        <input type="text" name="phone" required
                                                                            class="form-control"
                                                                            value="<?php echo e($row->phone); ?>">
                                                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;"><?php echo e($message); ?>

                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Email</label>
                                                                        <input type="email" name="email" required
                                                                            class="form-control"
                                                                            value="<?php echo e($row->email); ?>">
                                                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <div class="invalid-feedback animated fadeInUp"
                                                                                style="display: block;"><?php echo e($message); ?>

                                                                            </div>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <input type="hidden" name="role" value="2">
                                                                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <div class="invalid-feedback animated fadeInUp"
                                                                            style="display: block;">
                                                                            <?php echo e($message); ?>

                                                                        </div>
                                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">UPDATE</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        $().ready(function() {
            $(".delete").click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var form = $('#delete-form-' + id);

                Swal.fire({
                    title: 'Ingin Menghapus?',
                    text: "Yakin ingin menghapus data  : " + name + " ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bumn7534/sigemoy/resources/views/petugas/index.blade.php ENDPATH**/ ?>