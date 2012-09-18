<?php

include_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'SplClassLoader.php');

$classLoader = new SplClassLoader(null, realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));
$classLoader->register();