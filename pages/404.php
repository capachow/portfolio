<article id="details">
  <?= $markdown([
    "# 404 Not Found",
    "### Uh oh",
    "It seems you have stumbled onto a page that doesn't even exist. Lucky for you though, it's also a secret part of this website where I post some miscellaneous artwork."
  ]); ?>
</article>
<aside id="examples">
  <?php foreach(glob(path(['IMAGES', '404/*.jpg'], true)) as $path) { ?>
      <?php if(file_exists($video = str_replace('.jpg', '.mp4', $path))) { ?>
        <video poster="<?= str_replace(path('', true), '/', $path); ?>" controls="true">
          <source src="<?= str_replace(path('', true), '/', $video); ?>" type="video/mp4" />
        </video>
      <?php } else { ?>
        <figure>
          <img src="<?= str_replace(path('', true), '/', $path); ?>" />
        </figure>
      <?php } ?>
  <?php } ?>
</aside>