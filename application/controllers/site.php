<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
    
    public function index(){
        //echo "index<br>";
        $this->home();
    }
    
    public function home(){
        
        //load the database class
        $this->load->database();

        //load the chart model 
        $this->load->model('Chart');

        //form validation
        $this->load->library('form_validation');

        //getting the values for the chart from DB
        $data = $this->Chart->get_chart_values();


        //title
        $data['title'] = "Welcome";
        $data['homePage'] = base_url()."site/";
        $data['sitename'] = "ClassPi";

        //Display the Home Page
        $this->load->view("layout/header",$data);
        $this->load->view("view_home",$data);
        $this->load->view("layout/footer",$data);
   

    }


    public function displayQuiz(){
        //title
        $data['title'] = "Welcome";
        $data['homePage'] = base_url()."site/";
        $data['sitename'] = "ClassPi";

        

        // $data['json'] = array(
        //          "name"=>  "Test My Knowledge!!",
        //     "main"=>   "<p>Think you're smart enough to be on Jeopardy? Find out with this super crazy knowledge quiz!</p>",
        //     "results"=> "<h5>Learn More</h5><p>Etiam scelerisque, nunc ac egestas consequat, odio nibh euismod nulla, eget auctor orci nibh vel nisi. Aliquam erat volutpat. Mauris vel neque sit amet nunc gravida congue sed sit amet purus.</p>",
        //     "level1"=>  "Jeopardy Ready",
        //     "level2"=> "Jeopardy Contender",
        //     "level3"=>  "Jeopardy Amateur",
        //     "level4"=>  "Jeopardy Newb",
        //     "level5"=>  "Stay in school, kid..." 
        //     "questions" => array(
        //                     "q"=>"what is the letter A in the English alphabet?",
        //                     "a"=> array(
        //                             "option" : 

        //                             );
        //                     );

        //     );

        $this->load->view("layout/header-quiz",$data);
        $this->load->view('view_take_quiz',$data);
        $this->load->view("layout/footer",$data);
    }

    public function ajax_call(){

        $this->load->model('Chart');

        $data= $this->Chart->get_chart_values();
        
        $this->output->set_content_type('application/json');
        
        
    

        $this->output->set_output(json_decode($myQuizJSON));
        
        echo json_decode($myQuizJSON);

        return $data;

        redirect('displayQuiz');

    }
  
}