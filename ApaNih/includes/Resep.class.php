<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
class Resep extends DB{

    function getRandomResep(){
        $query="SELECT * FROM table_resep ORDER BY RAND() limit 1";
        return $this->execute($query);
    }

    function getRandomResepFilter($value1, $value2, $value3){
        if($value1!="undefined"&&$value2!="undefined"&&$value3!="undefined"){
            $query="SELECT * FROM table_resep where Jenis_Menu_resep='$value1' AND Menu_Resep='$value2' AND Daerah_Menu_Resep='$value3' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if($value1=="undefined"){
            $query="SELECT * FROM table_resep where Menu_Resep='$value2' AND Daerah_Menu_Resep='$value3' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if($value2=="undefined"){
            $query="SELECT * FROM table_resep where Jenis_Menu_resep='$value1' AND Daerah_Menu_Resep='$value3' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if($value3=="undefined"){
            $query="SELECT * FROM table_resep where Jenis_Menu_resep='$value1' AND Menu_Resep='$value2' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if(($value1!="undefined")){
            $query="SELECT * FROM table_resep where Jenis_Menu_resep='$value1' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if(($value2!="undefined")){
            $query="SELECT * FROM table_resep where Menu_Resep='$value2'  ORDER BY RAND() limit 1";
            return $this->execute($query);
        }else if(($value3!="undefined")){
            $query="SELECT * FROM table_resep where Daerah_Menu_Resep='$value3' ORDER BY RAND() limit 1";
            return $this->execute($query);
        }
        
    }
    
    function rating($value1){
        $query="INSERT INTO rating values (NULL, $value1)";
        return $this->execute($query);
    }
}
?>