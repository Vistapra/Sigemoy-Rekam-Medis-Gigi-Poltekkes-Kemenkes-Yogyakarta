
<?php $__env->startSection('content'); ?>
    <div class="mr-auto">
        <h2 class="text-black font-w600">Terapis Gigi</h2>
    </div>

    <!-- Add -->
    <div class="modal fade" id="addOrderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terapis Gigi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(Route('dokter.store')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="text-black font-w500">NIP</label>
                            <input type="text" name="nip" class="form-control">
                            <?php $__errorArgs = ['nip'];
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
                            <label class="text-black font-w500">Nama Dokter*</label>
                            <input type="text" name="nama" required class="form-control">
                            <?php $__errorArgs = ['nama'];
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
                            <input type="text" name="no_hp" required class="form-control">
                            <?php $__errorArgs = ['no_hp'];
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
                        <div class="form-group">
                            <label class="text-black font-w500">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3"></textarea>
                            <?php $__errorArgs = ['alamat'];
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
                            data-target="#addOrderModal">+Tambah Terapis Gigi</a>
                    </div>
                    <div class="form-group col-lg-6" style="float: right">
                        <form method="get" action="<?php echo e(url()->current()); ?>">
                            <div class="input-group">
                                <input type="text" class="form-control gp-search" name="keyword"
                                    value="<?php echo e(request('keyword')); ?>" placeholder="Cari" value="" autocomplete="off">
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
                                    <th>NIP</th>
                                    <th>Nama Dokter</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($row->nip); ?></td>
                                        <td><?php echo e($row->nama); ?></td>
                                        <td><?php echo e($row->no_hp); ?></td>
                                        <td><?php echo e($row->user->email); ?></td>
                                        <td><?php echo e($row->alamat); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#key<?php echo e($row->user_id); ?>"
                                                    class="btn btn-warning shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-key"></i></a>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#edit<?php echo e($row->id); ?>"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="flaticon-381-edit"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp delete"
                                                    r-link="<?php echo e(Route('dokter.delete', $row->id)); ?>"
                                                    r-name="<?php echo e($row->nama); ?>" r-id="<?php echo e($row->id); ?>"><i
                                                        class="fa fa-trash"></i></a>

                                                <!-- Password Change Modal -->
                                                <div class="modal fade" id="key<?php echo e($row->user_id); ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ganti Password Login Terapis
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="<?php echo e(Route('dokter.gantipassword', $row->user_id)); ?>"
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
                                                                                style="display: block;">
                                                                                <?php echo e($message); ?>

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
                                                                                style="display: block;">
                                                                                <?php echo e($message); ?>

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
                                                                <h5 class="modal-title">Edit Dokter</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo e(Route('dokter.update', $row->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo e(csrf_field()); ?>


                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">NIP</label>
                                                                        <input type="text" name="nip"
                                                                            class="form-control"
                                                                            value="<?php echo e($row->nip); ?>">
                                                                        <?php $__errorArgs = ['nip'];
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
                                                                        <label class="text-black font-w500">Nama
                                                                            Dokter*</label>
                                                                        <input type="text" name="nama"
                                                                            value="<?php echo e($row->nama); ?>" required
                                                                            class="form-control">
                                                                        <?php $__errorArgs = ['nama'];
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
                                                                        <input type="text" name="no_hp" required
                                                                            class="form-control"
                                                                            value="<?php echo e($row->no_hp); ?>">
                                                                        <?php $__errorArgs = ['no_hp'];
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
                                                                        <label class="text-black font-w500">Email*</label>
                                                                        <input type="email" name="email" required
                                                                            class="form-control"
                                                                            value="<?php echo e($row->user->email); ?>">
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

                                                                    <div class="form-group">
                                                                        <label class="text-black font-w500">Alamat</label>
                                                                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3"><?php echo e($row->alamat); ?></textarea>
                                                                        <?php $__errorArgs = ['alamat'];
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

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/dokter/index.blade.php ENDPATH**/ ?>