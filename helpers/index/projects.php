<?php

$json = path(['HELPERS', 'index/projects.json'], true);
$cached = json_decode(file_get_contents($json), true) ?? [];
$projects = [];

foreach(glob(path(['PAGES', 'projects/*.md'], true)) as $path) {
	$slug = strtolower(basename($path, '.md'));
	$modified = filemtime($path);
	
	if(!isset($cached[$slug])) {
		$projects[$slug] = [
			'path' => $path,
			'slug' => $slug,
			'created' => filectime($path),
			'modified' => $modified
		];
	} else {
		$projects[$slug] = $cached[$slug];
		
		if($modified != $cached[$slug]['modified']) {
			$projects[$slug]['modified'] = $modified;
		}
	}
}

if($projects != $cached) {
	uasort($projects, function($a, $b) {
		return $b['created'] - $a['created'];
	});
	
	file_put_contents($json, json_encode($projects));
} else {
	$projects = $cached;
}

return array_filter(array_merge([0], $projects));

?>