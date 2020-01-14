<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kavenegar;
use App\TextMessage;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class TextMessageController extends Controller
{
    const FORMAT = "%s = %s <br/>";

    public function index(Request $request)
    {
        $text_messages = TextMessage::query();
        if ($request->receptor) {
            $text_messages = $text_messages->where('receptor', 'like', "%$request->receptor%");
        }
        $text_messages = $text_messages->latest()->paginate(20);
        return view('dashboard.text_messages.index', compact('text_messages'));
    }

    public static function store($template, $receptor, $tokens='')
    {
        if (is_array($tokens) && count($tokens)) {
            $tokens = implode('&&&', $tokens);
        }
        return TextMessage::create([
            'template' => $template,
            'receptor' => $receptor,
            'tokens' => $tokens,
        ]);
    }

    public static function send($message,$receptor)
    {
        try{
            $sender = "?";
            $result = Kavenegar::Send($sender,$receptor,$message);
            self::format($result);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }
    }

    // $receptor is a string, the number
    public static function lookup($receptor, $tokens, $template, $force=false)
    {

        $token = $tokens[0] ?? '';
        $token2 = $tokens[1] ?? '';
        $token3 = $tokens[2] ?? '';
        $token10 = $tokens[3] ?? '';
        $token20 = $tokens[4] ?? '';

        try{
            $result = Kavenegar::VerifyLookup($receptor, $token, $token2, $token3, $template, null, $token10, $token20 );
            self::format($result);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }

    }

    private static function format($result)
    {
        if($result){
            echo "<pre>";
            foreach($result as $r){
                echo sprintf(self::FORMAT, "messageid", $r->messageid);
                echo sprintf(self::FORMAT, "message", $r->message);
                echo sprintf(self::FORMAT, "status", $r->status);
                echo sprintf(self::FORMAT, "statustext", $r->statustext);
                echo sprintf(self::FORMAT, "sender", $r->sender);
                echo sprintf(self::FORMAT, "receptor", $r->receptor);
                echo sprintf(self::FORMAT, "date", $r->date);
                echo sprintf(self::FORMAT, "cost", $r->cost);
                echo "<hr/>";
            }
            echo "</pre>";
        }
    }
}
