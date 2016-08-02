<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 30/01/2016 15:39
 * LSyS - news.php
 */

class news{
    private $connect;

    public function __construct($connect){
        $this->connect = $connect;
    }

    public function get_news($limit = 20){
        $elenco = $this->connect->exe(array('QUERY' => "SELECT id,title,image FROM cms_news ORDER BY id DESC LIMIT $limit"), 'all');
        return $elenco;
    }

    public function return_id($id){
        $check = $this->connect->exe(array('QUERY' => "SELECT id FROM cms_news WHERE id = :id LIMIT 1", ':id' => $this->connect->Filter($id)), 'fetch', true);
        if($check['NUM'] == 1){
            return $check['id'];
        } else {
            $get_id = $this->connect->exe(array('QUERY' => "SELECT id FROM cms_news ORDER BY id DESC LIMIT 1"), 'fetch');
            return $get_id['id'];
        }
    }

    public function get_title($id){
        $get = $this->connect->exe(array('QUERY' => "SELECT title FROM cms_news WHERE id = :id LIMIT 1", ':id' => $this->connect->Filter($id)),'fetch');
        return $this->connect->xss_filter($get['title']);
    }

    public function get_newsinfo($id){
        $get = $this->connect->exe(array('QUERY' => "SELECT author,pub_date FROM cms_news WHERE id = :id LIMIT 1", ':id' => $this->connect->Filter($id)),'fetch');
        return $this->connect->xss_filter($get['author']).' - '.$this->connect->data($get['pub_date']);
    }

    public function build_text($id){
        $get = $this->connect->exe(array('QUERY' => "SELECT shortstory,longstory FROM cms_news WHERE id = :id LIMIT 1", ':id' => $this->connect->Filter($id)),'fetch');
        return $this->connect->Filter($this->connect->NewsFix($get['shortstory'])).'<br>'.$this->connect->Filter($this->connect->NewsFix($get['longstory']));
    }

}