<?php

class Report extends Controllers{

    public function __construct(){
        parent::__construct();
        session_start();
        if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/Auth');
			die();
		}
    }

     // Views
     public function report(){
        $data['page_tag'] = APP_NAME;
		$data['page_title'] = APP_NAME;
		$data['page_name'] = "Report";
        $data['page_page'] = $this->model->ReportResources();
        $data['page_functions'] = functions($this, "report");
		$this->views->getView($this,"resources_list",$data);
    }

    public function VerReport(){        
        $datos = $this->model->ReportResources();
        
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->setFooter('{PAGENO}');

        ob_start();

        require_once('Views/Report/resources_list.php');

        $html = ob_get_clean();
        // Write some HTML code:
        $mpdf->WriteHTML($html);
        
        // Output a PDF file directly to the browser
        $mpdf->Output();
    }

    }
