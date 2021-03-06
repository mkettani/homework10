<?php
date_default_timezone_set('America/New_York');
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');
        
       

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates

        // convert date strings to DateTime objects
        // and use a try/catch to make sure the dates are valid

        // make sure the due date is after the invoice date

        // format both dates
        $invoice_date_f = date ( 'F d, Y', strtotime($invoice_date_s));
        $due_date_f = date ( 'F d, Y', strtotime($due_date_s));
        
        // get the current date and time and format it
        $current_date_f = date ('F d, Y');
        $current_time_f = date("h:i:sa");
        
        // get the amount of time between the current date and the due date
        // and format the due date message
        $due_date_message = 'This invoice is 0 years, 2 months, and 25 days overdue.' ;
       
        

        break;
}
include 'date_tester.php';
?>
