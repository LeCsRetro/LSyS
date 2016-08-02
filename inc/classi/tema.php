<?php
/**
 * Created By LeCs.
 * Special Thanks to ZambaHacker
 * Date: 23/01/2016 09:08
 * LSyS - tema.php
 */

class tema{
    private $lang;
    private $connect;
    private $name;

    public function __construct($connect,$lang){
        $this->connect = $connect;
        $this->lang = $lang;
        $this->name = $lang['user']['username'];
        $this->page = $lang['page'];
    }

    public function head_open($page_title){
        if(preg_match('/SPC_/',$page_title)){
            $filter = explode('{@', $page_title);
            $filtered = explode('@}', $filter[1]);
            $page_title = $this->load_spctag($filtered[0]);
        }
        $site_name = $this->connect->sitename;
        echo "\n<html>\r\n<head>\r\n<meta http-equiv='content-type' content='text/html;' charset='utf-8' />\r\n<title>{$site_name} ~ {$page_title}</title>\r\n<link rel='shortcut icon' href='favicon.ico' type='image/vnd.microsoft.icon' />\r";
        $this->load_tags($this->lang['meta_key']);
    }

    public function head_close(){
        echo "\n</head>\r\n";
    }

    public function load_tags($tags){
        echo "\n<meta name='keywords' content='{$tags}' />\r";
    }

    public function dir_include($dir, $file){
        $tema = $this->connect->tema;
        if($dir == 'js'){
            echo "\n<script type='text/javascript' src='inc/temi/{$tema}/{$dir}/{$file}'></script>\r";
        } elseif($dir == 'style'){
            echo "\n<link rel='stylesheet' type='text/css' href='inc/temi/{$tema}/{$dir}/{$file}'>\r";
        } elseif($dir == 'images'){
            echo "\n<img src='inc/temi/{$tema}/{$dir}/{$file}'>\r";
        }
    }

    public function load_page(){
        $name = $this->page;
        $tema = $this->connect->tema;
        if(file_exists("inc/temi/{$tema}/{$name}.html")) {
            ob_start();
            include("inc/temi/{$tema}/{$name}.html");
            $page = ob_get_contents();
            ob_end_clean();
            $page = $this->tag_replace($page);
            echo $this->load_conditions($page);
        } else {
            header("location: 404.php");
        }
    }

    public function tag_replace($page){
        $tagged = explode('{@', $page);
        foreach($tagged as $tag){
            $extract = explode('@}', $tag);
            if(preg_match('/SPC_/',$extract[0])){
               $page = str_replace('{@'.$extract[0].'@}', $this->load_spctag($extract[0]), $page);
            } else {
              $page = str_replace('{@'.$extract[0].'@}', $this->lang[$extract[0]], $page);
            }
        }
        return $page;
    }

