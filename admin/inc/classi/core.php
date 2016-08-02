<?php
/**
 * Created By LeCs.
 * Date: 12/08/2015 19:15
 * lbase - core.php
 */

class core extends connection{

    public function selezione($campo,$tabella,$where,$valore){
    $q = $this->connessione->prepare("SELECT $campo FROM $tabella WHERE $where = ? LIMIT 1");
    $q->execute(array($valore));
    $row = $q->fetch(PDO::FETCH_ASSOC);
    return $row[$campo];
    }

    public function utente($campo,$where,$valore){
        $q = $this->connessione->prepare("SELECT $campo FROM users WHERE $where = ? LIMIT 1");
        $q->execute(array($valore));
        $row = $q->fetch(PDO::FETCH_ASSOC);
        return $row[$campo];
    }

    public function count($tabella){
        $q = $this->connessione->prepare("SELECT * FROM $tabella");
        $q->execute();
        return $q->rowCount();
    }

    public function count_val($tabella,$where,$valore){
        $q = $this->connessione->prepare("SELECT * FROM $tabella WHERE $where = ?");
        $q->execute(array($valore));
        return $q->rowCount();
    }

    public function count_double_val($tabella,$where,$valore,$where1,$valore1){
        $q = $this->connessione->prepare("SELECT * FROM $tabella WHERE $where = ? AND $where1 = ?");
        $q->execute(array($valore,$valore1));
        return $q->rowCount();
    }

    public function Insert($table, $column, $value){
        $q = $this->connessione->prepare("INSERT INTO $table($column) VALUES (?)");
        $q->execute(array($value));
    }

    public function Delete($table, $where, $value){
        $q = $this->connessione->prepare("DELETE FROM $table WHERE $where = ?");
        $q->execute(array($value));
    }

    public function Truncate($table){
        $q = $this->connessione->prepare("TRUNCATE TABLE $table");
        $q->execute();
    }

    public function UpdateSingle($table, $column, $value, $where, $value1){
        $q = $this->connessione->prepare("UPDATE $table SET $column = ? WHERE $where = ?");
        $q->execute(array($value,$value1));
    }

    public function server_status($campo){
        $q = $this->connessione->prepare("SELECT $campo FROM server_status LIMIT 1");
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        return $row[$campo];
    }

    public function getDate($stamp){
        return date('d/m/Y H:i:s', $stamp);
    }

    public function UtentiRankati(){
        $ranks = $this->connessione->prepare("SELECT * FROM ranks WHERE id > 1 ORDER BY id DESC");
        $ranks->execute();
        $rank_a = $ranks->fetchAll(PDO::FETCH_ASSOC);
        $ranked = $this->connessione->prepare("SELECT * FROM users WHERE rank > 1");
        $ranked->execute();
        $i = 0;
        foreach($rank_a as $rank){
            $id= $rank['id'];
            $staffs = $this->connessione->prepare("SELECT username,rank FROM users WHERE rank = ?");
            $staffs->execute(array($id));
            $staffs_a = $staffs->fetchAll(PDO::FETCH_ASSOC);
            foreach($staffs_a as $staff){
                $i++;
                echo "<b>".$staff['username']."</b>";
                echo "<span style='float:right;'>".$rank['name']." (".$id.")</span>";
                if($i != $ranked->rowCount()) echo "<hr>";
            }
        }
    }

    public function newsHK(){
        $news = $this->connessione->prepare("SELECT * FROM cms_news ORDER BY id DESC");
        $news->execute();
        $news_a = $news->fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        foreach($news_a as $thisnews){
            $i++;
            echo '<tr>
                              <td style="padding:5px;">
                              <b style="font-size:17px;">'.$this->Filter($thisnews['title']).'</b>
                              <br>
                              <div style="font-size: 14px;line-height: 16px;font-style: italic;">'.$this->Filter($thisnews['author'] . ' - ' . $this->getDate($thisnews['pub_date'])).'</div>
                              </td>
                               <td style="padding:5px;text-align:right;">
                                        <form method="post">
                                            <input name="id" type="hidden" value="'.$this->Filter($thisnews['id']).'" readonly>
                                            <input type="submit" name="editNews" value="Modifica" style="margin-bottom:2px;">
                                            <input type="submit" name="deleteNews" value="Elimina">
                                        </form>
                                    </td>
                                </tr>';
            if($i != $news->rowCount()) {
                echo '<tr><td colspan = "2"><hr></td></tr>';
            }
        }
    }

