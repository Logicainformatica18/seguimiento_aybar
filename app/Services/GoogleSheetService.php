<?php
namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Exception;

class GoogleSheetService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName(config('google.application_name'));
        $this->client->setScopes(config('google.scopes'));
        $this->client->setAuthConfig(config('google.credentials_path'));
        $this->client->setAccessType('offline');
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getSheetData($spreadsheetId, $range)
    {
        try {
            $service = new Google_Service_Sheets($this->client);
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            return $response->getValues();
        } catch (Exception $e) {
            throw new Exception('Google Sheets API error: ' . $e->getMessage());
        }
    }
    public function getSheetDataWithHeaders($spreadsheetId, $range)
    {
        $data = $this->getSheetData($spreadsheetId, $range);
        if (empty($data)) {
            return [];
        }

        $headers = array_shift($data);
        $result = [];

        foreach ($data as $row) {
            $rowData = [];
            foreach ($headers as $index => $header) {
                $rowData[$header] = $row[$index] ?? null;
            }
            $result[] = $rowData;
        }

        return $result;
    }
}
