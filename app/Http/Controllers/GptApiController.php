<?php 
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Tectalic\OpenAi\Manager;
use Tectalic\OpenAi\Authentication;
use Tectalic\OpenAi\Models\ChatCompletions\CreateRequest;


// use GuzzleHttp\Client;


class GptApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function chatGptApi(){

      $openaiClient = Manager::build(
        new Client(),
        new Authentication('API_KEY',)
      );
        $input_text = request()->input('inputText');
       
      /** @var \Tectalic\OpenAi\Models\ChatCompletions\CreateResponse $response */
      $response = $openaiClient->chatCompletions()->create(
          new CreateRequest([
              'model'    => 'gpt-3.5-turbo',
              'prompt' => 'Enhance the user input',
              'messages' => [
                  [
                      'role'    => 'user',
                      'content' => $input_text.'--------------------------------enhance this text',
                  ],
              ],
          ])
      )->toModel();
       
      echo $response->choices[0]->message->content;
   
    }

}
