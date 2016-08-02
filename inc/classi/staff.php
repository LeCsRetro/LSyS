<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 10/03/2016 17:54
 * LSyS - staff.php
 */

class staff{
    private $connect;

    public function __construct($connect){
        $this->connect = $connect;
    }

    public function getrank($rank){
        $rank = $this->connect->exe(array('QUERY'=>"SELECT * FROM users WHERE rank = :rank", 'rank' => $rank),'all');
        return $rank;
    }
}