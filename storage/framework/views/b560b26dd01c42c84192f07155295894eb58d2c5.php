

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Odontogram <?php echo e($pasien->nama); ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-xl-9">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Odontogram</h5>
                        <div class="mb-3">
                            <button id="zoomIn" class="btn btn-sm btn-light"><i class="fas fa-search-plus"></i></button>
                            <button id="zoomOut" class="btn btn-sm btn-light"><i class="fas fa-search-minus"></i></button>
                            <button id="resetZoom" class="btn btn-sm btn-light"><i class="fas fa-sync-alt"></i></button>
                        </div>
                        <div id="odontograma" class="odontogram-container"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="<?php echo e(route('rekam.gigi.edit', $pasienId)); ?>" class="btn btn-primary btn-block mb-3">
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

        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pilihan Edukasi</h5>
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
                            <?php $__empty_1 = true; $__currentLoopData = $all_riwayat_gigi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($riwayat->created_at->format('d-m-Y')); ?></td>
                                    <td><?php echo e($riwayat->elemen_gigi); ?></td>
                                    <td><?php echo e($riwayat->pemeriksaan); ?></td>
                                    <td><?php echo e($riwayat->diagnosa); ?></td>
                                    <td><?php echo e($riwayat->tindakan); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5">Tidak ada data riwayat gigi.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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
                        return "#FFFFFF"; // White color for unselected conditions
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

                var odontogramData = <?php echo json_encode($odontogram_data); ?>;

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
    </script>
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

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Vista Pramudya\sigemoy\resources\views/rekam/odontogram.blade.php ENDPATH**/ ?>