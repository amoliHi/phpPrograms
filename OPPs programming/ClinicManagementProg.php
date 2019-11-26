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
        createDoctor();
    elseif ($input == "P")
        createPatient();
    else {
        echo "WRONG ENTRY !!!!\n";
        echo "Please provide input from the given options.\n";
        detailentry($file);
    }
}

function search($arr)
	{
		echo "Enter firstaname : \n";
		$fname = Utility::getString();
		echo "Enter last name : \n";
		$lname = Utility::getString();
		//loop for traversing and searching person details in array as per user input
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i]->fname == $fname) {
				if ($arr[$i]->lname == $lname) {
					return $i;
				}
			}
		}
		return -1;
	}

function createDoctor()
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

function createPatient()
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
                echo "No enteries Found\nenter 1 to exit to Menu or Else to search again\n";
                fscanf(STDIN, "%s\n", $k);
                if ($k == 1)
                    break;
            }
            if ($k == 1)
                OPPsProgramLogic::addressbkmenu($addressBook);
            else
                $addressbook[$i] = OPPsProgramLogic::edit($addressBook[$i]);
            OPPsProgramLogic::addressbkmenu($addressBook);
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
