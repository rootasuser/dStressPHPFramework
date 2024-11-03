#!/usr/bin/env php
<?php

if ($argc < 2) {
    echo "Usage: php create-project.php <project-name>\n";
    exit(1);
}

$projectName = $argv[1];
$baseDir = __DIR__ . '/../templates/project-template';

function copyDirectory($src, $dest) {
    $dir = opendir($src);
    @mkdir($dest);

    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
            $srcFilePath = $src . DIRECTORY_SEPARATOR . $file;
            $destFilePath = $dest . DIRECTORY_SEPARATOR . $file;

            if (is_dir($srcFilePath)) {
                copyDirectory($srcFilePath, $destFilePath);
            } else {
                copy($srcFilePath, $destFilePath);
            }
        }
    }
    closedir($dir);
}

$newProjectPath = getcwd() . DIRECTORY_SEPARATOR . $projectName;
if (!file_exists($newProjectPath)) {
    mkdir($newProjectPath, 0755, true);
    copyDirectory($baseDir, $newProjectPath);
    echo "Project '$projectName' created successfully at $newProjectPath\n";
} else {
    echo "Error: Directory '$projectName' already exists.\n";
}
