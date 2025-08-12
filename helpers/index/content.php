<?php

$pages = path(['PAGES'], true);

return function($project) use($pages) {
  if(defined('LOCALE')) {
		$path = substr($project['path'], strlen($pages));
		$locale = path(['LOCALES', LOCALE['LANGUAGE']], true);
		
		if(is_file($path = "{$locale}{$path}")) {
	  	$project['path'] = $path;
		}
	}
	
	$project['content'] = file_get_contents($project['path']);
	$line = strtok($project['content'], "\n");

	foreach([
		'heading' => '#',
		'category' => '###'
	] as $type => $syntax) {
		if(substr(ltrim($line), 0, strlen($syntax)) == $syntax) {
			$project[$type] = ltrim(str_replace($syntax, '', $line));
			$line = strtok("\n");
		} else {
			$project[$type] = null;
		}
	}

  return $project;
};

?>