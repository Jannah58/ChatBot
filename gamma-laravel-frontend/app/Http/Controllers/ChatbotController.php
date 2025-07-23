<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ChatbotController extends Controller
{
    /**
     * The FastAPI backend URL
     */
    private string $fastApiUrl;

    public function __construct()
    {
        // You can configure this in .env file later
        $this->fastApiUrl = env('FASTAPI_URL', 'http://localhost:8000');
    }

    /**
     * Display the chatbot interface
     */
    public function index(): View
    {
        return view('chatbot.index');
    }

    /**
     * Handle chat message and communicate with FastAPI backend
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        try {
            // Send request to FastAPI backend
            $response = Http::timeout(30)->post($this->fastApiUrl . '/chat', [
                'message' => $request->input('message'),
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return response()->json([
                    'success' => true,
                    'response' => $data['response'] ?? 'No response from AI',
                    'timestamp' => now()->toISOString(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to communicate with AI service',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Unable to connect to AI service. Please try again later.',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * Get chat history (if implemented in FastAPI)
     */
    public function history(): JsonResponse
    {
        try {
            $response = Http::timeout(10)->get($this->fastApiUrl . '/history');

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'history' => $response->json(),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to retrieve chat history',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Unable to connect to AI service',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * Clear chat session
     */
    public function clear(): JsonResponse
    {
        try {
            $response = Http::timeout(10)->post($this->fastApiUrl . '/clear');

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Chat session cleared',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to clear chat session',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Unable to connect to AI service',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    /**
     * Health check for the FastAPI backend
     */
    public function healthCheck(): JsonResponse
    {
        try {
            $response = Http::timeout(5)->get($this->fastApiUrl . '/health');

            return response()->json([
                'fastapi_status' => $response->successful() ? 'online' : 'offline',
                'fastapi_url' => $this->fastApiUrl,
                'laravel_status' => 'online',
                'timestamp' => now()->toISOString(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'fastapi_status' => 'offline',
                'fastapi_url' => $this->fastApiUrl,
                'laravel_status' => 'online',
                'error' => $e->getMessage(),
                'timestamp' => now()->toISOString(),
            ]);
        }
    }
}
