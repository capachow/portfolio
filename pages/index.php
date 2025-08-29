<?php

if(path(1) == 'project') {
  $projects = array_column($projects, null, 'slug');
  $project = $content($projects[path(2)]);

  define('ROUTES', [
    ['project', array_keys($projects)]
  ]);

  if(array_key_exists('heading', $project)) {
    relay('TITLE', trim(ltrim($project['heading'], '#')));
  }
} else if(path(1)) {
  define('ROUTES', [path(1)]);
  define('REDIRECT', '/404/');
} else {
  $projects = array_map($content, $projects);
}

?>

<?php if(path(1) == 'project') { ?>
  <aside id="examples">
    <?php foreach(glob(path(['IMAGES', "projects/{$project['slug']}/*.jpg"], true)) as $path) { ?>
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
  <article id="details">
    <?= $markdown($project['content']); ?>
  </article>
<?php } else { ?>
  <aside id="projects">
    <?php foreach($projects as $project) { ?>
      <figure>
        <a href="<?= path("/project/{$project['slug']}/"); ?>">
          <img src="<?= path(['IMAGES', "projects/{$project['slug']}.jpg"]); ?>" alt="<?= $project['slug']; ?>" />
        </a>
        <figcaption>
          <h3 class="bold"><?= $project['heading']; ?></h3>
        </figcaption>
      </figure>
    <?php } ?>
  </aside>
<?php } ?>