    public function getClones($username){
        $cloni = $this->connessione->prepare("SELECT * FROM users WHERE ip_last = ?");
        $ipcheck = $this->utente('ip_last','username',$username);
        $cloni->execute(array($ipcheck));
        if($cloni->rowCount() > 1){
            $cloni_a = $cloni->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            foreach($cloni_a as $thisclone){
                $i++;
                echo "<tr><td style='padding:5px;'>"
                    .$this->Filter($thisclone['username']).
                    "</td></tr>";
                if($i != $cloni->rowCount()) {
                    echo '<tr><td colspan = "2"><hr></td></tr>';
                }
            }
        } else {
            echo "<tr><td style='padding:5px;'>"
                 .$username.
                  "</td></tr>";
        }
    }

    public function getBans(){
        $bans = $this->connessione->prepare("SELECT * FROM bans ORDER BY id DESC");
        $bans->execute();
        $bans_a = $bans->fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        foreach($bans_a as $thisban){
            $i++;
            echo "<tr>
<td style='padding:5px;'><b style='font-size:17px;'>".$thisban['value']." (".$thisban['bantype'].")</b><br><div style='font-size: 14px;line-height: 16px;font-style: italic;'>Bannato da ".$thisban['added_by']." - ".htmlentities($thisban['added_date'])."<br>Scade ".date("l d F Y H:i:s", $thisban['expire'])."</div></td>
<td style='padding:5px;font-size:15px;'><a href='?do=sban&key=".$thisban['id']."'>Sbanna</a>
</td></tr>
<tr><td colspan='2'><hr></td></tr>";
            if($i != $bans->rowCount()) {
                echo '<tr><td colspan = "2"><hr></td></tr>';
            }
        }
    }

    public function get_permissions($id, $rank){
        $query = $this->connessione->prepare("SELECT $id FROM permissions_cms WHERE id = ?");
        $query->execute(array($rank));
        $query_a = $query->fetch(PDO::FETCH_ASSOC);

        return $query_a[$id];
    }

    public function trow($intNumber){

        if($intNumber % 2 == 0){
            return true;
        }else {
            return false;
        }
    }

    public function passGen($intNumber = 10){
        $password = '';
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_*&#@-';
        $i = 0;
        while($i < $intNumber){
            $char = substr($chars, mt_rand(0, strlen($chars)-1), 1);

            if(!strpos($password, $char)){
                $password = $password . $char;
                $i++;
            }
        }
        return $password;
    }

    public function pass_hash($str){
        $hash = sha1($str);
        return $hash;
    }

    public function Filter($string){
       $filtered = htmlentities(nl2br($string));
        return $filtered;
    }

    public function FixNews($str){
        $str = str_replace("Ã¨", "è", $str);
        $str = str_replace("Ã¬", "ì", $str);
        $str = str_replace("Ã²", "ò", $str);
        $str = str_replace("Ã¹", "ù", $str);
        return $str;
    }
    public function parole_news($str){
        $str = str_ireplace("à", "&agrave;",($str));
        $str = str_ireplace("<br />", "<br>",($str));
        $str = str_ireplace("è", "&egrave;",($str));
        $str = str_ireplace("ì", "&igrave;",($str));
        $str = str_ireplace("ò", "&ograve;",($str));
        $str = str_ireplace("ù", "&ugrave;",($str));
        $str = str_ireplace("SELECT", "", ($str));
        $str = str_ireplace("INSERT", "", ($str));
        $str = str_ireplace("insert", "", ($str));
        $str = str_ireplace("CREATE", "", ($str));
        $str = str_ireplace("create", "", ($str));
        $str = str_ireplace("UNION", "", ($str));
        $str = str_ireplace("union", "", ($str));
        $str = str_ireplace("exe", "", ($str));
        $str = str_ireplace("exec", "", ($str));
        $str = str_ireplace("eval", "", ($str));
        $str = str_ireplace("sql", "", ($str));
        $str = str_ireplace("from", "", ($str));
        $str = str_ireplace("drop", "", ($str));
        $str = str_ireplace("999", "", ($str));
        $str = str_ireplace("<script>", "", ($str));
        $str = str_ireplace("script", "", ($str));
        $str = str_ireplace("java", "", ($str));
        $str = str_ireplace("</script>", "", ($str));
        $str = str_ireplace("$", "", ($str));
        return $str;
    }

    public function filternews($str) {
        $str = $this->FixNews($str);
        $str = $this->parole_news(stripslashes($str));
        return $str;
    }

}
