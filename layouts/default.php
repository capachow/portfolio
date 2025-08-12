<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php if(defined('TITLE')) echo TITLE . ' - '; ?>Joshua Britt</title>
	<link rel="shortcut icon" href="<?= path('/images/icon.svg'); ?>" />
	<?= STYLES; ?>
  </head>
  <body>
	<main>
		<input id="tab" type="checkbox" />
		<label id="name" for="tab">
			<dfn>
				<h2 class="bold">Joshua Britt</h2>
				<h4 class="light">Creative Instigator</h4>
			</dfn>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 152 98">
				<path d="M140.05 0H0v98h140.05c28.22 0-2.38-21.94-2.38-49s30.6-49 2.38-49ZM60.07 38.21c0 2.72-2.21 4.93-4.93 4.93-2.72 0-4.93-2.21-4.93-4.93v-4.29c0-2.72 2.21-4.93 4.93-4.93 2.72 0 4.93 2.21 4.93 4.93v4.29Zm12.57 25.86c0 2.72-2.21 4.93-4.93 4.93s-4.93-2.21-4.93-4.93V33.93c0-2.72 2.21-4.93 4.93-4.93s4.93 2.21 4.93 4.93v30.14Zm12.57 0c0 2.72-2.21 4.93-4.93 4.93s-4.93-2.21-4.93-4.93V33.93c0-2.72 2.21-4.93 4.93-4.93s4.93 2.21 4.93 4.93v30.14Zm12.58 0c0 2.72-2.21 4.93-4.93 4.93-2.72 0-4.93-2.21-4.93-4.93V50.78c0-2.72 2.21-4.93 4.93-4.93 2.72 0 4.93 2.21 4.93 4.93v13.29Z" fill="#3c3a3b" />
			</svg>
		</label>
		<header>
			<input id="nav" type="checkbox" />
			<menu class="h3">
				<?php if(path(1)) { ?>
					<?= $anchor('Back', path('/')); ?>
				<?php } ?>
				<label for="nav">Menu</label>
			</menu>
			<nav id="site">
				<?= $anchor('About', path('/about/')); ?>
				<?= $anchor('GitHub', 'https://github.com/capachow', [
					'target' => '_blank'
				]); ?>
				<?= $anchor('Contact', 'mailto:joshua@britt.email'); ?>
				<?= $anchor('Resume', path('/files/resume.pdf'), [
					'target' => '_blank'
				]); ?>
			</nav>
		</header>
		<section>
			<?= CONTENT; ?>
		</section>
		<footer>
			<menu class="h5">
				<?php if(path(1)) { ?>
					<?= $anchor('Back', path('/'), [
						'class' => 'upper'
					]); ?>
				<?php } ?>
				<div>&copy; <?= date('Y'); ?> Made with <?= $anchor('Arcane', 'https://arcane.dev', [
					'target' => '_blank'
				]); ?> & <?= $anchor('Coffee', 'https://buymeacoffee.com/capachow', [
					'target' => '_blank'
				]); ?></div>
			</menu>
		</footer>
		<?= $anchor('Stumble', path('/404'), [
			'id' => '404'
		]); ?>
	</main>
	<?= SCRIPTS; ?>
  </body>
</html>