<?php require('partials/head.php') ?>


<!-- this connects the home page to the navigation in the partials -->
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>


<body class="h-full">

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->

      <p>Hello. "<?= $_SESSION['user']['email'] ?? 'Guest' ?> ".welcome to the home page</p>
      
      
</div>
  </main>
  <?php require('partials/footer.php') ?>

  

 