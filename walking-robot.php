<?php

/* Direction variables declaration*/
const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;

/* Array declaration for direction of the robot*/
$direction = [ 1 => "NORTH", 2 => "EAST", 3 => "SOUTH", 4 => "WEST"];

const MULTIPLYBY_1 = 1;
const MULTIPLYBY_2 = 1;
const MULTIPLYBY_3 = -1;
const MULTIPLYBY_4 = -1;

//Co-ordinat declaration
$x = $argv[1];
$y = $argv[2];

//Check if entered co-ordinates are numeric or not
if(!is_numeric($x) || !is_numeric($y))
	die("\nThe Co-ordinates must be Integer value\n");


$currentDirection = $argv[3];

if($currentDirection != 'NORTH' && $currentDirection != 'EAST' && $currentDirection != 'SOUTH' && $currentDirection != 'WEST')
	die("\nYou have entered the wrong direction\n");

$presentDirectionNumber = constant($currentDirection);
$path = $argv[4];

for($i = 0; $i < strlen($path); $i++)
{
	switch($path{$i})
	{
		case 'R':
			if($presentDirectionNumber == 4)
				$presentDirectionNumber = 1;
			else
				$presentDirectionNumber++;
			break;
        case 'L':
            if($presentDirectionNumber == 1)
            	$presentDirectionNumber = 4;
            else
            	$presentDirectionNumber--;
            break;

        case 'W':
			if( !($presentDirectionNumber % 2) )
				$x += ($path{$i+1} * constant("MULTIPLYBY_".$presentDirectionNumber) );
			else
				$y += ($path{$i+1} * constant("MULTIPLYBY_".$presentDirectionNumber) );
			
			$i++;
            break;

		default:
			if(is_numeric($path{$i}))
				echo "\nNumber should be associated with 'W' walk ranging from 0 - 9\n";
			else
				echo "\nProvided char '".$path{$i}."' is not valid\n";
			break;
	}
}
echo $x." ".$y." ".$direction[$presentDirectionNumber]."\n";




?>