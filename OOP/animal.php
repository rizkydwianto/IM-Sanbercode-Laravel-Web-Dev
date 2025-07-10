<?php
class animal {
    public $legs = 4;
    public $cold_blooded = "no";
    public $jenis;

    public function __construct($nama) {
        $this->jenis =$nama;
    }

}
class buduk {
    public $legs = 4;
    public $cold_blooded = "no";
    public $jump = "Hop Hop";
    public $jenis;

    public function __construct($nama) {
        $this->jenis =$nama;
    }

}
class kera {
    public $legs = 4;
    public $cold_blooded = "no";
    public $yell = "Auooo";
    public $jenis;

    public function __construct($nama) {
        $this->jenis =$nama;
    }

}
?>

