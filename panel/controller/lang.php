<?php

class lang{
    public $lng=array();
    public function lang($lg="tr"){
        $this->load($lg);
    }
    protected function load($lg){
        if ($lg=="tr"){
            $this->lng[0]="Hatalı şifre yada kullanıcı adı";
            $this->lng[1]="Lütfen alanları boş geçmeyin";
            $this->lng[2]="Güncelleme Başarılı";
            $this->lng[3]="Güncelleme başarısız";
            $this->lng[4]="Kayıt eklendi";
            $this->lng[5]="Kayıt eklenemedi";
            $this->lng[6]="Ekle";
            $this->lng[7]="Yenile";
            $this->lng[8]="Seçtiklerimi sil";
            $this->lng[9]="Ara";
            $this->lng[10]="Sıra";
            $this->lng[11]="İşlemler";
            $this->lng[12]="Hepsi silinecek ?";
            $this->lng[13]="Fotğraf ekle";
            $this->lng[14]="Düzenle";
            $this->lng[15]="Sil";
            $this->lng[16]="nolu kaydı silmek istediğinizden emin misiniz ?";
            $this->lng[17]="Kayıt Yok";
            $this->lng[18]="Toplam Kayıt :";
            $this->lng[19]="<-tablo onarıldı";
            $this->lng[20]="<-tablo onarılamadı !";
            $this->lng[21]="Güvenli Çıkış";
            $this->lng[22]="Veritabanını Yedekle";
            $this->lng[23]="Veritabanını Onar";
            $this->lng[24]="Site";
            $this->lng[25]="Lütfen Bekleyin";
            $this->lng[26]="Yüklendi";
            $this->lng[27]="Foto'yu Sil";
            $this->lng[28]="Ana Foto Yap";
        }
        else if ($lg=="en"){
            $this->lng[0]="Error in user or password";
            $this->lng[1]="Please fill all blanks";
            $this->lng[2]="Succsess in update";
            $this->lng[3]="Error in update";
            $this->lng[4]="Succsess in insert";
            $this->lng[5]="Error in insert";
            $this->lng[6]="Insert";
            $this->lng[7]="Refresh";
            $this->lng[8]="Delete all";
            $this->lng[9]="Search";
            $this->lng[10]="Nu.";
            $this->lng[11]="İşlemler";
            $this->lng[12]="Are you sure to delete all ?";
            $this->lng[13]="Add photo";
            $this->lng[14]="Edit";
            $this->lng[15]="Delete";
            $this->lng[16]="This record will be deleted by you. Are you sure ?";
            $this->lng[17]="No record";
            $this->lng[18]="Rows :";
            $this->lng[19]="<-table recovered";
            $this->lng[20]="<-table not recorevered !";
            $this->lng[21]="Logout";
            $this->lng[22]="Download Database";
            $this->lng[23]="Recover Database";
            $this->lng[24]="Web Site";
            $this->lng[25]="Please Wait";
            $this->lng[26]="Loaded";
            $this->lng[27]="Delete";
            $this->lng[28]="Main Pic";
        }
    }
}

?>