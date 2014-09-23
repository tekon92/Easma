<?php

class model{
    protected $query;
    protected $conn;
    protected $db;
    protected function connect_db($host,$user,$password,$database){
        try{
            mysqli_report(MYSQLI_REPORT_STRICT);
            $this->conn = new mysqli($host, $user, $password, $database);
            $this->conn->query("SET NAMES 'utf8'");
            $this->db = $database;
            return $this->conn->connect_errno;
        } catch (Exception $e) {
              exit('No db connection ! model line 15');
        }
    }
    protected function mquery($sql){
            $this->query=$this->conn->query($sql);
            return $this->query;
    }
    protected function select($sql){
            $this->mquery($sql);
            if ($this->conn->error){ exit("model sql error line 24  !"); }
            return $this->query->fetch_assoc();
    }
    protected function multiple_select($sql){
            $rows=array();
            $this->mquery($sql);
            if ($this->conn->error){ exit("model sql error line 30  !"); }
            while($row=$this->query->fetch_assoc()){ $rows[]=$row; }
            return $rows;
    }
    protected function update($table,$data,$where){
            $sql="UPDATE ".$table." SET ".$data." ".$where;
            if ($this->mquery($sql)){ return true; }
            else{ return false; }
    }
    protected function insert($table,$column,$data){
            $sql="INSERT INTO ".$table."(".$column.")VALUES(".$data.")";
            if ($this->mquery($sql)){ return true; }
            else{ return false; }
    }
    protected function total_record(){
            if ($this->conn->error){ exit("model sql error line 45  !"); }
            return $this->query->num_rows;
    }
    protected function delete($table,$where){
            $sql="Delete from ".$table." ".$where;
            if ($this->mquery($sql)){ return true; }
            else{ return false; }
    }
    protected function optimize($pos_message=" is OK",$neg_message=" Error"){
            $sql="SHOW TABLES FROM ".$this->db."";
            $tables = $this->multiple_select($sql);
            foreach ($tables as $table) {
                    $tb = $table['Tables_in_'.$this->db];
                    if ($this->conn->query("OPTIMIZE TABLE ".$tb."")){ echo $tb." ".$pos_message."<br>"; }
                    else{ echo $tb." ".$neg_message." **************<br>";}
            }
    }
    protected function save_db($backup=""){
            $sql="SHOW TABLE STATUS";
            $tables = $this->multiple_select($sql);
            foreach ($tables as $table) { $tbl_stat[$table['Name']] = $table['Auto_increment']; }
            $sql="SHOW TABLES FROM ".$this->db."";
            $tables = $this->multiple_select($sql);
            foreach ($tables as $table) { $tb = $table['Tables_in_'.$this->db]; $backup .= $this->dump_all($backup,$tb,$tbl_stat[$tb]); }
            echo $backup;
    }
    protected function dump_all($output,$tbl,$stats) {
            $columns="";
            $output = "--\n-- www.canyalcin.com Table structure for `$tbl`\n--\n\nCREATE TABLE `$tbl` ( ";
            $sql="SHOW CREATE TABLE $tbl";
            $tables = $this->multiple_select($sql);
            foreach ($tables as $al) {
                $column=$al['Create Table'][0];
                $str = str_replace("CREATE TABLE `$tbl` (", "", $al['Create Table']);
                $str = str_replace(",", ",", $str);
                $str2 = str_replace("`) ) TYPE=MyISAM ", "`)\n ) TYPE=MyISAM ", $str);
                if ($stats) $str2 = $str2." AUTO_INCREMENT=".$stats;
                $output .= $str2.";\n\n";
            }
            $output .= "-- \n-- Dumping data for table `".$tbl."`\n-- \n\n";
            $sql="SELECT * FROM $tbl";
            $table = $this->multiple_select($sql);
            foreach ($table as $dt) {
                    $columns = array_keys($dt); $column = "`".implode("`,`", $columns)."`"; $field = count($columns);
                    $i=0; $value = "";
                    while($i<$field){
                        if ($i==0){ $v=""; }else{ $v=","; } $value .=$v."`".addslashes($dt[$columns[$i]])."`"; $i++;
                    }
            $output .="\nINSERT INTO `".$tbl."` (".$column.") VALUES(".$value.");";
            }
            $output .= "\n-----------------------------------------------------------\n\n";
            return $output;
    }
    protected function db_close(){
            $this->conn->close();
    }


}


?>
