<?php 
// Redirects URLs
if (array_key_exists('title', $_GET) && preg_match('#^([a-z0-9_-]+)$#i', $_GET['title'])) {
	$title = $_GET['title'];
	if ($title == 'search') {
		if (array_key_exists('q', $_GET) && preg_match('#^([a-z0-9_-]+)$#i', $_GET['q'])) {
			header('Location: /search/'.$_GET['q']);
		} else {
			exit("Je ne veux pas de votre requête (faut bien recherche quelque chose - de valide -, non?). Contactez les Pechotes!");
		}
	} else if (array_key_exists('action', $_GET)) {
		$action = $_GET['action'];
		header('Location: /page/'.$title.'/'.$action);
	} else {
		header('Location: /page/'.$title);
	}
} else {
	exit("Je ne veux pas de votre requête. Contactez les Pechotes!");
}