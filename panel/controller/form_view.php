<?php
class view{
    public function form($method,$action="",$file=0,$target="",$onpointer="",$name=""){
        if ($file==0){
    	   echo '<form name="'.$name.'" id="'.$name.'" target="'.$target.'" method="'.$method.'" action="'.$action.'" '.$onpointer.' >';
        }else{
            echo '<form name="'.$name.'" id="'.$name.'" target="'.$target.'" method="'.$method.'" action="'.$action.'"  enctype="multipart/form-data" '.$onpointer.' >';
        }
    }
    public function form_close(){
        echo '</form>';
    }
	public function nick($class="",$name="text",$label){
        echo '<div class="line"><label>'.$label.'</label><input autocomplete="off" type="text" name="'.$name.'" id="'.$name.'" class="'.$class.'"  /></div>';
    }
    public function pass($class="",$name="pass",$label){
        echo '<div class="line"><label>'.$label.'</label><input type="password" name="'.$name.'" id="'.$name.'" class="'.$class.'"  /></div>';
    }
    public function submit($class="submit",$name="ok",$label=""){
        echo '<div class="line"><label></label><input type="submit" value="'.$label.'" name="'.$name.'" id="'.$name.'" class="'.$class.'"  /></div>';
    }
    public function varchar($class="",$name="text",$label,$value){
        $value=stripslashes($value);
        echo '<div class="line"><label><img src="images/edit1.ico" />'.$label.'</label><input type="text" name="'.$name.'" id="'.$name.'" class="'.$class.'" value="'.$value.'" /></div>';
    }
    public function text($class="",$name="text",$label,$value){
        $value=stripslashes($value);
        echo '<div class="line"><label><img src="images/edit2.ico" />'.$label.'</label><textarea name="'.$name.'" id="'.$name.'" class="'.$class.'"  >'.$value.'</textarea></div>';
    }
    public function ckeditor($class="",$name="text",$label,$value,$url){
        $value=stripslashes($value);
        $url=$url."ckeditor/";
        echo '<div class="line"><label style="float:left;"><img src="images/edit2.ico" />'.$label.'</label><div class="editor"><textarea name="'.$name.'" id="'.$name.'" class="'.$class.'">'.$value.'</textarea></div></div>';
        echo "<script type='text/javascript'>
              CKEDITOR.replace( '".$name."',{
              toolbarCanCollapse : true,
              height : 300,
              defaultLanguage : 'tr',
              resize_enabled : false,
              enterMode : CKEDITOR.ENTER_BR,
              toolbarStartupExpanded : false,
              filebrowserBrowseUrl: '".$url."ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl: '".$url."ckfinder/ckfinder2.php?Type=Images',
              filebrowserFlashBrowseUrl: '".$url."ckfinder/ckfinder2.php?Type=Flash',
              filebrowserUploadUrl: '".$url."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
              filebrowserImageUploadUrl: '".$url."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
              filebrowserFlashUploadUrl: '".$url."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                    });
              </script>";
        echo '<div class="clear"></div>';
    }
    public function radio($class="",$name="r",$label,$options,$value){
        $value=stripslashes($value);
        echo '<div class="line"><label><img src="images/check1.ico" />'.$label.'</label>';
        foreach ($options as $option) {
            if ($option==$value){
                echo '<input type="radio" name="'.$name.'" id="'.$name.'" class="'.$class.'" value="'.$option.'" checked>'.$option;
            }else{
                echo '<input type="radio" name="'.$name.'" id="'.$name.'" class="'.$class.'" value="'.$option.'" >'.$option;
            }
        }
        echo '</div>';
    }
    public function file($class="",$name="text",$label,$value){
        $value=stripslashes($value);
        echo '<div class="line"><label><img src="images/picture.ico" />'.$label.'</label><input type="file" name="'.$name.'[]" id="'.$name.'[]" class="'.$class.'" value="'.$value.'" multiple="multiple" /></div>';
    }
    public function sql_combo_box($class="",$name="",$label,$value,$mysql,$table,$where="",$column="id",$title="title"){
        $value=stripslashes($value);
        echo '<div class="line"><label><img src="images/check1.ico" />'.$label.'</label><select name="'.$name.'" id="'.$name.'" class="'.$class.'" />';
        $sorgu=$mysql->query("select * from $table ".$where);
        while ($list=$sorgu->fetch_array(MYSQLI_ASSOC)){
            if ($value==$list[$column]){ $select="selected"; }else{ $select=""; }
                echo '<option value="'.$list[$column].'" '.$select.'>';
                echo $list[$title];
                echo '</option>';
        }
        echo '</select></div>';
    }
    public function add_pic($class="",$name="text",$label="Add",$table="",$id="",$label2="Picture"){
        echo '<div class="line"><label><img src="images/picture.ico" />'.$label.'</label><a href="javascript:edit(\''.$id.'\',\'pics\',\''.$table.'\');" class="'.$class.'">'.$label2.'</a></div>';
    }

}
?>