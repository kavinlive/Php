Try Catch Finally

<?php

	// Example 01

	/*function checkNumber($number)
	{
		if($number>=1)
		{
			throw new Exception("The number should be less than One");
		}
		return true;
	}

	try
	{
		checkNumber(2);
		echo 'If you see this text, the passed value is less than 1';
	}
	catch(Exception $e)
	{
		echo "Exception Message : ".$e->getMessage();
	}
	finally
	{
		echo "</br> It is finally block, which always executes";
	}*/


	//Example 02
/*
	function testEven($Num)
	{
		try{

			if($Num%2==1)
			{
				throw new Exception("Passed number is an ODD number+");
				echo "After throw this statement will not execute";
			}
			echo "<br><b>If you see this text, the Passed value is Even Number</b>";
		}
		catch(Exception $e)
		{
			echo "</br><b>Exception Message :".$e->getMessage().'</b>';
		}
		finally
		{
			echo "</br>It is finally block, which always execute.";
		}
	}

		testEven(19);
		echo "<br><br>";

		testEven(18);

 */

 	// Example 03

/*	class OddNumberException extends Exception{ }

	function testEven($num){

		try
		{
			if($num%2==1)
			{
				throw new OddNumberException;
				echo "After throw this statement will not execute";
			}
			echo "</br><b>If you see this text, The Passed value is an Even Number </b>";
		}
		catch(OddNumberException $ex){
			echo "</br><b>Exception Message : ODD Number.";
		}
		catch(Exception $e)
		{
			echo "</br><b>Exception Message : ".$e->getMessage().'<b>';
		}
	}

	echo "Even Number Output";
	testEven(28);
	echo "</br></br>";
	echo "Odd Number Output";
	testEven(17);


	class MyException extends Exception{

		function errorMessage()
		{
			$Error = "My Exception Message : ".$this->getMessage()."<br> Error on line no. : ".$this->getLine();
			return $Error;
		}
	}

	function division($n){

		try{

			if($n<=0)
			{
				throw new Exception("<br>Enter the valid number.");
			}
			if($n==3)
			{
				throw new MyException("<br>number is 3.");
			}
			$div = 2/$n;
			echo "<br>".$div;
		}
		catch(MyException $e)
		{
			echo $e->errorMessage();
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage();
		}
		finally
		{
			echo "</br>finally is always executes.";
		}
	}

	division(0);echo "<br>";
	division(1);echo "<br><br>";
	division(3);

	*/

?>



// MYSQLI Connection OOPS CRUD

<?php

        class DatabaseHelper {

            private $db_host = "localhost";
            private $db_user = "root";
            private $db_pass = "";
            private $db_database = "student";

            private $conn = false;
            private $result = array();

            public function __construct()
            {
                if(!$this->conn)
                {
                  $this->conn = new  mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_database);
                  if($this->conn)
                  {
                      echo "Connected";
                  }
                  if($this->conn->connect_error)
                  {
                      array_push($this->result,$this->conn->connect_error);
                      return false;
                  }
                }
                else {
                    return true;
                }
            }

            public function select($table, $id= array())
            {
                $Results = array();
                if(empty($id))
                {
                    $sql = "SELECT * FROM ".$table;
                    $rs = mysqli_query($this->conn, $sql);
                    while($row = mysqli_fetch_assoc($rs))
                    {
                        $Results[] = $row;
                    }
                }
                else {
                    $id_key = implode(',',array_keys($id));
                    $id_value = implode(',',$id);
                    $sql = "SELECT * FROM ".$table." WHERE ".$id_key." = ".$id_value;
                    $rs = mysqli_query($this->conn, $sql);
                    while($row = mysqli_fetch_assoc($rs))
                    {
                        $Results[] = $row;
                    }
              }
                return $Results;
            }
            public function Insert($table,$params = array())
            {
                $table_coloums = implode(', ', array_keys($params));
            		$table_value = implode("', '", $params);
            		$sql = "INSERT INTO $table ($table_coloums) VALUES ('$table_value')";
            		if($this->conn->query($sql))
            		{
            			return true;
            		}
            		else
            		{
            			return false;
            		}
            }
            public function Update($table,$params = array(),$id = array())
            {
                $table_coloum1 = implode(',',array_keys($params));
                $table_value1 = implode(', ',$params);
                $table_coloums = explode(',',$table_coloum1);
                $table_value = explode(', ',$table_value1);
                $id_coloums = implode(', ', array_keys($id));
    		        $id_value = implode(', ', $id);

                $SqlStr = "";
                for($i =0; $i<count($table_coloums); $i++)
                {
                    $SqlStr.= $table_coloums[$i]." = '$table_value[$i]'";
                    if($i!=(count($table_coloums)-1))
                    {
                        $SqlStr.=" ,";
                    }
                }
                $sql = "Update $table set $SqlStr Where $id_coloums = $id_value";
            		if($this->conn->query($sql))
            		{
            			return true;
            		}
            		else
            		{
            			return false;
            		}
            }
            public function delete($table, $id = array())
            {
              $id_key = implode(',',array_keys($id));
              $id_value = implode("','",$id);
              $Sql = "DELETE FROM $table WHERE $id_key = $id_value";
              return $this->conn->query($Sql);
            }
      }
 ?>
   
   
