<?php
class User{
    public $nama;
    public $alamat;
    public function __construct($nama, $alamat){
        $this->nama = $nama;
        $this->alamat = $alamat;
    }
}
class Pembeli extends User{
    public function __construct($nama, $alamat){
        parent::__construct($nama, $alamat);
    }
    public function lacakPaket(){
        return "Paket sedang dilacak";
    }
}
class Kurir extends User{
    public function randomKurir(){
     $random= rand(1,3);

    if ($random == 1){
        $this->nama="andini";
    }else if($random == 2){
        $this->nama="afifah";
    }else{
        $this->nama="gracia";
    }
    }
    public function antarPaket(){
        return "Kurir sedang mengantar paket";
    }
}
class Paket{
    public $nomorResi;
    public $berat;

    public function __construct($nomorResi, $berat){
        $this->nomorResi = $nomorResi;
        $this->berat = $berat;
    }
    public function cekResi(){
        if (strlen($this->nomorResi) == 10){
            return "Valid";
        }else{
            return "Error:Tidak Valid";
    }
}
}
class Gudang{
    public $lokasi;
    public function __construct($lokasi){
        $this->lokasi = $lokasi;
    }
    public function randomGudang(){

        $random=rand(1,3);
        
        if($random == 1){
            $this->lokasi="jaksel";
        }else if($random == 2){
            $this->lokasi="jakbar";
        }else{
            $this->lokasi="jaktim";
        }
    }
}

if(isset($_POST['cekPengiriman'])){
    $pembeli = new Pembeli($_POST['nama'], $_POST['alamat']);
    $kurir = new Kurir("","");
    $kurir->randomKurir();
    $paket = new Paket($_POST['resi'], $_POST['berat']);
    $gudang = new Gudang("");
    $gudang->randomGudang();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Sistem Pengiriman Paket
    </title>
    <style>
body{
    font-family: Arial, sans-serif;
    background: #f4f7fc;
    margin: 0;
    padding: 30px;
}

.container{
    width: 500px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

h2{
    text-align: center;
    color: #2c3e50;
}

h3{
    color: #3498db;
    border-bottom: 2px solid #3498db;
    padding-bottom: 5px;
}

label{
    font-weight: bold;
}

input{
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button{
    width: 100%;
    padding: 12px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover{
    background: #2980b9;
}

.hasil{
    margin-top: 20px;
    background: #eef7ff;
    padding: 15px;
    border-radius: 8px;
    border-left: 5px solid #3498db;
}

ul{
    background: #f8f9fa;
    padding: 15px 30px;
    border-radius: 8px;
}

li{
    margin: 8px 0;
}

b p{
    color: #2c3e50;
    font-size: 18px;
}
</style>
</head>

<body>

<div class="container">
<h2>Sistem Pengiriman Paket</h2>

<form method="post">
    Nama Pembeli :
    <input type="text" name="nama"><br><br>
    Alamat :
    <input type="text" name="alamat"><br><br>
    Nomor Resi :
    <input type="text" name="resi"><br><br>
    Berat Paket :
    <input type="number" name="berat"><br><br>

    <button type="submit" name="cekPengiriman">Cek Pengiriman</button>
</form>

<?php
if(isset($_POST['cekPengiriman'])){
?>
<div class="hasil">

echo "<h3>Riwayat Pengiriman Paket</h3>";
<?php
    echo "Nama Pembeli : ".$pembeli->nama."<br>";
    echo $pembeli->lacakPaket()."<br>";
    echo "Alamat : ".$pembeli->alamat."<br>";
    echo "Nomor Resi : ".$paket->nomorResi."<br>";
    echo "Validasi Resi : ".$paket->cekResi()."<br>";
    echo "Berat Paket : ".$paket->berat." Kg<br>";
    echo "Kurir : ".$kurir->nama."<br>";
    echo $kurir->antarPaket()."<br>";
    echo "Gudang : ".$gudang->lokasi."<br><br>";
}
?>
<b><p>Status Paket</p></b>
<ul>
    <li>Paket Sedang Dilacak</li>
    <li>Kurir Sedang Mengantar Paket</li>
    <li>Dalam Pengiriman</li>
    <li>Paket Telah Di terima</li>
</ul>
</div>
</body>
</html>