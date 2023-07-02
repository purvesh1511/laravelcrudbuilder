<?php
namespace App\Traits;

trait LaravelCurl{

    function request_curl($url,$data = [],$method = 'POST')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => -1,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }


    // Joke to Story function
    function jokeToStory22($joke)
    {
        $api_key = "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";
        $url = "https://api.openai.com/v1/models";

        // API request payload
        // $payload = [
        //     "model"=> "davinci",
        //     "messages"=> [
                
        //         "role"=> "user", 
        //         "content"=> "Say this is a test!"],

            
        //     'temperature' => 0.7,
        //     //"top_p"=> 1.0,
        //     // 'n' => 1,
        //     //"frequency_penalty"=> 1.0,
        //     //"presence_penalty"=> 1.0
        // ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key,
        ];

        // Send API request
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process API response
        $data = json_decode($response, true);
        dd($data);
        $story = $data['choices'][0]['text'];

        return $story;
    }

    // Joke to Story function
    function jokeToStory($joke)
    {
        $api_key = "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";
        $url = "https://api.openai.com/v1/chat/completions";

        // API request payload
        $payload = [
            "model"=> "davinci",
            "messages"=> [
                
                "role"=> "user", 
                "content"=> "Say this is a test!"],

            
            'temperature' => 0.7,
            //"top_p"=> 1.0,
            // 'n' => 1,
            //"frequency_penalty"=> 1.0,
            //"presence_penalty"=> 1.0
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key,
        ];

        // Send API request
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        // Process API response
        $data = json_decode($response, true);
        dd($data);
        $story = $data['choices'][0]['text'];

        return $story;
    }
}
