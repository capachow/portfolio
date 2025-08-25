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
        <figure>
          <img src="<?= str_replace(path('', true), '/', $path); ?>" />
        </figure>
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