<?php
class Paginator{
	
	private $totalResults;
	private $quantity;
    private $page;
    private $start;

    private $totalPages;

    function __construct($totalResults, $page, $quantity){
		
    	$this->totalResults = $totalResults;
    	
    	//cantidad
    	if($quantity == "" || $quantity == null || !is_numeric($quantity) || $quantity <= 0){
    		$this->quantity = 1;
    	}else{
    		$this->quantity = $quantity;
    	}
        
		//pagina actual
        if($page == "" || $page == null || !is_numeric($page) || $page <= 0){
			$this->page  = 1;
			$this->start = 0;
        }else{
            $this->page  = $page;
            $this->start = ($this->page-1) * $this->quantity;
        }

        //calculos
        $this->totalPages = ceil($totalResults/$this->quantity);
    }

    public function getStart(){
    	return $this->start;
    }
    
    public function getQuantity(){
    	return $this->quantity;
    }

    public function getView($url, $name = 'page', $style = 'pagination'){
    	
		$html = "";
		
		if ($this->totalPages > 1){
			
			$html .= "<div class='$style'>";
			
			if($this->page > 1){
				$html .= "<span><a href='$url&$name=" . ($this->page - 1) . "' >&lt;</a></span>";
			}

			for($i=1; $i<=$this->totalPages; $i++){
		   		if($i == $this->page){
		        	$html .= "<span id='current'>$i</span>";
		       	}else{
		       		$html .= "<span><a href='$url&$name=$i' >$i</a></span>";
		       	}
			}
			
			if($this->page < $this->totalPages){
				$html .= "<span><a href='$url&$name=" . ($this->page + 1) . "' >&gt;</a></span>";
			}
			
			$html .= "<div style='clear:both'></div>";
        	$html .= "</div>";
        	
        	$html .= "P&aacute;gina {$this->page} de {$this->totalPages} - Se encontr&oacute; {$this->totalResults} resultados.";
		}
        
        return $html;
    }
    
}//class
?>