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
