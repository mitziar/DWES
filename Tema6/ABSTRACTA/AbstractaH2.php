<?
require_once('./AbstractaH1');

abstract class AbstractaH2 extends AbstractaH1{
    public function soy2(){
        echo "soy 2";
        print_r($this);
    }
}
?>