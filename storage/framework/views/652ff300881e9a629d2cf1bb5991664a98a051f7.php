

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="text-white text-bold h4 mb-0">Edit Konten Edukasi</h1>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('edukasi.update', $edukasi)); ?>" method="POST" enctype="multipart/form-data"
                            id="editEdukasiForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="judul" name="judul" value="<?php echo e(old('judul', $edukasi->judul)); ?>" required>
                                <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="deskripsi" name="deskripsi" rows="3"
                                    required><?php echo e(old('deskripsi', $edukasi->deskripsi)); ?></textarea>
                                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Ubah Media</label>
                                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?php if(old('media_type', $edukasi->media_type) == 'foto'): ?> active <?php endif; ?>">
                                        <input type="radio" name="media_type" id="media_type_foto" value="foto"
                                            <?php echo e(old('media_type', $edukasi->media_type) == 'foto' ? 'checked' : ''); ?>

                                            required> Foto
                                    </label>
                                    <label class="btn btn-outline-primary <?php if(old('media_type', $edukasi->media_type) == 'video_upload'): ?> active <?php endif; ?>">
                                        <input type="radio" name="media_type" id="media_type_video_upload"
                                            value="video_upload"
                                            <?php echo e(old('media_type', $edukasi->media_type) == 'video_upload' ? 'checked' : ''); ?>

                                            required> Upload Video
                                    </label>
                                    <label class="btn btn-outline-primary <?php if(old('media_type', $edukasi->media_type) == 'video_url'): ?> active <?php endif; ?>">
                                        <input type="radio" name="media_type" id="media_type_video_url" value="video_url"
                                            <?php echo e(old('media_type', $edukasi->media_type) == 'video_url' ? 'checked' : ''); ?>

                                            required> URL Video
                                    </label>
                                </div>
                                <?php $__errorArgs = ['media_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div id="media_input_container">
                                <div class="form-group media-input" id="foto_group">
                                    <label for="foto">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group media-input" id="video_upload_group">
                                    <label for="video">Upload Video</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="video" name="video" accept="video/*">
                                        <label class="custom-file-label" for="video">Pilih file</label>
                                    </div>
                                    <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group media-input" id="video_url_group">
                                    <label for="video_url">URL Video</label>
                                    <input type="url" class="form-control <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="video_url" name="video_url"
                                        value="<?php echo e(old('video_url', $edukasi->media_type == 'video_url' ? $edukasi->media_path : '')); ?>">
                                    <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div id="current_media_preview" class="mt-3">
                                <?php if($edukasi->media_type === 'foto' && $edukasi->media_path): ?>
                                    <div class="current-media current-foto">
                                        <img src="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>" alt="Current Photo"
                                            class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                <?php elseif($edukasi->media_type === 'video_upload' && $edukasi->media_path): ?>
                                    <div class="current-media current-video">
                                        <video controls class="img-thumbnail" style="max-height: 200px;">
                                            <source src="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <p class="mt-1">Video saat ini: <?php echo e(basename($edukasi->media_path)); ?></p>
                                    </div>
                                <?php elseif($edukasi->media_type === 'video_url' && $edukasi->media_path): ?>
                                    <div class="current-media current-video-url">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="<?php echo e($edukasi->media_path); ?>"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <a href="<?php echo e(route('edukasi.index')); ?>" class="btn btn-secondary ml-2">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .custom-file-label::after {
            content: "Pilih";
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleMediaInputs() {
                const mediaType = $('input[name="media_type"]:checked').val();
                console.log('Toggling media inputs for:', mediaType);
                $('.media-input').hide();
                $('.current-media').hide();
                if (mediaType === 'foto') {
                    $('#foto_group').show();
                    $('.current-foto').show();
                } else if (mediaType === 'video_upload') {
                    $('#video_upload_group').show();
                    $('.current-video').show();
                } else if (mediaType === 'video_url') {
                    $('#video_url_group').show();
                    $('.current-video-url').show();
                }
            }

            $('input[name="media_type"]').change(function() {
                console.log('Media type changed:', $(this).val());
                toggleMediaInputs();
            });

            toggleMediaInputs(); // Call on page load

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $('#editEdukasiForm').submit(function(e) {
                const mediaType = $('input[name="media_type"]:checked').val();
                let isValid = true;

                if (mediaType === 'foto') {
                    if ($('#foto').val() === '' && !$('.current-foto img').length) {
                        alert('Silakan pilih foto.');
                        isValid = false;
                    }
                } else if (mediaType === 'video_upload') {
                    if ($('#video').val() === '' && !$('.current-video video').length) {
                        alert('Silakan pilih video.');
                        isValid = false;
                    }
                } else if (mediaType === 'video_url') {
                    if ($('#video_url').val() === '') {
                        alert('Silakan masukkan URL video.');
                        isValid = false;
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Vista Pramudya\sigemoy\resources\views/edukasi/edit.blade.php ENDPATH**/ ?>