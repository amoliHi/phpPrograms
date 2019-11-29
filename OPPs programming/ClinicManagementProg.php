<?php

/**
 * class Doctor for declaring variables to store Doctor's data
 */
class Doctor
{
    //@var name to store name of Doctor
    public $name;
    //@var id to store id. number of Doctor
    public $id;
    //@var special to store specialization of Doctor
    public $special;
    //@var am to store morning availability time of Doctor
    public $am;
    //@var pm to store evening availability time of Doctor
    public $pm;
}

/**
 * class Patient for declaring variables to store Patient's data
 */
class Patient
{
    //@var name to store name of Patient
    public $name;
    //@var id to store id. number of Patient
    public $id;
    //@var mob to store mobile number of Patient
    public $mob;
    //@var age to store age of Patient
    public $age;
}

/**
 * Function to enter Doctor's or Patient's data as per requirement
 * 
 * @param doctor_arr array that will contain Doctor's data
 * @param patient_arr array that will contain Patient's data
 */
function detailentry($file)
{
    echo "Enter D to enter details of Doctor.\nEnter P to enter details of Patient.\n";
    //@var $str $input hold user input
    $input = Utility::getString();
    if ($input == "D")
        createDoctor($file);
    elseif ($input == "P")
        createPatient($file);
    else {
        echo "WRONG ENTRY !!!!\n";
        echo "Please provide input from the given options.\n";
        detailentry($file);
    }
}


/**
 * Function to search doctor's from the list
 *
 * @param $arr hold doctor's data in form of array
 * @return int $i - index of the searched item or -1 if not found  
 */
function searchdoctor($arr)
{
    echo "Enter Doctor name : \n";
    $name = Utility::getString();
    echo "Enter Id. number : \n";
    $id = Utility::getString();
    echo "Enter specialization :";
    $special = Utility::getString();
    //loop for traversing and searching person details in array as per user input
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]->fname == $name || $arr[$i]->id == $id || $arr[$i]->special == $special)
            return $i;
    }
    return -1;
}

/**
 * Function to search patient data in array
 *
 * @param $arr hold patient data in form of array
 * @return int $i - index of the searched item or -1 if not found 
 */
function searchPatient($arr)
{
    echo "Enter Patient name : \n";
    $name = Utility::getString();
    echo "Enter Id. number : \n";
    $id = Utility::getString();
    echo "Enter Mob. number :";
    $special = Utility::getString();
    //loop for traversing and searching person details in array as per user input
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i]->fname == $name || $arr[$i]->id == $id || $arr[$i]->special == $special)
            return $i;
    }
    return -1;
}

/**
 * Function to create doctor object and take doctor's data
 * 
 * @param $file - contain data of doctor in the form of array
 * @return void
 */
function createDoctor($file)
{
    //@var Doctor to store the object of Doctor class
    $Doctor = new Doctor();
    echo "Enter Doctor's name : \n";
    $Doctor->name = Utility::getString();
    echo "Enter Doctor's Id. number : \n";
    $Doctor->id = Utility::getInt();
    echo "Enter Doctor's Specialization : \n";
    $Doctor->special = Utility::getString();
    echo "Enter Doctor's availability : \n";
    echo "Morning from : \n";
    $Doctor->am = (Utility::getInt() . " am");
    echo "Till Evening : \n";
    $Doctor->pm = (Utility::getInt() . " pm");
    //adding Doctor information to the array $doctor_arr
    $doctor_arr[] = $Doctor;
    Utility::putJsonin($doctor_arr, $file);
}


/**
 * Function to create patient object and take patients's data
 * 
 * @param $file - contain data of patient in the form of array
 * @return void
 */
function createPatient($file)
{
    //@var $patient to store the object of Doctor class
    $patient = new Patient();
    echo "Enter Patient name : \n";
    $patient->name = Utility::getString();
    echo "Enter Patient's Id. number : \n";
    $patient->id = Utility::getInt();
    echo "Enter Patient's mobile number : \n";
    $patient->mob = Utility::getString();
    echo "Enter Patient's age : \n";
    $patient->age = Utility::getInt();
    //adding Patients information to the array $doctor_arr
    $patient_arr[] = $patient;
    Utility::putJsonin($patient_arr, $file);
}

/**
 * Function to print doctor's details from Clinique management Book
 * 
 * @param $arr array containing the data of doctor
 */
function printDoctor($arr)
{
    // printing clinique management book
    foreach ($arr as $doctor) {
        echo sprintf("Doctor's Name : %s \nId. no. : %u\nSpecialist of : %s\nTimings:-\nMorning from : %u am\nTill Evenimg : %u\n\n",
            $doctor->name,
            $doctor->id,
            $doctor->special,
            $doctor->am,
            $doctor->pm,
        );
    }
}

/**
 * Function to print doctor's details from Clinique management Book
 * 
 * @param $arr array containing the data of doctor
 */
function printPatient($arr)
{
    // printing clinique management book
    foreach ($arr as $patient) {
        echo sprintf("Patients's Name : %s \nId. no. : %u\Mob. no. : %u\nnAge : %u\n\n",
            $patient->name,
            $patient->id,
            $patient->mob,
            $patient->age,
        );
    }
}


/**
	 * Driver function of clinique management program
	 * 
	 * @param $file array containing the person object/details
	 */
function clinicMgmt($file)
{
    echo "\n ....Clinique Management Book....\n\nEnter 1 to add Person Data.\nEnter 2 to search.\n",

        "\nEnter any other number to save and exit.\n";
    $ch = Utility::getInt();
    switch ($ch) {
        case '1':
            detailentry($file);
            clinicMgmt($file);
            break;
        case '2':
        echo "Enter 1 to search for Doctor\nEnter 2 to search for Patient.\n";
        $ch = Utility::getInt();
        if($ch==1){
            $i = searchdoctor($file);
            if ($i > -1) {
                $arr = [];
                $arr[] = $file[$i];
                OPPsProgramLogic::printBook($arr);
            }
            echo "\n";
            fscanf(STDIN, "%s\n");
            OPPsProgramLogic::addressbkmenu($file);
            break;
        }
        elseif($ch==2){
            $i = searchPatient($file);
            if ($i > -1) {
                $arr = [];
                $arr[] = $file[$i];
                OPPsProgramLogic::printBook($arr);
            }
            echo "\n";
            fscanf(STDIN, "%s\n");
            OPPsProgramLogic::addressbkmenu($file);
            break;
        }  
        default:
            break;
    }
}

$file = json_decode(file_get_contents("CliniqueMgmt.txt"));
clinicMgmt($file);
