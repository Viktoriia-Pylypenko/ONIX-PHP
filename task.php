<?php
// Function to generate a unique filename
function generateFilename($title, $author) {
    $timestamp = date('YmdHis');
    $filename = strtolower(str_replace(' ', '-', $title)) . '-' . strtolower(str_replace(' ', '-', $author)) . '-' . $timestamp . '.md';
    return $filename;
}

// Prompt user for input
echo "Enter the blog post title: ";
$title = trim(fgets(STDIN));

echo "Enter the author name: ";
$author = trim(fgets(STDIN));

echo "Enter the category: ";
$category = trim(fgets(STDIN));

// Determine output directory
$outputDirectory = isset($argv[1]) ? rtrim($argv[1], '/') : getcwd();

// Generate filename
$filename = generateFilename($title, $author);

// Generate markdown content
$date = date('Y-m-d');
$content = <<<EOD
---
title: "{$title}"
author: "{$author}"
category: "{$category}"
date: "{$date}"
---

Write your blog post content here...
EOD;

// Write content to file
$filePath = $outputDirectory . '/' . $filename;
file_put_contents($filePath, $content);

// Output file path
echo "Blog post template created successfully at: $filePath\n";
?>
