<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use GuzzleHttp\Client;


class TextApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ai_assist()
    {
        $input_text = request()->input('inputText');
        // $api_url = 'https://api.openai.com/v1/engines/davinci/completions';
        $api_url = 'https://api.openai.com/v1/edits';
        // text-davinci-edit-001
        $api_key = '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';
        $temperature = 1;
        // $max_tokens = strlen($input_text) + 50;
        $instruction = 'enhance the grammar and enrich the text';

        // curl -X POST -H "Content-Type: application/json" -H "Authorization: Bearer YOUR_API_KEY" -d '{"model": "text-davinci-002", "prompt": "This is some incorect text that needs to be corrected.", "temperature": 0, "max_tokens": 60}' https://api.openai.com/v1/engines/davinci-codex/completions

        $data = [
            // 'engine'=> "davinci",
            'model' => "text-davinci-edit-001",
            // 'prompt' => $input_text . $instruction,
            'input' => $input_text,
            'temperature' => $temperature,
            // 'max_tokens' => $max_tokens,
            'instruction' => $instruction
        ];

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $api_url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json',
        //     'Authorization: Bearer ' . $api_key,
        // ]);

        // $result = curl_exec($ch);
        // curl_close($ch);

        // $output = json_decode($result, true);

    $client = new Client();

    $response = $client->request('POST', $api_url, [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key,
        ],
        'json' => $data,
    ]);

    $output = json_decode($response->getBody(), true);
        $improved_text = $output['choices'][0]['text'];

        echo $improved_text;
    }

}