    public function load_spctag($tag){
        switch($tag){
            case('SPC_online_count'):
                $online = $this->connect->exe(array('QUERY'=>'SELECT users_online FROM server_status LIMIT 1'));
                $tag = $online['users_online'] . ' utenti online!';
                break;
            case('SPC_include_header'):
                $tema = $this->connect->tema;
                ob_start();
                include("inc/temi/{$tema}/header.html");
                $include = ob_get_contents();
                $tag = $this->tag_replace($include);
                ob_end_clean();
                break;
            case('SPC_include_footer'):
                $tema = $this->connect->tema;
                ob_start();
                include("inc/temi/{$tema}/footer.html");
                $include = ob_get_contents();
                $tag = $this->tag_replace($include);
                ob_end_clean();
                break;
            case(preg_match('/SPC_us_/', $tag) ? true : false):
                $response = explode('_us_', $tag);
                if($response[1] == 'last_online' || $response[1] == 'account_created'){
                    $tag = $this->connect->data($this->lang['user'][$response[1]]);
                } else {
                    $tag = $this->connect->xss_filter($this->lang['user'][$response[1]]);
                }
                 break;
            case('SPC_me_news'):
                $tag = '';
                $i = 0;
                foreach($this->lang['elenco_news'] as $news){
                    $i++;
                    if($this->connect->trow($i)){
                        $trow = 'light';
                    } else {
                        $trow = 'dark';
                    }
                    $tag = $tag.'<tr><td><div class="list_'.$trow.'"><a href="news.php?id='.$news['id'].'">'.$this->connect->xss_filter($news['title']).'</a></div></td><td style="width:20%"><div id="news_image" style="background-image:url(\''.$news['image'].'\');"></div></td></tr>';
                }
                break;
            case('SPC_news_list'):
                $tag = '';
                $i = 0;
                foreach($this->lang['elenco_news'] as $news){
                    $i++;
                    if($this->connect->trow($i)){
                        $trow = 'light';
                    } else {
                        $trow = 'dark';
                    }
                    $tag = $tag.'<tr><td><div class="list_'.$trow.'"><a href="news.php?id='.$news['id'].'">'.$this->connect->xss_filter($news['title']).'</a></div></td></tr>';
                }
                break;
            case(preg_match('/SPC_staff_/', $tag) ? true : false):
                $getrank = explode('_staff_', $tag);
                $array = 'staff_'.$getrank[1];
                if($this->lang[$array][0]['username'] != '') {
                    $tag = '';
                    $i = 0;
                    foreach ($this->lang[$array] as $user) {
                        $i++;
                        if($this->connect->trow($i)){
                            $trow = 'light';
                        } else {
                            $trow = 'dark';
                        }
                        $tag = $tag.'<tr class="list_'.$trow.'"><td style="width:10%;"><div id="user_image" style="background-image:url(\'http://www.habbo.it/habbo-imaging/avatarimage?figure='.$user['look'].'&direction=3&head_direction=3&gesture=sml&action=wav&size=l\');"></div></td>
                        <td>'.$this->connect->xss_filter($user['username']).'
                        - Ultimo accesso: '.$this->connect->data($user['last_online']).'
                        <div class="info_box">Ruolo: '.$this->connect->xss_filter($user['role']).'</div>
                        </td></tr>';
                    }
                } else {
                    $tag = '';
                }
                break;
            case(preg_match('/SPC_staffname_/', $tag) ? true : false):
                $getrank = explode('_staffname_', $tag);
                $data = $this->connect->exe(array('QUERY' => "SELECT name FROM ranks WHERE id = :id", ':id' => $getrank[1]), 'fetch', true);
                if($data['NUM'] == 1){
                    $tag = $data['name'];
                } else {
                    $tag = 'Rank inesistente.';
                }
                break;
            case('SPC_radiourl'):
                $tag = $this->connect->radiourl;
                break;
        }
        return $tag;
    }

    public function load_conditions($page){
        $conditioned = explode('{%if ', $page);
        foreach($conditioned as $condition) {
            $extract1 = explode('{%endif%}', $condition);
            $id = explode(' %}', $extract1[0]);
            if (preg_match('/{%else%}/', $id[1])) {
                $separate = explode('{%else%}', $id[1]);
                $true = $separate[0];
                $false = $separate[1];
            } else {
                $true = $id[1];
                $false = '';
            }

            $ext_condition = explode(' = ', $id[0]);
            if (preg_match('/or/', $ext_condition[1])) {
                $ext_variables = explode(' or ', $ext_condition[1]);
                if($this->lang[$ext_condition[0]] == $ext_variables[0] or $this->lang[$ext_condition[0]] == $ext_variables[1]){
                    $page = str_replace('{%if ' . $extract1[0] . '{%endif%}', $true, $page);
                } else {
                    $page = str_replace('{%if ' . $extract1[0] . '{%endif%}', $false, $page);
                }
            } else {
                if ($this->lang[$ext_condition[0]] == $ext_condition[1]) {
                    $page = str_replace('{%if ' . $extract1[0] . '{%endif%}', $true, $page);
                } else {
                    $page = str_replace('{%if ' . $extract1[0] . '{%endif%}', $false, $page);
                }
            }
        }
        return $page;
    }

}