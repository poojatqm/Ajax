<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <?= $this->Html->css(['cake','material-dashboard', 'nucleo-icons', 'nucleo-svg']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body class="g-sidenav-show  bg-gray-100">
 
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->Html->script('cdnjquery'); ?>
    <?= $this->Html->script('ajaxdata'); ?>
    <?= $this->Html->script('plugins'); ?>
    <?= $this->Html->script('form'); ?>
    </main>
    <?= $this->Html->script(['bootstrap.min', 'perfect-scrollbar.min', 'popper.min', 'smooth-scrollbar.min']) ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>