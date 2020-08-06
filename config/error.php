<?php

/*
     _______________________________________
    |                                       |
    | Map you error page on templates/...   |
    |_______________________________________|
 */
return [
    403 => 'path/to/403_error', // Permission denied
    404 => 'path/to/404_error', // Not found
    405 => 'path/to/405_error', // Not allowed
    500 => 'path/to/500_error', // Internal server error
    503 => 'path/to/503_error'  // Maintenance status
];
