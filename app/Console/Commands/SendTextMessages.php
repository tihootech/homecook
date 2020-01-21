<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TextMessage;
use App\Http\Controllers\TextMessageController as TMC;

class SendTextMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send all text messages in db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $text_messages = TextMessage::whereSent(0)->get();
        foreach ($text_messages as $sms) {


            $result = TMC::lookup($sms->receptor, explode('&&&', $sms->tokens), $sms->template);
            if ($result) {
                $sms->update([
                    'sender' => $result->sender,
                    'cost' => $result->cost,
                    'status' => $result->statustext,
                    'body' => $result->message,
                    'sent' => 1,
                ]);
            }

        }
    }
}
