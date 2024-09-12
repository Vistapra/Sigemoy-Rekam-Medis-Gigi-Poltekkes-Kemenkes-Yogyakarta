

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link rel="stylesheet" href="https://vjs.zencdn.net/7.10.2/video-js.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/edukasi-show.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid edukasi-show">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($edukasi)): ?>
                            <div class="edukasi-content">
                                <div class="edukasi-media">
                                    <?php if($edukasi->media_type === 'foto'): ?>
                                        <a href="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>"
                                            data-lightbox="edukasi-image" data-title="<?php echo e($edukasi->judul); ?>">
                                            <img src="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>"
                                                alt="<?php echo e($edukasi->judul); ?>" class="img-fluid">
                                        </a>
                                    <?php elseif($edukasi->media_type === 'video_upload'): ?>
                                        <video id="my-video" class="video-js vjs-big-play-centered" controls
                                            preload="auto">
                                            <source src="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php elseif($edukasi->media_type === 'video_url'): ?>
                                        <div class="video-container">
                                            <iframe
                                                src="https://www.youtube.com/embed/<?php echo e($edukasi->getYouTubeId($edukasi->video_url)); ?>"
                                                frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    <?php else: ?>
                                        <div class="file-preview">
                                            <i class="fa fa-file fa-5x"></i>
                                            <p><?php echo e($edukasi->media_path); ?></p>
                                            <a href="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>" class="btn btn-primary"
                                                download>Download File</a>
                                            <a href="<?php echo e(asset('storage/' . $edukasi->media_path)); ?>"
                                                data-lightbox="edukasi-file" data-title="<?php echo e($edukasi->judul); ?>"
                                                class="btn btn-secondary">Preview File</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="edukasi-details">
                                    <h2 class="edukasi-title"><?php echo e($edukasi->judul); ?></h2>
                                    <div class="edukasi-meta">
                                        <span class="media-type"><?php echo e(ucfirst($edukasi->media_type)); ?></span>
                                        <span class="rating">4.5/5 <i class="fa fa-star"></i></span>
                                    </div>
                                    <p class="edukasi-description"><?php echo e($edukasi->deskripsi); ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                Data edukasi tidak ditemukan.
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(isset($edukasi)): ?>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="created-date">
                                    <p class="date"><?php echo e($edukasi->created_at->format('d M Y')); ?></p>
                                </div>
                                <?php if(auth()->user()->role_display() == 'Admin'): ?>
                                    <div class="action-buttons">
                                        <a href="<?php echo e(route('edukasi.edit', $edukasi->id)); ?>"
                                            class="btn btn-warning">Edit</a>
                                        <form action="<?php echo e(route('edukasi.destroy', $edukasi->id)); ?>" method="POST"
                                            style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger delete"
                                                data-name="<?php echo e($edukasi->judul); ?>">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                                    <button type="submit" class="btn btn-primary">
                                        <a href="<?php echo e(route('opsiview.opsisetelahedukasi')); ?>"
                                            class="btn btn-primary">Lanjut</a>
                                    </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <style>
        .edukasi-show .card {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .edukasi-content {
            display: flex;
            gap: 20px;
        }

        .edukasi-media {
            flex: 1;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .edukasi-media img,
        .edukasi-media video,
        .edukasi-media iframe {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            cursor: pointer;
        }

        .edukasi-details {
            flex: 1;
            padding: 20px;
        }

        .edukasi-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .edukasi-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .media-type {
            background-color: #f0f0f0;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }

        .rating {
            font-weight: bold;
        }

        .edukasi-description {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .file-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .file-preview i {
            margin-bottom: 10px;
        }

        .file-preview p {
            margin-bottom: 15px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .created-date .date {
            font-size: 18px;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            border-radius: 20px;
            padding: 8px 20px;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 768px) {
            .edukasi-content {
                flex-direction: column;
            }

            .edukasi-media,
            .edukasi-details {
                flex: none;
                width: 100%;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Ingin Menghapus?',
                    text: "Kamu akan menghapus data " + name + "!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bumn7534/sigemoy/resources/views/edukasi/show.blade.php ENDPATH**/ ?>