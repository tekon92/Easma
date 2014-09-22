<?php
class site extends model{
    public $site_url;
    public $view;
    public $page;
    public $warn;
    public $language=array();
    public $mysqli;
    public $view_query;
    /* super  admin */
    private $admin;
    private $admin_pass;
    private $sql = 1;

    public function site($base,$server,$user,$pass,$database,$admin,$admin_pass,$lang){
        ob_start();
		session_start();
        header('Content-Type: text/html; charset=utf-8');
        $this->check_lang($lang);
        $this->site_url=$base;
        $this->admin=$admin;
        $this->admin_pass=$admin_pass;
        $this->sql = $this->connect_db($server,$user,$pass,$database);
        $this->mysqli=$this->conn;
        $this->check_view();
        if ( (isset($_GET['do'])) and ($_GET['do']=="delete") ){ $this->delete_record(); }
        if ( (isset($_POST['del_hide'])) and ($_POST['del_hide']==1) and (isset($_POST['kill_all'])) ){ $this->multi_del($_POST['del_table'],$_POST['kill_all']); }
    }
    protected function check_lang($lang){
            include_once "lang.php";
            $setup = new lang($lang);
            $this->language = $setup->lng;
    }
    public function check_admin(){
        if ($this->admin()==false){ header("Location:".$this->site_url); }
    }
    public function admin(){
        if ( (isset($_SESSION['admin'])) and ($_SESSION['admin']=="super") ){
            include_once "form_view.php";
            $this->view=new view();
            return true;
        }
        else{return false;}
    }
    public function check_view(){
        if ( ($this->admin()==true) and (isset($_GET['page'])) and ($_GET['page']=="backup") ){ $this->page="main.php"; $this->db_backup(); }
        else if ( ($this->admin()==true) and (isset($_GET['page']))  ){ $this->page_exist($_GET['page']); }
        else if ($this->admin()==true) { $this->page="main.php"; }
        else{ $this->page="login.php"; }
    }
    public function page_exist($pg){
        $pg=$pg.".php";
        if (file_exists("views/".$pg)){
            $this->page=$pg;
        }
        else{
            $this->page="main.php";
        }
    }
    public function login($nick,$password,$buton){
        $superadmin=$this->admin;
        $superpass=$this->admin_pass;
        if ( (isset($_POST[$buton])) and (isset($_POST[$nick])) and (isset($_POST[$password])) ){
            if ( ($_POST[$nick]==$superadmin) and ($_POST[$password]==$superpass) ){
                $_SESSION['admin']="super";
                header("Location:index.php");
            }
            else{
                $this->warn=$this->language[0];
            }
        }
        else{
            $this->warn=$this->language[1];
        }
    }
    public function menu($name,$page,$subname=array(""),$subpage=array("")){
        if ($page!="#"){
            $link='index.php?page='.$page;
        }
        else{ $link=$page; }
        if ( (isset($_GET['page'])) and ($_GET['page']==$page) ){ $color="#CCC"; }else{ $color="#FFF"; }
        echo '<li id="'.$page.'"><img src="images/arrow.ico" /><a style="color:'.$color.';" href="'.$link.'">'.$name.'</a></li>';
        if (strlen($subname[0])>0){
            $i=0;
            echo '<ul class="amenu">';
            foreach ($subname as $value) {
                echo '<li><a href="index.php?page='.$subname[$i].'">'.$value.'</a></li>';
                $i++;
            }
            echo '</ul>';
        }
    }
    public function post_update($name,$table,$id,$warn){
        $data=NULL;
        if (isset($_POST[$name])){
            $count=0;
            $emp=0;
            foreach ($_POST as $key => $val){
                $count++;
                if ($key!=$name){
                    if ($count>1){  $v=","; }else{ $v=NULL; }
                    $data=$key."='".addslashes($_POST[$key])."'".$v.$data;
                    if (strlen($_POST[$key])<1){ $emp=1; }
                }
            }
            if ($emp==0){
                if ($this->update($table,$data,"where id='".addslashes($id)."'")==true){ $this->warn=$this->language[2]; }
                else{ $this->warn=$this->language[3]; }
            }
            else{
                $this->warn=$this->language[1];
            }
        }else{ $this->warn=$warn; }
    }
    public function post_insert($name,$table,$warn){
        $column=NULL;
        $data=NULL;
        if (isset($_POST[$name])){
            $count=0;
            $emp=0;
            foreach ($_POST as $key => $val){
                $count++;
                if ($key!=$name){
                    if ($count>1){  $v=","; }else{ $v=NULL; }
                    $column=$key.$v.$column;
                    $data="'".addslashes($_POST[$key])."'".$v.$data;
                    if (strlen($_POST[$key])<1){ $emp=1; }
                }
            }
            if ($emp==0){
                if ($this->insert($table,$column,$data)==true){ $this->warn=$this->language[4]; }
                else{ $this->warn=$this->language[5]; }
            }
            else{
                $this->warn=$this->language[1];
            }
        }
        else{
            $this->warn=$warn;
        }
    }
    public function list_records($table,$title=array(""),$column=array(""),$where="",$filter="",$pic="0"){
        $select=NULL;
        $total=count($column);
        $i=0;
        $edit=$_GET['page']."_edit";
        $add=$_GET['page']."_add";
        $file="pics";
        if (!isset($_GET['pg'])){ $pg="0"; }
        else{ $pg=intval($_GET['pg']); $pg=($pg-1)*15; }
        if (!isset($_GET['filter'])){ $_GET['filter']=NULL; }
        echo '<div id="filter">';
        $this->view->form("GET","",0);
        echo '<input type="text" name="filter" id="fil" autocomplete="off" value="'.$_GET['filter'].'" /><input type="hidden" name="page" id="sa" value="'.$_GET['page'].'" />';
        echo '<input type="submit" name="filter_buton" id="filter_buton" value="'.$this->language[9].'" class="filter_buton" />';
        $this->view->form_close();
        echo '<button class="buton_add" onclick="add(\''.$add.'\',\''.$table.'\');" type="button" title="'.$this->language[6].'" >'.$this->language[6].'</button>';
        echo '<button class="buton_refresh" onclick="window.top.location.href=window.top.location;" type="button" title="'.$this->language[7].'" >'.$this->language[7].'</button>';
        $this->view->form("POST","",0,"","","multi_del");
        echo '<input type="hidden" name="del_table" id="del_table" value="'.$table.'" /><input type="hidden" name="del_hide" id="del_hide" value="1" /><button class="buton_del" onclick="multi_delete(\'multi_del\',\''.$this->language[12].'\');" type="button" title="'.$this->language[8].'" >'.$this->language[8].'</button>';
        echo '<div class="clear"></div></div><div class="clear"></div>';
        echo '<ul class="tit">';
        echo '<li><img src="images/circle.ico" />'.$this->language[10].'</li>';
        foreach ($column as $value) {
            echo '<li><img src="images/list.ico" />'.$title[$i].'</li>';
            $i++;
            if ($total>1 && $total!=$i ){$select=$select.",".$value;}
            else if($total==1){ $select=$value; }
            else{ $select=$value.$select; }
        }
        echo '<li><img src="images/edithand.ico" />'.$this->language[11].'</li><div class="clear"></div></ul>';

        if ( (!isset($filter)) or (!isset($_GET['filter'])) ){
            $sql="Select $select from $table order by id $where LIMIT $pg,15";
            $this->mquery("Select $select from $table");
            $total=$this->total_record();
        }
        else{
            $sql="Select $select from $table where $filter LIKE '%".addslashes($_GET['filter'])."%' order by id LIMIT $pg,15";
            $this->mquery("Select $select from $table where $filter LIKE '%".addslashes($_GET['filter'])."%' order by id");
            $total=$this->total_record();
        }
        $k=$pg;
        $all_records=$this->multiple_select($sql);
        foreach ($all_records as $record){
            $i=0;
            $k++;
            echo '<ul class="tit2">';
            echo '<li><div><input type="checkbox" name="kill_all[]" value="'.$record['id'].'"/>'.$k.'</div></li>';
            foreach ($column as $value) {
                $select=NULL;
                $select=$column[$i];
                echo '<li><div>'.stripslashes($record[$select]).'</div></li>';
                $i++;
            }
            echo '<li>';
            if ($pic=="1"){
                echo '<img style="cursor:pointer;" onclick="edit(\''.$record['id'].'\',\''.$file.'\',\''.$table.'\');" src="images/picture.ico" title="'.$this->language[13].'" />';
            }
            echo '<img style="cursor:pointer;" onclick="edit(\''.$record['id'].'\',\''.$edit.'\',\''.$table.'\');" src="images/edit3.ico" title="'.$this->language[14].'" /><img onclick="del(\''.$record['id'].'\',\''.$table.'\',\''.$this->language[16].'\');" style="cursor:pointer;" src="images/trash.ico" title="'.$this->language[15].'" /></li><div class="clear"></div></ul>';
        }
        if ($total==0){ echo '<ul class="tit2"><li style="width:100%; font-weight:bold;"><img src="images/error.ico" />'.$this->language[17].'</li><div class="clear"></div></ul>'; }
        $this->view->form_close();
        $this->pagination($total);
    }
    private function pagination($total){
        echo '<div class="total_rec">'.$this->language[18].' '.$total.'</div>';
        if (!isset($_GET['pg'])){ $pg=1; }else{ $pg=intval($_GET['pg']); }
        if (!isset($_GET['filter'])){ $_GET['filter']=NULL; }
        $loop=intval($total/15);
        $set=$total%15;
        if ($set!=0){ $loop=$loop+1; }
        echo '<div class="sec"><select class="slc" onchange="window.top.location=\'index.php?filter='.$_GET['filter'].'&page='.$_GET['page'].'&pg=\'+this.value;">';
        $i=0;
        while ($i<$loop){
            $i++;
            if ($pg==$i){ $s='selected="selected"'; }else{ $s=""; }
            echo '<option '.$s.' value="'.$i.'">'.$i.'</option>';
        }
        echo '</select></div>';
    }
    private function delete_record(){

        try{
            $table=addslashes($_GET['table']);
            $id=intval($_GET['id']);
            $redirect=urldecode($_GET['redirect']);
            $this->delete($table,"where id='".addslashes($id)."'");
            $this->delete_pic($table,$id);
            header("Location:".$redirect);
        }
        catch (Exception $e ) {
            header("Location:index.php");
            exit;
        }
    }
    private function multi_del($table,$ids=array("")){
        try{
            $kill=join(",",$ids);
            $this->delete("$table","where id IN (".$kill.")");
            foreach ($ids as $id) {
                $this->delete_pic($table,$id);
            }
        }
        catch (Exception $e ) { }
    }

