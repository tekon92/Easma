<?php
  class load{

  				private $mysql;
  				private $table;
  				private $id;
  				private $photos;
  				private $folder="../uploads";
  				private $file_name;
  				public function load($table,$id,$photo=array(""),$mysql){

  						$this->mysql=$mysql;
  						$this->table=$table;
  						$this->id=$id;
  						$this->photos=$photo;
  						$this->copy();


  				}
  				private function files(){

  							$total= count ($this->photos['name']);
  							$keys= array_keys($this->photos);
  							 for ($i=0; $i<$total; $i++) {
        						foreach ($keys as $key) {
            						$file_ary[$i][$key] = $this->photos[$key][$i];

        												}
    												}

    					return $file_ary;
  				}

  				private function copy(){
  						  $f_type= array("image/jpeg","image/png","image/gif");
  						  $files=$this->files();
  						  foreach ($files as $file) {

                          if ($file['error'] == UPLOAD_ERR_OK) {
  						    if (in_array($file['type'], $f_type)){

	                          $up=$this->upload($file['tmp_name'],$file['name']);
	                          if ($up=="true"){

                               $this->add_table();
	                           sleep(0.3);
	                                          }


  						      }
  						   }

  						  }

  				}
  				private function upload($tmp_name,$file_name){

                       if (opendir($this->folder)){
                       		$time=localtime();
                            $file_name=date("d-m-Y")."-".$time[0].$time[5].$time[7]."-".$file_name;
                       		if (move_uploaded_file($tmp_name, $this->folder."/".$file_name)){ chmod($this->folder."/".$file_name,0644); $this->file_name=$file_name; return "true"; }else{ return "false"; }


                       }else{ return "false"; }



  				}
  				private function add_table($table="photo"){


  						       $query="INSERT INTO ".$table."(photo,table_name,record_id,orderby)VALUES('".addslashes($this->file_name)."','".addslashes($this->table)."','".addslashes($this->id)."','normal')";
          					   $this->mysql->query($query);



  				}

  }


?>
