<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotManChatController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == '1') {
                $this->askForDatabase($botman);
            } else {
                $botman->reply("Hãy gõ 1 để bắt đầu");
            }
        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }

    public function askForDatabase($botman)    
    {
        $question = Question::create('Bạn muốn hỏi về điều gì')
            ->fallback('Lỗi')
            ->callbackId('create_database')
            ->addButtons([
                Button::create('Thông tin về khách sạn')->value('1'),
                Button::create('Thông tin cá nhân')->value('2'),
                Button::create('Cách đặt phòng')->value('3'),
            ]);

        $botman->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); 
                $selectedText = $answer->getText(); 

                if($selectedValue == '1'){
                    $this->say('Khách sạn tên Sogo Hotel');
                } else if($selectedText == '2'){
                    $this->say('Bạn cần tạo tài khoản để xem thông tin cá nhân. Nếu đã tạo rồi thì nhấp vào dấu 3 gạch bên góc trái, rồi chọn usernam là xem được thông tin cá nhân');
                } else if($selectedText == '3'){
                    $this->say('Bạn cần tạo tài khoản để đặt phòng. Nếu đã tạo rồi thì nhập ngày vào, ngày ra, số lượng người ở ở phần trên ngay trong trang chủ, rồi sau đó chọn phòng, kiểm tra lại thông tin là đặt phòng thành công');
                }
            }
        });
    }
}
