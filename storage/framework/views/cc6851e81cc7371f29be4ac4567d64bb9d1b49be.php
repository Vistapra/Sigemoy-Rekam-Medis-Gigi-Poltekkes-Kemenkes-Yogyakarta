<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>" class="ai-icon">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <?php
                $userRole = auth()->user()->role_display();
                $isAdmin = $userRole == 'Admin';
                $isDokterOrKader = in_array($userRole, ['Dokter', 'KaderKesehatan']);
            ?>

            <?php if($isAdmin): ?>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)">
                        <i class="flaticon-381-user"></i>
                        <span class="nav-text">Petugas</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo e(route('dokter')); ?>">Terapis Gigi</a></li>
                        <li><a href="<?php echo e(route('petugas')); ?>">Kader Kesehatan</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($isAdmin || $isDokterOrKader): ?>
                <li>
                    <a href="<?php echo e(route('pasien.add')); ?>" class="ai-icon">
                        <i class="flaticon-381-television"></i>
                        <span class="nav-text">Pasien</span>
                    </a>
                </li>
            <?php endif; ?>

            <li>
                <a href="<?php echo e(route('toga.index')); ?>" class="ai-icon">
                    <i class="flaticon-381-notebook"></i>
                    <span class="nav-text">Toga</span>
                </a>
            </li>

            <?php if($isAdmin): ?>
                <li>
                    <a href="<?php echo e(route('edukasi.index')); ?>" class="ai-icon">
                        <i class="flaticon-381-notebook"></i>
                        <span class="nav-text">Edukasi</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($isAdmin): ?>
                <li>
                    <a href="<?php echo e(route('pasien')); ?>" class="ai-icon">
                        <i class="flaticon-381-notebook"></i>
                        <span class="nav-text">Data Pasien</span>
                    </a>
                </li>

                <!--<li>-->
                <!--    <a href="<?php echo e(route('rekam', ['tab' => 2])); ?>" class="ai-icon">-->
                <!--        <i class="flaticon-381-notepad"></i>-->
                <!--        <span class="nav-text">Rekam Medis Terapis</span>-->
                <!--    </a>-->
                <!--</li>-->

                <!--<li>-->
                <!--    <a href="<?php echo e(route('rekammediskaderkesehatan.index')); ?>" class="ai-icon">-->
                <!--        <i class="flaticon-381-notepad"></i>-->
                <!--        <span class="nav-text">Rekam Medis Kader</span>-->
                <!--    </a>-->
                <!--</li>-->
            <?php endif; ?>

            <?php if($isAdmin): ?>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void(0)">
                        <i class="flaticon-381-notebook-4"></i>
                        <span class="nav-text">Master Data</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?php echo e(route('tindakan.index')); ?>">Pilihan Edukasi</a></li>
                        <li><a href="<?php echo e(route('icd.index')); ?>">ICD</a></li>
                        <li><a href="<?php echo e(route('kuisioner.index')); ?>">Kuisioner</a></li>
                        <li><a href="<?php echo e(route('rekammediskader.index')); ?>">Kondisi Gigi</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>


        <div class="copyright">
            <p><strong>SIGEMOY</strong> © 2024 POLTEKKES KEMENKES YOGYAKARTA</p>
        </div>
    </div>
</div>
<?php /**PATH /home/bumn7534/sigemoy/resources/views/layout/partial/sidebar.blade.php ENDPATH**/ ?>