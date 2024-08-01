<?php
     class binhluan 
    {
        function insertBinhLuan($idkh, $idhanghoa, $content) {
            $db = new connect();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = new DateTime('now');
            $timebl = $date->format('Y-m-d H:i:s');
            $query ="insert into comment(idcomment, idkh, idhanghoa, content, luotthich, timebl) values(null,$idkh, $idhanghoa, '$content', 0, '$timebl')";
            $db->exec($query);
        }

        function selectBinhLuan($idhanghoa) {
            $db = new connect();
            $select = "SELECT distinct a.username, b.content, b.timebl, b.luotthich,b.idcomment from khachhang a, comment b where a.makh = b.idkh and b.idhanghoa = $idhanghoa order by b.idcomment desc";
            $result = $db->getList($select);
            return $result;
        }
        function updateBinhLuan($idcomment,$luotthich)
        {
            $db = new connect();
            $query = "update comment set luotthich=$luotthich WHERE idcomment=$idcomment";
            $db->exec($query);
        }
        
      
        
     
    }

    
    
?>