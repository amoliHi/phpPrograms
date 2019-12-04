 <?php 
/**
 * Program is the demonstration for proxy desingn pattern in php 
 * it shows a command line executioner which gives acces based upon login details
 */
 /**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});
 
//require function from utility class for input
require("/home/bridgelabz/Chirag/BridgeLabzPHP/Functional/Utility.php");
class CommandExecutioner
{
    /**
     * Function Simulates Delete function
     */
    function Delete(string $file)
    {
        echo "deleted " . $file;
    }
    /**
     * Function simulates the open file function
     */
    function openFile()
    {
        echo "File Opened";
    }
    /**
     * function to display the stats of system
     */
    function displayStats()
    {
        echo "Stats Displayed \n";
    }
}
/**
 * proxy class for the class comman executioner
 */
class Proxy extends CommandExecutioner
{
    //var Users to store the details of login and user name 
    protected $users = ["admin" => ["pass" => "1234"], "user" => ["pass" => "12345"]];
    //var isAdmin to check if user is admin or not
    protected $isAdmin = false;
    //execute to have the object of the Executioner Class
    private $execute;
    /**
     * Login Function to get Username And pass and login the user
     */
    function login(string $userName, string $pass)
    {
        $this->execute = new CommandExecutioner;
        if (array_key_exists($userName, $this->users)) {
            if ($this->users[$userName]["pass"] == $pass) {
                echo "Logged in as $userName";
                if ($userName == "admin") {
                    $this->isAdmin = true;
                }
            } else {
                //echo "UserName PassWord Invalid\n";
                throw new Exception("UserName PassWord Invalid\n");
            }
        } else {
            //echo "UserName PassWord Invalid\n";
            throw new Exception("UserName PassWord Invalid\n");
        }
    }
    /**
     * Function to delete the file 
     */
    function Delete(string $file)
    {
        if ($this->isAdmin === true) {
            $this->execute->Delete($file);
        } else {
            echo "\nUser Account Is Not AlLowed To delete function\n";
        }
    }
    /**
     * function to open the file from file system
     */
    function openFile()
    {
        $this->execute->openFile();
    }
    /**
     * Functio to display stats of the system
     */
    function displayStats()
    {
        if ($this->isAdmin === true) {
            $this->execute->displauStats();
        } else {
            echo "\nUser Account Is Not AlLowed To displayStats\n";
        }
    }
}
/**
 * Funtion display menu to the user and run the function of the proxy class
 */
function menu()
{
    echo "Enter UserName\n";
    $userName = Utility::getString();
    echo "Enter PassWord\n";
    $pass = Utility::getString();
    $proxy = new Proxy;
    $proxy->login($userName, $pass);
    echo "\nEnter 1 to delete\nEnter 2 to open \nEnter 3 to Show Stats";
    $i = Utility::getInt();
    switch ($i) {
        case '1':
            echo "Enter file nameto delete\n";
           $proxy->delete(Utility::getString());
            break;
        case '2':
            $proxy->openFile();
            break ;
        case '3':
            $proxy->displayStats();
        default:
            echo "Invalid Selection Exit";
            break;
    }
}
menu();
?>