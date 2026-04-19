<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Secure file upload handler
function aite_handle_upload( $file ) {
    // 1. Validation (MIME type, size)
    $allowed_types = ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain'];
    if ( !in_array( $file['type'], $allowed_types ) ) {
        return new WP_Error( 'invalid_file_type', 'Invalid file type.' );
    }

    // 2. Extract content
    $extractor_path = AITE_PLUGIN_DIR . 'includes/extractor.js';
    $cmd = "node " . escapeshellarg($extractor_path) . " " . escapeshellarg($file['tmp_name']) . " " . escapeshellarg($file['type']);
    $content = shell_exec($cmd);
    
    return $content ? trim($content) : new WP_Error( 'extraction_failed', 'Failed to extract content.' );
}
