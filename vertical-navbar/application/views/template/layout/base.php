<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php $this->load->view('template/include/sidebar') ?>
        <div id="main" class='layout-navbar'>
            <?php $this->load->view('template/include/header') ?>
            <div id="main-content">
                <?php $this->load->view($content) ?>

                <?php $this->load->view('template/include/footer'); ?>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/mazer.js') ?>"></script>
</body>

</html>