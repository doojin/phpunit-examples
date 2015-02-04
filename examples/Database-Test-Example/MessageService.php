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
        $messagesRows = DB::query("
          SELECT `messages`.`message`, `u1`.`login` AS `from_login`, `u2`.`login` AS `to_login`
          FROM `messages`
          INNER JOIN `users` AS `u1` ON `messages`.`from` = `u1`.`id`
          INNER JOIN `users` AS `u2` ON `messages`.`to` = `u2`.`id`
        ");

        foreach ($messagesRows as $row) {
            $message = new Message($row['from_login'], $row['to_login'], $row['message']);
            $messages[] = $message;
        }
        return $messages;
    }
}