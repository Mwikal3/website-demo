<?php require base_path('views/partials/head.php') ?>


<!-- this connects the home page to the navigation in the partials -->
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<body class="h-full">

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <form method="POST" action="/note">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?> ">

        <label for "body">Description</label>
        <div>
          <textarea id="body" name="body" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <?= $note['body'] ?> 
          </textarea>

          <?php if (isset($errors['body'])) : ?>
            <p class="text-sm text-red-500">
              <?= $errors['body'] ?>
            </p>
          <?php endif; ?>
        </div>
        <p class="mt-3">
          <button type="submit" class="bg-blue-500 text-white p-2 rounded-md shadow-lg hover:bg-blue-600">
            Update
          </button>

          <a href="/notes" class="bg-red-500 text-white p-2 rounded-md shadow-lg hover:bg-red-600">Cancel</a>
        </p>
      </form>
    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>