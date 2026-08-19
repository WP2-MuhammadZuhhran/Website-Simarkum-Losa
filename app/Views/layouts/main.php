<?= $this->include('layouts/header') ?>

<?= $this->include('layouts/navbar') ?>

<?= $this->include('layouts/sidebar') ?>


<div class="content-wrapper">

    <section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1><?= esc($title ?? '') ?></h1>

            </div>

            <div class="col-sm-6">

                <?= $this->renderSection('breadcrumb') ?>

            </div>

        </div>

    </div>

</section>
    <section class="content">

        <?= $this->renderSection('content') ?>

    </section>

</div>

<?= $this->include('layouts/footer') ?>