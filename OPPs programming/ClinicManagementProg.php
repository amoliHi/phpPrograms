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
function detailentry($file)
{
    echo "Enter D to enter details of Doctor.\nEnter P to enter details of Patient.\n";
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
 * Function to search doctors from the list
 *
 * @param  mixed $arr
 * @return 
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
 * Undocumented function
 *
 * @param [mixed] $arr
 * @return mixed 
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
    //adding Doctor information to the array $doctor_arr
    $patient_arr[] = $patient;
    Utility::putJsonin($patient_arr, $file);
}

function edit($person)
{
    echo "Enter 1 to change Address.\nEnter 2 change Mobile Number.\n";
    //taking user input and accordingly control will work
    $choice = Utility::getInt();
    switch ($choice) {
        case '1':
            echo "Enter State : \n";
            $person->state = Utility::getString();
            echo "Enter City : \n";
            $person->city = Utility::getString();
            echo "Enter Zip of $person->city : \n";
            $person->zip = Utility::getInt();
            echo "Enter Address : \n";
            $person->address = Utility::getString();
            echo "Address changes succesfully. \n";
            break;
        case '2':
            echo "Enter Mobile Number : \n";
            $person->phone = Utility::getInt();
            echo "Mobile no changed succesfully.\n";
            break;
        default:
            break;
    }
}

function clinicMgmt($file)
{
    echo "\n ....Clinique Management Book....\n\nEnter 1 to add Person Data.\nEnter 2 to Edit a person.",
        "\nEnter 3 to Delete a person.\nEnter 4 to Sort and Display.\nEnter 5 to search.",
        "\nEnter any other number to save and exit.\n";
    $ch = Utility::getInt();
    switch ($ch) {
        case '1':
            detailentry($file);
            clinicMgmt($file);
            break;
        case '2':
            $k = 2;
            while (($i = search($file)) === -1) {
                var_dump($i);
                echo "No enteries Found\nEnter 1 to exit to Menu or Else to search again\n";
                fscanf(STDIN, "%s\n", $k);
                if ($k == 1)
                    break;
            }
            if ($k == 1)
                clinicMgmt($file);
            else
                $file[$i] = edit($file[$i]);
            addressbkmenu($file);
            break;
        case '3':
            OPPsProgramLogic::delete($addressBook);
            OPPsProgramLogic::addressbkmenu($addressBook);
            break;
        case '4':
            echo "Enter 1 to sort by Name\nEnter 2 to sort by Zip\nElse to Menu";
            $c = Utility::getInt();
            if ($c == 1) {
                OPPsProgramLogic::sortBook($addressBook, "fname");
                OPPsProgramLogic::printBook($addressBook);
            } else if ($c == 2) {
                OPPsProgramLogic::sortBook($addressBook, "zip");
                OPPsProgramLogic::printBook($addressBook);
            } else
                OPPsProgramLogic::addressbkmenu($addressBook);
            fscanf(STDIN, "%s\n");
            OPPsProgramLogic::addressbkmenu($addressBook);
            break;
        case '5':
            $i = OPPsProgramLogic::search($addressBook);
            if ($i > -1) {
                $arr = [];
                $arr[] = $addressBook[$i];
                OPPsProgramLogic::printBook($arr);
            }
            echo "\n";
            fscanf(STDIN, "%s\n");
            OPPsProgramLogic::addressbkmenu($addressBook);
            break;
        default:
            echo "Enter 1 to save ";
            if (Utility::getInt() == 1)
                OPPsProgramLogic::save($addressBook);
            break;
    }
}

$file = json_decode(file_get_contents("CliniqueMgmt.txt"));
clinicMgmt($file);
## Specimen 
/**
 * @var integer
 */