// Inheritance

<?php

class BankAccount
{
    private $balance;

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }

        return $this;
    }
}

class SavingAccount extends BankAccount
{
    private $interestRate;

    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }

    public function addInterest()
    {
        // calculate interest
        $interest = $this->interestRate * $this->getBalance();
        // deposit interest to the balance
        $this->deposit($interest);
    }
}

$account = new SavingAccount();
$account->deposit(100);
// set interest rate
$account->setInterestRate(0.05);
$account->addInterest();
echo $account->getBalance();

?>

<?php


class SavingAccount extends BankAccount
{
	private $interestRate;

	public function __construct($balance, $interestRate)
	{
		parent::__construct($balance);

		$this->interestRate = $interestRate;
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	public function addInterest()
	{
		// calculate interest
		$interest = $this->interestRate * $this->getBalance();
		// deposit interest to the balance
		$this->deposit($interest);
	}
}


?>

<?php

class Robot
{
	public function greet()
	{
		return 'Hello!';
	}
}

class Android extends Robot
{
	public function greet()
	{
		return 'Hi';
	}
}

$robot = new Robot();

echo $robot->greet(); // Hello

$android = new Android();
echo $android->greet(); // Hi!
?>



<?php

class CheckingAccount extends BankAccount
{
	private $minBalance;

	public function __construct($amount, $minBalance)
	{
		if ($amount > 0 && $amount >= $minBalance) {
			parent::__construct($amount);
			$this->minBalance = $minBalance;
		} else {
			throw new InvalidArgumentException('amount must be more than zero and higher than the minimum balance');
		}
	}

	public function withdraw($amount)
	{
		$canWithdraw = $amount > 0 &&
					   $this->getBalance() - $amount > $this->minBalance;

		if ($canWithdraw) {
			parent::withdraw($amount);

			return true;
		}

		return false;
	}
}
?>

//Final

class Robot
{
	public function greet()
	{
		return 'Hello!';
	}

	final public function id()
	{
		return uniqid();
	}
}

class Android extends Robot
{
	public function greet()
	{
		$greeting = parent::greet();

		return $greeting . ' from Andoid.';
	}

	public function id()
	{
		return uniqid('Android-');
	}
}


// WORD PRESS CHILD THEME

style.css
@import url("../twentytwenty/style.css");
/*
 Theme Name:   Twenty Twenty Child
 Theme URI:    http://example.com/twentytwenty/
 Description:  Twenty Twenty Child Theme
 Author:       John Doe
 Author URI:   http://example.com
 Template:     twentytwenty
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
 Text Domain:  twentyfifteenchild
*/

<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

?>

/**
Theme Name: Astra Child
Author: Brainstorm Force
Author URI: http://wpastra.com/about/
Description: Astra is the fastest, fully customizable & beautiful theme suitable for blogs, personal portfolios and business websites. It is very lightweight (less than 50KB on frontend) and offers unparalleled speed. Built with SEO in mind, Astra comes with schema.org code integrated so search engines will love your site. Astra offers plenty of sidebar options and widget areas giving you a full control for customizations. Furthermore, we have included special features and templates so feel free to choose any of your favorite page builder plugin to create pages flexibly. Some of the other features: # WooCommerce Ready # Responsive # Compatible with major plugins # Translation Ready # Extendible with premium addons # Regularly updated # Designed, Developed, Maintained & Supported by Brainstorm Force. Looking for a perfect base theme? Look no further. Astra is fast, fully customizable and beautiful theme!
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: astra-child
Template: astra
*/



