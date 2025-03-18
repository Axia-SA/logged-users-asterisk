<?php

header('Content-Type: application/json');

$output = shell_exec('asterisk -rx "pjsip show endpoints" 2>&1');

$lines = explode("\n", $output);

$extensions = [];

foreach ($lines as $line) {
    // The above command gets something like: 
    // "  Contact:  102/sip:102@192.168.100.106;transport=udp      10be2ef8c8 Avail         8.197"
    // We only want the extension number, "102" from "102/sip:..."
    
    if (strpos($line, 'Contact:') !== false) {
        // RegEx to capture all rows before '/' character
        if (preg_match('/Contact:\s+([^\s]+)\//', $line, $matches)) {
            $extension = $matches[1];
            $extensions[] = $extension;
        }
    }
}

array_shift($extensions);

$response = [
  "extensions" => $extensions
];

// Send data on JSON format
echo json_encode($response);
