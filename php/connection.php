<?php 


class Connection {

    private $ccc;

    public function getConnection($url){
        $this->ccc = curl_init();
        curl_setopt($this->ccc, CURLOPT_URL, $url);
        curl_setopt($this->ccc, CURLOPT_RETURNTRANSFER, true);
        $r=curl_exec($this->ccc);
        curl_close($this->ccc);
        return $r;
    }


    
}

?>