<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    protected $chatbotUrl;

    public function __construct()
    {
        $this->chatbotUrl = env('CHATBOT_API_URL', 'http://chatbot:8000');
    }

    public function status()
    {
        try {
            $response = Http::timeout(5)->get($this->chatbotUrl . '/status');
            
            if ($response->successful()) {
                return response()->json($response->json());
            }
            
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to connect to chatbot service'
            ], 503);
            
        } catch (\Exception $e) {
            Log::error('Chatbot status check failed: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'loading',
                'message' => 'Connecting to chatbot service...'
            ], 503);
        }
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        try {
            $response = Http::timeout(60)->post($this->chatbotUrl . '/chat', [
                'message' => $request->message,
                'use_langchain' => true
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json([
                'error' => 'Unable to process your request. Please try again.'
            ], 503);

        } catch (\Exception $e) {
            Log::error('Chatbot request failed: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Chatbot service is currently unavailable. Please try again later.'
            ], 503);
        }
    }
}