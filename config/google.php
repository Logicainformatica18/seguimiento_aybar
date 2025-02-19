<?php
return [
    'application_name' => env('GOOGLE_APPLICATION_NAME', 'Your Application Name'),
    'credentials_path' => storage_path('app/google/credentials.json'),
    'token_path' => storage_path('app/google/token.json'),
    'scopes' => [
        \Google_Service_Sheets::SPREADSHEETS_READONLY,
        \Google_Service_Drive::DRIVE_READONLY,
    ],
];

