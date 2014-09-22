<?php
/**
* by can yalçın
*/
class site extends model
{
    protected $w_folder;
    private $sql = 1;
    public $vars;
    public function site($server,$user,$pass,$database,$base)
    {
        ob_start();
        session_start();
        header('Content-Type: text/html; charset=utf-8');
        $this->w_folder=$base;
        $this->sql = $this->connect_db($server,$user,$pass,$database);
        $this->general_opt();
        $this->check_page();
    }
    public function general_opt()
    {
        $query=$this->select("Select * from general inner join photo On general.id=photo.record_id and photo.table_name='general' limit 1");
        $this->vars['title']=stripslashes($query['title']);
        $this->vars['desc']=stripslashes($query['description']);
        $this->vars['keys']=stripslashes($query['keywords']);
        $this->vars['fb']=stripslashes($query['facebook']);
        $this->vars['tw']=stripslashes($query['twitter']);
        $this->vars['logo']=stripslashes($query['photo']);
        $this->vars['content']=stripslashes($query['content']);
        $this->vars['footer']=stripslashes($query['footer_text']);
    }
    public function check_page()
    {
        if (isset($_GET['page']))
        {
            if ($_GET['page']=="ide" || $_GET['page']=="products")
            {
                $this->inc="list";
            }
            else
            {
                $this->inc="content";
            }
            $this->pg_details();
        }
        else
        {
            $this->inc="content";
        }
    }
    public function pg_details()
    {
        if ($_GET['page']=="cv" || $_GET['page']=="os"){ $this->load_page(addslashes($_GET['page'])); }
        elseif ($_GET['page']=="ide" || $_GET['page']=="products"){ $this->list_page(addslashes($_GET['page'])); }
        elseif($_GET['page']=="detail_ide"){  if (isset($_GET['id'])) $this->load_page("ide",addslashes(intval($_GET['id'])));  }
        else{ if (isset($_GET['id'])) $this->load_page("products",addslashes(intval($_GET['id'])));   }
    }
    public function load_page($table,$id=1)
    {
        $query=$this->select("Select * from ".$table." left join photo On photo.record_id=".$table.".id and photo.orderby='main' and photo.table_name='".$table."' where ".$table.".id='".$id."'");
        $this->vars['title']=stripslashes($query['title']);
        $this->vars['desc']=stripslashes($query['description']);
        $this->vars['keys']=stripslashes($query['keywords']);
        $this->vars['content']=stripslashes($query['content']);
        $this->vars['cont_photo']=($query['photo']);
    }
    public function list_page($table)
    {

        $query=$this->multiple_select("Select ".$table.".id,".$table.".title,".$table.".content,photo.photo,photo.record_id,photo.table_name from ".$table." left join photo On ".$table.".id=photo.record_id and photo.orderby='main' and photo.table_name='".$table."'");
        $this->vars['list_all']=$query;
        if ($table=="ide")
        {
            $this->vars['title']="Ide liste";
            $this->vars['desc']="kullandığım ide'ler";
            $this->vars['keys']="ide,code,programing,php,python,ruby,ide,editor";
        }
        else
        {
            $this->vars['title']="Products liste";
            $this->vars['desc']="products";
            $this->vars['keys']="products,code,programing,php,python,ruby";
        }

    }
    public function seo_url($title){
            $title = str_replace(array("&quot;","&#39;"), NULL, $title);
            $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', ' ');
            $swap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '-');
            $url = strtolower(str_replace($find, $swap, $title));
            $url = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $url);
            $url = trim(preg_replace('/\s+/',' ', $url));
            return $url;
    }
    public function __destruct()
    {
        if ($this->sql==0){ $this->db_close(); }
        ob_flush();
        ob_end_flush();

    }
}
?>