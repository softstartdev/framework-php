<?php
class InputTypeSelect{
	
    private $datas;
    private $name;
	private $selected;

    private $event  = ""; // onclick
    private $action = ""; // filtrar()
    private $class  = ""; // class='filter'
    
    function __construct($datas, $name, $selected = ""){
        $this->datas    = $datas;
        $this->name     = $name;
        $this->selected = $selected;
    }

    public function addAction($event, $action){
        $this->event  = $event;
        $this->action = $action;
    }

    public function addClass($class){
        $this->class = $class;
    }

    public function render($indexIds, $indexNames){
        
    	$html = "";
        
    	if($this->action !== "" && $this->event !== ""){
            $action = "$this->event = '$this->action'";
        }else{
            $action = "";
        }

        $html .= "<select name='$this->name' $action class='$this->class' >";
        $html .= "<option value='' > - - - </option>";
        foreach($this->datas as $data){
            if($this->selected !== "" && $this->selected == $data[$indexIds]){
                $html .= "<option value='{$data[$indexIds]}' selected='selected' >{$data[$indexNames]}</option>";
            }else{
                $html .= "<option value='{$data[$indexIds]}'>{$data[$indexNames]}</option>";
            }
        }
        $html .= "</select>";
        
        return $html;
    }
    
}//fin de class
?>