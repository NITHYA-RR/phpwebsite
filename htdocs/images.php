<?php
include __DIR__ . "/libs/load.php";

$upload_path = get_config('upload_path');
$fname = $_GET['name'];
$image_path = $upload_path . $fname;
$image_path = str_replace('..', '', $image_path); // Prevent directory traversal attacks
// Check if the file exists
if (!file_exists($image_path)) {
    die("File not found. Resolved path: " . $image_path);
}

// Get the file extension and determine the MIME type
$ext = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
$mime_types = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'webp' => 'image/webp',
    'bmp' => 'image/bmp',
    'svg' => 'image/svg+xml'
];

$content_type = $mime_types[$ext] ?? 'application/octet-stream';

// Set the appropriate headers to serve the image
header("Content-Type: $content_type");
header("Content-Length: " . filesize($image_path));

// Output the image content
readfile($image_path);
?>




