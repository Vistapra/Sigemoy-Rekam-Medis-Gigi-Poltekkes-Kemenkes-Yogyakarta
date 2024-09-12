

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('rekam.partial.modal-pemeriksaan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rekam.partial.modal-tindakan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rekam.partial.modal-diagnosa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rekam.partial.modal-resep-obat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-sm-12 col-lg-5">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black mb-0">Detail Pasien</h4>
                            <div class="dropdown">
                                RM# <?php echo e($pasien->no_rm); ?>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media mb-4 align-items-center">
                                <div class="media-body">
                                    <input type="hidden" id="pasien_id" value="<?php echo e($pasien->id); ?>">
                                    <input type="hidden" id="rekam_id" value="<?php echo e($rekamLatest ? $rekamLatest->id : ''); ?>">

                                    <h3 class="fs-18 font-w600 mb-1">
                                        <a href="javascript:void(0)" class="text-black"><?php echo e($pasien->nama); ?></a>
                                    </h3>
                                    <h4 class="fs-14 font-w600 mb-1"><?php echo e($pasien->tmp_lahir . ', ' . $pasien->tgl_lahir); ?>

                                    </h4>
                                    <?php
                                        $b_day = \Carbon\Carbon::parse($pasien->tgl_lahir);
                                        $now = \Carbon\Carbon::now();
                                    ?>
                                    <h4 class="fs-14 font-w600 mb-1"><?php echo e('Usia : ' . $b_day->diffInYears($now)); ?></h4>
                                    <h4 class="fs-14 font-w600 mb-1"><?php echo e($pasien->jk . ', ' . $pasien->status_menikah); ?></h4>
                                    <span class="fs-14"><?php echo e($pasien->alamat_lengkap); ?></span>
                                    <span
                                        class="fs-14"><?php echo e($pasien->kelurahan . ', ' . $pasien->kecamatan . ', ' . $pasien->kabupaten . ', ' . $pasien->kewarganegaraan); ?></span>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-7">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="fs-20 text-black mb-0">Info Pasien</h4>
                            <a href="<?php echo e(route('pasien.edit', $pasien->id)); ?>" class="btn btn-info btn-xs">
                                <i class="flaticon-381-edit"></i> Edit Pasien
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-xl-12 col-xxl-6 col-sm-6">
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5F74BF" />
                                            </svg>
                                            No HP
                                        </span>
                                        <div class="col-6 p-0">
                                            <p><?php echo e($pasien->no_hp); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3 align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5F74BF" />
                                            </svg>
                                            Alergi
                                        </span>
                                        <div class="col-6 p-0">
                                            <p><?php echo e($pasien->alergi); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="fs-12 col-6 p-0 text-black">
                                            <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19" height="19" fill="#5FBF91" />
                                            </svg>
                                            File General
                                        </span>
                                        <div class="col-6 p-0">
                                            <?php if($pasien->general_uncent != null): ?>
                                                <a href="<?php echo e($pasien->getGeneralUncent()); ?>" target="_blank"
                                                    class="btn btn-info btn-xs">
                                                    Lihat Data
                                                </a>
                                            <?php else: ?>
                                                Belum Tersedia
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'Dokter'): ?>
            <div class="col-xl-12 mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Odontogram <?php echo e($pasien->nama); ?></h5>
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="mb-3">
                                    <button id="zoomIn" class="btn btn-sm btn-light"><i
                                            class="fas fa-search-plus"></i></button>
                                    <button id="zoomOut" class="btn btn-sm btn-light"><i
                                            class="fas fa-search-minus"></i></button>
                                    <button id="resetZoom" class="btn btn-sm btn-light"><i
                                            class="fas fa-sync-alt"></i></button>
                                </div>
                                <div id="odontograma" class="odontogram-container"
                                    data-odontogram="<?php echo e(json_encode($odontogram_data)); ?>"></div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <a href="<?php echo e(route('rekam.gigi.edit', $pasien->id)); ?>"
                                            class="btn btn-primary btn-block mb-3">
                                            <i class="fas fa-edit"></i> Edit Odontogram
                                        </a>
                                        <h5 class="card-title mb-3">Panduan Odontogram</h5>
                                        <table class="table table-sm table-hover">
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $kondisi_gigi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kondisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><span class="badge"
                                                                style="background-color: <?php echo e($kondisi->color); ?>"><?php echo e($kondisi->kode); ?></span>
                                                        </td>
                                                        <td><?php echo e($kondisi->nama); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="2">Tidak ada data kondisi gigi.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Pilihan Edukasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-riwayat" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Elemen Gigi</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Diagnosa</th>
                                        <th>Pilihan Edukasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $riwayattindakan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($riwayat->created_at ? $riwayat->created_at->format('d-m-Y') : now()->format('d-m-Y')); ?>

                                            </td>
                                            <td><?php echo e($riwayat->elemen_gigi ?? 'Tidak ada data'); ?></td>
                                            <td><?php echo $riwayat->pemeriksaan ? strip_tags($riwayat->pemeriksaan) : 'Tidak ada data'; ?></td>
                                            <td><?php echo $riwayat->diagnosa ? $riwayat->diagnosis->code . ' - ' . $riwayat->diagnosis->name_id : 'Tidak ada data'; ?></td>
                                            <td><?php echo $riwayat->tindakan ? $riwayat->tindak->kode . ' - ' . $riwayat->tindak->nama : 'Tidak ada data'; ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data riwayat gigi.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(auth()->user()->role_display() == 'Admin' || auth()->user()->role_display() == 'KaderKesehatan'): ?>
            <div class="col-xl-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekam Medis Kader</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kader Kesehatan</th>
                                        <th>Kondisi Gigi</th>
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $pasien->rekamMedisKader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekamMedisKader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($rekamMedisKader->created_at->format('Y-m-d')); ?></td>
                                            <td><?php echo e($rekamMedisKader->user->name); ?></td>
                                            <td><?php echo e($rekamMedisKader->namaKondisiGigi->nama_kondisi); ?></td>
                                            <td><?php echo e($rekamMedisKader->total); ?></td>
                                            <td><?php echo e($rekamMedisKader->keterangan ?? 'Tidak ada keterangan'); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('rekammediskaderkesehatan.edit', $rekamMedisKader->id)); ?>"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form
                                                    action="<?php echo e(route('rekammediskaderkesehatan.destroy', $rekamMedisKader->id)); ?>"
                                                    method="POST" style="display: inline-block;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data rekam medis kader</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive card-table">
                        <div class="form-group col-lg-6" style="float: right">
                            <form method="get" action="<?php echo e(url()->current()); ?>">
                                <div class="row">
                                    
                                </div>
                            </form>
                        </div>
                        <table class="table table-responsive-md table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Periksa</th>
                                    <th>Dokter</th>
                                    <th>Keluhan (S)</th>
                                    <th>Pemeriksaan (O)</th>
                                    <th>Diagnosa (A)</th>
                                    <th>Pilihan Edukasi (P)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rekam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($rekam->firstItem() + $key); ?></td>
                                        <td><?php echo e($row->tgl_rekam); ?></td>
                                        <td><?php echo e(Auth::user()->name); ?></td>
                                        <td><?php echo e($row->keluhan); ?></td>
                                        <td>
                                            <?php echo $row->pemeriksaan; ?>

                                            <?php if($row->pemeriksaan_file != null): ?>
                                                <br>
                                                <a target="_blank" href="<?php echo e($row->getFilePemeriksaan()); ?>">
                                                    <u style="color:rgb(28, 85, 231);">Lihat Foto</u>
                                                </a>
                                            <?php endif; ?>
                                            <?php if(auth()->user()->role_display() == 'Dokter' ||
                                                    auth()->user()->role_display() == 'Admin' ||
                                                    auth()->user()->role_display() == 'KaderKesehatan'): ?>
                                                <br>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addPemeriksaan" data-id="<?php echo e($row->id); ?>"
                                                    data-tanggal="<?php echo e($row->tgl_rekam); ?>"
                                                    data-pemeriksaan="<?php echo e($row->pemeriksaan); ?>"
                                                    class="btn btn-info btn-xs addPemeriksaan mt-2">
                                                    <i class="flaticon-381-pencil"></i> Object
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <table class="table table-sm">
                                                <?php $__currentLoopData = $row->diagnosa(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($item->diagnosis->code); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(route('rekam.diagnosa.delete', $item->id)); ?>"
                                                                class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><?php echo e($item->diagnosis->name_id); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                            <?php if(auth()->user()->role_display() == 'Dokter' ||
                                                    auth()->user()->role_display() == 'Admin' ||
                                                    auth()->user()->role_display() == 'KaderKesehatan'): ?>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addDiagnosa" data-id="<?php echo e($row->id); ?>"
                                                    data-tanggal="<?php echo e($row->tgl_rekam); ?>"
                                                    data-tindakan="<?php echo e($row->tindakan); ?>"
                                                    class="btn btn-primary btn-xs addDiagnosa mt-2">
                                                    <i class="flaticon-381-pencil"></i> Assessment
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->tindakan; ?>

                                            <?php if($row->tindakan_file != null): ?>
                                                <br>
                                                <a target="_blank" href="<?php echo e($row->getFileTindakan()); ?>">
                                                    <u style="color:rgb(28, 85, 231);">Lihat Foto</u>
                                                </a>
                                            <?php endif; ?>
                                            <?php if(auth()->user()->role_display() == 'Dokter' ||
                                                    auth()->user()->role_display() == 'Admin' ||
                                                    auth()->user()->role_display() == 'KaderKesehatan'): ?>
                                                <br>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addTindakan" data-id="<?php echo e($row->id); ?>"
                                                    data-tanggal="<?php echo e($row->tgl_rekam); ?>"
                                                    data-tindakan="<?php echo e($row->tindakan); ?>"
                                                    class="btn btn-success btn-xs addTindakan mt-2">
                                                    <i class="flaticon-381-pencil"></i> Plan
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" aria-live="polite">
                            Showing <?php echo e($rekam->firstItem()); ?> to <?php echo e($rekam->perPage() * $rekam->currentPage()); ?> of
                            <?php echo e($rekam->total()); ?> entries
                        </div>
                        <?php echo e($rekam->appends(request()->except('page'))->links()); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Data Survey Pasien</h4>
                </div>
                <div class="card-body">
                    <?php if($pasien->jawabanPasien->isNotEmpty()): ?>
                        <?php $__currentLoopData = $pasien->jawabanPasien->groupBy('pertanyaan.kategori.nama_kategori'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori => $jawaban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h5 class="mt-4"><?php echo e($kategori); ?></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jawaban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($item->pertanyaan->teks_pertanyaan); ?></td>
                                                <td><?php echo e($item->opsiJawaban->teks_opsi ?? 'Tidak dijawab'); ?></td>
                                                <td><?php echo e($item->keterangan ?? 'Tidak ada keterangan'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <p>Pasien belum mengisi kuisioner.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('header'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('odontograma/css/jquery.svg.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('odontograma/css/odontograma.css')); ?>">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
        <style>
            .odontogram-container {
                position: relative;
                width: 100%;
                height: 400px;
                overflow: hidden;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            #odontograma svg {
                transition: transform 0.3s ease;
            }

            .btn-light {
                margin-right: 5px;
            }

            .btn-light i {
                font-size: 1.2em;
            }
        </style>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(asset('vendor/ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('odontograma/js/jquery.svg.min.js')); ?>"></script>
        <script src="<?php echo e(asset('odontograma/js/jquery.svggraph.min.js')); ?>"></script>
        <script>
            jQuery(function() {
                var currentZoom = 1;
                var zoomStep = 0.1;
                var maxZoom = 3;
                var minZoom = 0.5;

                function setZoom(zoom) {
                    currentZoom = Math.max(minZoom, Math.min(maxZoom, zoom));
                    updateTransform();
                }

                function updateTransform() {
                    $('#odontograma svg').css('transform', `scale(${currentZoom})`);
                }

                function getColorForCondition(condition) {
                    switch (condition) {
                        case "_":
                            return "#bda25c";
                        case "∑":
                            return "#fe8024";
                        case "Ο":
                            return "#ff2e2e";
                        case "X":
                            return "#b1b1b1";
                        case "V":
                            return "#2d28ff";
                        case "⚫":
                            return "#2bc155";
                        default:
                            return "#FFFFFF";
                    }
                }

                function drawDiente(svg, parentGroup, diente) {
                    if (!diente) throw new Error('Error: no se ha especificado el diente.');

                    var x = diente.x || 0,
                        y = diente.y || 0;
                    var color = getColorForCondition(diente.condition);
                    var stroke = 'navy';
                    var strokeWidth = 0.5;

                    var dienteGroup = svg.group(parentGroup, {
                        transform: 'translate(' + x + ',' + y + ')'
                    });

                    // Draw tooth parts
                    svg.polygon(dienteGroup, [
                        [0, 0],
                        [20, 0],
                        [15, 5],
                        [5, 5]
                    ], {
                        fill: color,
                        stroke: stroke,
                        strokeWidth: strokeWidth
                    });
                    svg.polygon(dienteGroup, [
                        [5, 15],
                        [15, 15],
                        [20, 20],
                        [0, 20]
                    ], {
                        fill: color,
                        stroke: stroke,
                        strokeWidth: strokeWidth
                    });
                    svg.polygon(dienteGroup, [
                        [15, 5],
                        [20, 0],
                        [20, 20],
                        [15, 15]
                    ], {
                        fill: color,
                        stroke: stroke,
                        strokeWidth: strokeWidth
                    });
                    svg.polygon(dienteGroup, [
                        [0, 0],
                        [5, 5],
                        [5, 15],
                        [0, 20]
                    ], {
                        fill: color,
                        stroke: stroke,
                        strokeWidth: strokeWidth
                    });
                    svg.polygon(dienteGroup, [
                        [5, 5],
                        [15, 5],
                        [15, 15],
                        [5, 15]
                    ], {
                        fill: color,
                        stroke: stroke,
                        strokeWidth: strokeWidth
                    });

                    svg.text(dienteGroup, 6, 30, diente.id.toString(), {
                        fill: 'navy',
                        stroke: 'navy',
                        strokeWidth: 0.1,
                        style: 'font-size: 6pt;font-weight:normal'
                    });

                    $(dienteGroup).hover(
                        function() {
                            $(this).attr('opacity', 0.8);
                        },
                        function() {
                            $(this).attr('opacity', 1);
                        }
                    );
                }

                function renderSvg() {
                    var svg = $('#odontograma').svg('get').clear();
                    var parentGroup = svg.group({
                        transform: 'scale(1.5)'
                    });

                    var odontogramData = JSON.parse($('#odontograma').attr('data-odontogram'));

                    var toothPositions = [{
                            start: 18,
                            end: 11,
                            x: 0,
                            y: 0,
                            increment: -1
                        },
                        {
                            start: 21,
                            end: 28,
                            x: 210,
                            y: 0,
                            increment: 1
                        },
                        {
                            start: 48,
                            end: 41,
                            x: 0,
                            y: 120,
                            increment: -1
                        },
                        {
                            start: 31,
                            end: 38,
                            x: 210,
                            y: 120,
                            increment: 1
                        },
                        {
                            start: 55,
                            end: 51,
                            x: 75,
                            y: 40,
                            increment: -1
                        },
                        {
                            start: 61,
                            end: 65,
                            x: 210,
                            y: 40,
                            increment: 1
                        },
                        {
                            start: 85,
                            end: 81,
                            x: 75,
                            y: 80,
                            increment: -1
                        },
                        {
                            start: 71,
                            end: 75,
                            x: 210,
                            y: 80,
                            increment: 1
                        }
                    ];

                    toothPositions.forEach(function(position) {
                        for (var i = position.start; position.increment > 0 ? i <= position.end : i >= position
                            .end; i += position.increment) {
                            var x = position.x + (Math.abs(i - position.start) * 25);
                            drawDiente(svg, parentGroup, {
                                id: i,
                                x: x,
                                y: position.y,
                                condition: odontogramData[i] || null
                            });
                        }
                    });
                }

                $(document).ready(function() {
                    $('#odontograma').svg({
                        settings: {
                            width: '100%',
                            height: '100%'
                        }
                    });

                    renderSvg();

                    $('#zoomIn').click(function() {
                        setZoom(currentZoom + zoomStep);
                    });
                    $('#zoomOut').click(function() {
                        setZoom(currentZoom - zoomStep);
                    });
                    $('#resetZoom').click(function() {
                        currentZoom = 1;
                        updateTransform();
                    });

                    $(window).resize(renderSvg);

                    $('#table-riwayat').DataTable({
                        responsive: true,
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
                        }
                    });
                });

                var table = $('#icd-table').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: true,
                    paging: true,
                    select: false,
                    pageLength: 5,
                    lengthChange: false,
                    ajax: "<?php echo e(route('icd.data')); ?>",
                    columns: [{
                            data: 'action',
                            name: 'action'
                        },
                        {
                            data: 'code',
                            name: 'code'
                        },
                        {
                            data: 'name_id',
                            name: 'name_id'
                        }
                    ]
                });
            });

            CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
            CKEDITOR.replace('editor', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            CKEDITOR.replace('editor2', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            CKEDITOR.replace('editor3', {
                height: '250px',
                filebrowserUploadMethod: 'form',
                toolbarGroups: [{
                        name: 'document',
                        groups: ['mode', 'document']
                    },
                    {
                        name: 'clipboard',
                        groups: ['clipboard', 'undo']
                    },
                ]
            });

            $(document).on("click", ".addPemeriksaan", function() {
                var rekamId = $(this).data('id');
                var pemeriksaan = $(this).data('pemeriksaan');
                $(".modal-body #rekamId").val(rekamId);
                if (pemeriksaan == "--") {
                    pemeriksaan = '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">' +
                        '<tbody>' +
                        '<tr><td style="width:20%">TD</td><td style="width:2%">:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Temp</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Resp</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>Nadi</td><td>:</td><td>&nbsp;</td></tr>' +
                        '<tr><td>BB</td><td>:</td><td>&nbsp;</td></tr>' +
                        '</tbody>' +
                        '</table>' +
                        '<p>&nbsp;</p>';
                }
                CKEDITOR.instances.editor.setData(pemeriksaan);
            });

            $(document).on("click", ".pilihIcd", function() {
                var diagnosa_id = $(this).data('id');
                var rekam_id = $("#rekam_id").val();
                var pasien_id = $("#pasien_id").val();
                var token = '<?php echo e(csrf_token()); ?>';
                $("#addDiagnosa").modal('hide');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('diagnosa.update')); ?>",
                    data: {
                        rekam_id: rekam_id,
                        pasien_id: pasien_id,
                        diagnosa: diagnosa_id,
                        _token: token
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });

            $(document).on("click", ".addTindakan", function() {
                var rekamId = $(this).data('id');
                var tindakan = $(this).data('tindakan');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor2.setData(tindakan);
            });

            $(document).on("click", ".addDiagnosa", function() {
                var rekamId = $(this).data('id');
                var diagnosa = $(this).data('diagnosa');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor.setData(diagnosa);
            });

            $(document).on("click", ".addResep", function() {
                var rekamId = $(this).data('id');
                var resep = $(this).data('resep');
                $(".modal-body #rekamId").val(rekamId);
                CKEDITOR.instances.editor3.setData(resep);
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bumn7534/sigemoy/resources/views/rekam/detail-rekam.blade.php ENDPATH**/ ?>