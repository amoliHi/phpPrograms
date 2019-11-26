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
    //@var avail to store availability of Doctor
    public $avail;
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
function detailentry($doctor_arr,$patient_arr)
{
    echo "Enter D to enter details of Doctor.\nEnter P to enter details of Patient.\n";
    $input = Utility::getString();
    if ($input == "D") 
        createDoctor($doctor_arr);
     elseif($input=="P")
         createPatient($patient_arr);
     else{
         echo "WRONG ENTRY !!!!\n";
         echo "Please provide input from the given options.\n";
         detailentry($doctor_arr,$patient_arr);
     }
}

function createDoctor($doctor_arr)
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
}

function createPatient($patient_arr)
{
    //@var Doctor to store the object of Doctor class
    $Patient = new Patient();
    echo "Enter Patient name : \n";
    $Patient->name = Utility::getString();
    echo "Enter Patient's Id. number : \n";
    $Patient->id = Utility::getInt();
    echo "Enter Patient's mobile number : \n";
    $Patient->mob = Utility::getString();
    echo "Enter Patient's age : \n";
    $Patient->age = Utility::getInt();
    //adding Doctor information to the array $doctor_arr
    $patient_arr[] = $Patient;
}

$doctor_arr = json_decode("CliniqueMgmt.txt");

function clinicMgmt(){

}
