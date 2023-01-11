
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CSV_file extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Csv_file_Model');
    }

    function index()
    {
        $data['student_data'] = $this->Csv_file_Model->get_data();
        $this->load->view('csv_file', $data);
    }

    function export()
    {
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=orders.csv");
        header("Content-Type: application/csv;");

        // get data
        $student_data = $this->Csv_file_Model->get_data();

        // file creation
        $file = fopen('php://output', 'w');

        $header = array("Tracking Number" , "Order Id");
        fputcsv($file, $header);
        foreach ($student_data->result_array() as $key => $value)
        {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }


}
