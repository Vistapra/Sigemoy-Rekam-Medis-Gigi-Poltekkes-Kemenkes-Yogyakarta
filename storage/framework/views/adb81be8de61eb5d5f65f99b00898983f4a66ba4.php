

<?php $__env->startSection('content'); ?>
    <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
        <div class="mr-auto">
            <h2 class="text-black font-w600">Tambah Pasien</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(Route('pasien')); ?>">Data Pasien</a></li>
                <li class="breadcrumb-item active"><a href="#">Tambah Data Pasien</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="<?php echo e(Route('pasien.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Pasien*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" required
                                        value="<?php echo e(old('nama')); ?>">
                                    <?php $__errorArgs = ['nama'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="tmp_lahir"
                                        value="<?php echo e(old('tmp_lahir')); ?>">
                                    <?php $__errorArgs = ['tmp_lahir'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tgl_lahir"
                                        value="<?php echo e(old('tgl_lahir')); ?>">
                                    <?php $__errorArgs = ['tgl_lahir'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input type="radio" name="jk" class="form-check-input" value="Laki-Laki">
                                        <label class="form-check-label">Laki-Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="jk" class="form-check-input" value="Perempuan">
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                    <?php $__errorArgs = ['jk'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Status Menikah</label>
                                <div class="col-sm-4">
                                    <select name="status_menikah" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                    <?php $__errorArgs = ['status_menikah'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-2">
                                    <select name="agama" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    <?php $__errorArgs = ['agama'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-2">
                                    <select name="pendidikan" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    </select>
                                    <?php $__errorArgs = ['pendidikan'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-2">
                                    <select name="pekerjaan" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="PNS">PNS</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="TNI/Polri">TNI/Polri</option>
                                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Guru/Pengajar">Guru/Pengajar</option>
                                        <option value="IRT">IRT</option>
                                        <option value="Lain-Lain">Lain-Lain</option>
                                    </select>
                                    <?php $__errorArgs = ['pekerjaan'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat_lengkap" class="form-control" rows="4"><?php echo e(old('alamat_lengkap')); ?></textarea>
                                    <?php $__errorArgs = ['alamat_lengkap'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kelurahan"
                                        value="<?php echo e(old('kelurahan')); ?>">
                                    <?php $__errorArgs = ['kelurahan'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kecamatan"
                                        value="<?php echo e(old('kecamatan')); ?>">
                                    <?php $__errorArgs = ['kecamatan'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kabupaten"
                                        value="<?php echo e(old('kabupaten')); ?>">
                                    <?php $__errorArgs = ['kabupaten'];
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
                                </div>
                                <label class="col-sm-2 col-form-label">Kodepos</label>
                                <div class="col-sm-4">
                                    <input type="number" maxlength="5" class="form-control" name="kodepos"
                                        value="<?php echo e(old('kodepos')); ?>">
                                    <?php $__errorArgs = ['kodepos'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" name="no_hp"
                                        value="<?php echo e(old('no_hp')); ?>">
                                    <?php $__errorArgs = ['no_hp'];
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
                                </div>
                                <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input type="radio" name="kewarganegaraan" class="form-check-input"
                                            value="WNI" checked>
                                        <label class="form-check-label">WNI</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="kewarganegaraan" class="form-check-input"
                                            value="WNA">
                                        <label class="form-check-label">WNA</label>
                                    </div>
                                    <?php $__errorArgs = ['kewarganegaraan'];
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
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alergi</label>
                                        <div class="col-sm-10">
                                            <textarea name="alergi" class="form-control" rows="1"><?php echo e(old('alergi')); ?></textarea>
                                            <?php $__errorArgs = ['alergi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback animated fadeInUp" style="display: block;">
                                                    <?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/pasien/add.blade.php ENDPATH**/ ?>