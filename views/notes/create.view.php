<?php require base_path('views/partials/head.php') ?>


<!-- this connects the home page to the navigation in the partials -->
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<!-- <body class="h-full"> -->

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->


      <form method="POST" action="/notes">
        <label for "body">Description</label>
        <div>
          <textarea id="body" name="body" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?= $_POST['body'] ?? '' ?> 
          </textarea>

          <?php if (isset($errors['body'])) : ?>
            <p class="text-sm text-red-500">
              <?= $errors['body'] ?>
            </p>
          <?php endif; ?>
        </div>
        <p><button type="submit">create
          </button>
        </p>
      </form>
    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>