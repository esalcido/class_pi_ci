<?php


class Chart extends CI_Model{
	
	var $bored ='';
	var $interested ='';
	var $lost ='';
	var $intrigued ='';
	var $content ='';

function __construct()
{
	//call the Model Constructor
	parent::__construct();
}

function get_chart_values(){

	 //get data from db to plug into the chart
        $query = $this->db->get('interest');
        
        foreach($query->result() as $row){
            $bored =      $row->bored;
            $interested=  $row->interested;
            $lost=        $row->lost;
            $intrigued=   $row->intrigued;
            $content=     $row->content;
        }

        //storing data from db into an array to pass to the view
        $data = array(
                    'bored'=>$bored,
                    'interested'=>$interested,
                    'lost'=>$lost,
                    'intrigued'=>$intrigued,
                    'content'=>$content
                    );

        return $data;

}


}