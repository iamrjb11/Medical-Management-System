<?php


// Hall related model
class Hall{
    private $_ID;
    private $_name;
    private $_Description;
    private $_Provost;


    public function setID ( $ID ) {
        $this->_ID = $ID;
    }

    public function getID () {
        return $this->_ID;
    }
    public function setName ($Name){
        $this->_name = $Name;
    }
    public function getName(){
        return $this->_name;
    }

    public function setDescription ($Description){
        $this->_Description = $Description;
    }
    public function getDescription(){
        return $this->_Description;
    }

    public function setProvost ( $Provost ) {
        $this->_Provost = $Provost;
    }

    public function getProvost () {
        return $this->_Provost;
    }

}

?>