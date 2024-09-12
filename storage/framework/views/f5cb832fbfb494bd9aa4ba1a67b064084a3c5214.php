

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group col-lg-6" style="float: left">
                    <h2 class="text-primary m-0 font-weight-bold">Data Pasien</h2>
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

                <div class="table-responsive card-table">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($datas->firstItem() + $key); ?></td>
                                    <td><?php echo e($row->nama); ?></td>
                                    <td><?php echo e($row->tmp_lahir); ?>, <?php echo e($row->tgl_lahir); ?></td>
                                    <td><?php echo e($row->alamat_lengkap); ?></td>
                                    <td><?php echo e($row->jk); ?></td>
                                    <td><?php echo e($row->no_hp); ?></td>
                                    <td>
                                        <a href="<?php echo e(Route('rekam.detail', $row->id)); ?>"
                                            class="btn btn-primary shadow btn-xs sharp mr-1">
                                            <i class="fa fa-eye"></i></a>
                                        <a href="<?php echo e(Route('pasien.edit', $row->id)); ?>"
                                            class="btn btn-info shadow btn-xs sharp mr-1">
                                            <i class="flaticon-381-edit"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp delete"
                                            r-link="<?php echo e(Route('pasien.delete', $row->id)); ?>"
                                            r-name="<?php echo e($row->nama); ?>" r-id="<?php echo e($row->id); ?>">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-info">
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                            Menampilkan <?php echo e($datas->firstItem()); ?> sampai <?php echo e($datas->lastItem()); ?> dari <?php echo e($datas->total()); ?> entri
                        </div>
                        <div class="pagination-links">
                            <?php if($datas->hasPages()): ?>
                                <nav>
                                    <ul class="pagination">
                                        
                                        <?php if($datas->onFirstPage()): ?>
                                            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($datas->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</a>
                                            </li>
                                        <?php endif; ?>

                                        
                                        <?php $__currentLoopData = $datas->links()->elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <?php if(is_string($element)): ?>
                                                <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
                                            <?php endif; ?>

                                            
                                            <?php if(is_array($element)): ?>
                                                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($page == $datas->currentPage()): ?>
                                                        <li class="page-item active" aria-current="page"><span class="page-link"><?php echo e($page); ?></span></li>
                                                    <?php else: ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        
                                        <?php if($datas->hasMorePages()): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo e($datas->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</a>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        </div>
                    </div>
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
            confirmButtonColor: '#20d0ce',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus !'
        }).then((result) => {
            if (result.value) {
                window.location = link;
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
.text-primary {
    color: #20d0ce !important;
}

.btn-primary {
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.btn-primary:hover {
    background-color: #1bb5b3;
    border-color: #1bb5b3;
}

.btn-info {
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.btn-info:hover {
    background-color: #1bb5b3;
    border-color: #1bb5b3;
}

.pagination-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding: 10px;
    background-color: #f8f9fa;
    border-radius: 5px;
}

.dataTables_info {
    font-size: 14px;
    color: #6c757d;
}

.pagination-links {
    display: flex;
    justify-content: flex-end;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
}

.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

.page-item:last-child .page-link {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #20d0ce;
    border-color: #20d0ce;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #20d0ce;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.page-link:hover {
    z-index: 2;
    color: #167e7d;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.table thead th {
    color: #20d0ce;
}

.card {
    border-color: #20d0ce;
}

.card-body {
    border-top: 3px solid #20d0ce;
}

.form-control:focus {
    border-color: #20d0ce;
    box-shadow: 0 0 0 0.2rem rgba(32, 208, 206, 0.25);
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.apps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT 2024\Sigemoy\Development\sigemoy\resources\views/pasien/index.blade.php ENDPATH**/ ?>