    public function upload_pics($table,$id,$param="files"){
        if (isset($_FILES[$param])){
            include_once "pic_upload.php";
            $photo=new load($table,$id,$_FILES[$param],$this->mysqli);
        }
    }
    private function delete_pic($table,$id){
        $sql="Select * from photo where table_name='$table' and record_id='$id'";
        $all_records=$this->multiple_select($sql);
        foreach ($all_records as $value){
            $pic="../uploads/".$value['photo'];
            if (file_exists($pic)){ chmod($pic, 0777); unlink($pic); }
        }
        $this->delete("photo","where table_name='".$table."' and record_id='".$id."'");
    }
    public function list_pics($table="general",$id="1"){
        $sql="select * from photo where record_id='".addslashes($id)."' and table_name='".$table."'";
        $all_records=$this->multiple_select($sql);
        foreach ($all_records as $value){
            echo '<div class="pic_box"><a target="_blank" href="'.$this->site_url.'uploads/'.$value['photo'].'"><img width="100" height="100" src="'.$this->site_url.'panel/image.php?photo=../uploads/'.$value['photo'].'&w=100&h=100" /></a>';
            $this->view->form("POST","",0);
            echo '<input type="hidden" id="id" name="id" value="'.$value['id'].'" />';
            if ($value['orderby']=="normal"){
            $this->view->submit("submit","mainpic",$this->language[28]); // main_pic("mainpic"); is the submit button name //
            echo '<input type="hidden" id="table" name="table" value="'.$value['table_name'].'" />';
            echo '<input type="hidden" id="record_id" name="record_id" value="'.$value['record_id'].'" />';
            }
            $this->view->submit("submit","trash",$this->language[27]);
            $this->view->form_close();
            echo '</div>';
        }
        echo '<div class="clear"></div>';
    }
    public function delete_this_pic($post){
        if (isset($_POST[$post])){
            $sql="Select * from photo where id='".intval($_POST['id'])."'";
            $value=$this->select($sql);
            if ($value){
                $pic="../uploads/".$value['photo'];
                if (file_exists($pic)){ chmod($pic, 0777); unlink($pic);  }
                $this->delete("photo","where id='".intval($_POST['id'])."'");
            }
        }
    }
    public function main_pic($post){
        if (isset($_POST[$post])){
            $this->update("photo","orderby='normal'","where table_name='".addslashes($_POST['table'])."' and record_id='".intval($_POST['record_id'])."'");
            $this->update("photo","orderby='main'","where id='".intval($_POST['id'])."'");
        }
    }
    public function db_optimize(){
        $this->optimize($this->language[19],$this->language[20]);
    }
    public function select_single_query($table,$where){
        $sql="select * from ".$table." ".$where;
        $this->view_query=$this->select($sql);
    }
    protected function insert_query($query){
        return $this->insert($query);
    }
    protected function db_backup(){
        $db_file=date("Y_m_d-H:i:s")."_sitedb.sql";
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: text/plain");
        header("Content-Disposition: attachment;filename=\"".$db_file."\"");
        $this->save_db();
        exit();
    }
    public function __destruct() {
        if ($this->sql==0){ $this->db_close(); }
        ob_flush();
        ob_end_flush();

  			 }

 }



?>