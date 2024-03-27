<?php
// submitComment.php

// Check if the comment form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
} else {
    // Return error for other request methods
    echo json_encode(['error' => 'Invalid request method']);
}


?>
