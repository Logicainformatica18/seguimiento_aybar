<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chat'); // La vista del chatbot
    }

    public function chat(Request $request)
    {
        $serverUrl = 'http://localhost:1234/v1/chat/completions'; // URL del endpoint en LM Studio
        $userInput = $request->input('message'); // Captura el mensaje del usuario desde la solicitud

        // Validar que el mensaje no esté vacío
        if (empty($userInput)) {
            return response()->json([
                'reply' => 'Por favor, ingresa un mensaje válido.',
            ], 400);
        }

        try {
            // Configuración del cliente HTTP
            $client = new Client();

            // Realizar la solicitud POST al endpoint del modelo en LM Studio
            $response = $client->post($serverUrl, [
                'headers' => [
                    'Content-Type' => 'application/json', // Encabezado requerido
                ],
                'json' => [
                    'model' => 'hugging-quants/Llama-3.2-1B-Instruct-Q8_0-GGUF', // Modelo especificado en tu ejemplo
                    'messages' => [
                        [
                            "role" => "assistant",
                            "content" => "",
                        ],
                        [
                            'role' => 'user',
                            'content' => $userInput, // Mensaje del usuario
                        ],
                    ],
                    'temperature' => 0.7, // Creatividad en las respuestas
                    'max_tokens' => -1,  // Sin límite de tokens
                    'stream' => false,   // Respuesta completa en una única solicitud
                ],
            ]);

            // Decodificar la respuesta JSON
            $result = json_decode($response->getBody(), true);

            // Extraer el contenido generado por el modelo
            $reply = $result['choices'][0]['message']['content'] ?? 'No se obtuvo respuesta del modelo.';

            // Retornar la respuesta en formato JSON al cliente
            return response()->json([
                'reply' => $reply,
            ]);

        } catch (\Exception $e) {
            // Manejo de errores
            \Log::error('Error al procesar la solicitud: ' . $e->getMessage());

            return response()->json([
                'reply' => 'Error al procesar la solicitud: ' . $e->getMessage(),
            ], 500);
        }
    }
}
