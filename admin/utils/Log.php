<?php

require_once(dirname(__FILE__) . '/../../functions.php');

class Log
{
    static function info($msg)
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('INSERT INTO `logs`(`event`, `date`, `level`) VALUES (:event, NOW(), 0)');
        $msg = $msg . ' [' . getIP() . ']';
        $stat->bindParam(':event', $msg, PDO::PARAM_STR);
        $stat->execute();
    }

    static function warn($msg)
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('INSERT INTO `logs`(`event`, `date`, `level`) VALUES (:event, NOW(), 1)');
        $msg = $msg . ' [' . getIP() . ']';
        $stat->bindParam(':event', $msg, PDO::PARAM_STR);
        $stat->execute();
    }

    static function error($msg)
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('INSERT INTO `logs`(`event`, `date`, `level`) VALUES (:event, NOW(), 2)');
        $msg = $msg . ' [' . getIP() . ']';
        $stat->bindParam(':event', $msg, PDO::PARAM_STR);
        $stat->execute();
    }

    static function fatal($msg)
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('INSERT INTO `logs`(`event`, `date`, `level`) VALUES (:event, NOW(), 3)');
        $msg = $msg . ' [' . getIP() . ']';
        $stat->bindParam(':event', $msg, PDO::PARAM_STR);
        $stat->execute();
    }

    static function debug($msg)
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PSW);
        $stat = $db->prepare('INSERT INTO `logs`(`event`, `date`, `level`) VALUES (:event, NOW(), 4)');
        $msg = $msg . ' [' . getIP() . ']';
        $stat->bindParam(':event', $msg, PDO::PARAM_STR);
        $stat->execute();
    }
}