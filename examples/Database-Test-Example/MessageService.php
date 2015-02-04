<?php

require_once('Message.php');
require_once('DB.php');

class MessageService
{
    /**
     * @return Message[]
     */
    public function getMessages()
    {
        // Getting messages from database
        $messages = array();
        $messagesRows = DB::query("SELECT `from`, `to`, `message` FROM `messages`");

        foreach ($messagesRows as $row) {
            $message = new Message();
            $message->message = $row['message'];

            // Getting a sender
            $from = $row['from'];
            $userFrom = DB::query("SELECT `login` FROM `users` WHERE `id` = $from")->fetch(PDO::FETCH_ASSOC);
            $message->from = $userFrom['login'];

            // Getting an addressee
            $to = $row['to'];
            $userTo = DB::query("SELECT `login` FROM `users` WHERE `id` = $to")->fetch(PDO::FETCH_ASSOC);
            $message->to = $userTo['login'];

            $messages[] = $message;
        }
        return $messages;
    }
}