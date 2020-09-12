<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{

    public function index(){
        $TOKEN = "1282438920:AAHx5P9-2OEotGLSXV1gemW-VupZZFKMM2Y";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), TRUE);
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];
        
        if (strpos($message, "/start") === 0) {
        
        file_get_contents($apiURL."/sendmessage?chat_id=".$chatID."&text=Haloo, test webhooks <code>dicoffeean.com</code>.&parse_mode=HTML");
        }
    }

    public function storeMessage()
    {

        $text ="<b>Dear Siffiyan, ada permintaan les baru yang masuk di Cari Guru untu kamu  dengan detail sebagai berikut : </b> \n"
            ."Nama Siswa : kevin andhika \n"
            ."Jumlah Les : 2 pertemuan \n"
            ."Silahkan buka akun cari guru anda jika anda berminta untuk mengambilnya :)";
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '1003869984'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
 
    }

}