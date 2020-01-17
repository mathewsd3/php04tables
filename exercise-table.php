<?php

const USERS = array(
array('Pierre', 22, '123 rue A', 'aa@ser.com', array('programming' => 5, 'teaching' => 2)),
array('Julie', 65, '123 rue B', 'bb@ser.com', array('electronics' => 46)),
array('Martin', 45, '123 rue C', 'cc@ser.com', array('programming' => 21, 'teaching' => 1)),
array('Melanie', 41, '123 rue D', 'dd@ser.com', array('welding' => 12, 'nutrition' => 6, 'restoration' => 1)),
);

// Black color when age is exactly equal to reference age, green when upper and blue when lower
const AGE_REFERENCE = 45;

// Yellow color when the years of experience is equal to or greater than MINIMUM_EXPERIENCE
const MINIMUM_EXPERIENCE = 5;

$string='';
$sumOfAge=0;


//1st loop on the main array
foreach(USERS as $user)
{
	$cssclass='';
	$numOfUsers=count($user);
	$spancssclass='';
	
	//if($user[1]==AGE_REFERENCE)
	//2nd for loop to set the classname
	for($i=0;$i<$numOfUsers;$i++)
	{
		if($i==1)
		{
			$sumOfAge+=$user[$i];
			
			if($user[$i]==AGE_REFERENCE)
			{
				$cssclass='age-reference';
			}
			else if($user[$i]>AGE_REFERENCE)
			{
				$cssclass='age-over';
			}
			else
			{
				$cssclass='age-under';
			}
		}
	}
	$string.='<tr class='.$cssclass.'>';
	
	
	//2nd loop to build the td tags for html table
	foreach($user as $item)
	{
		$string.='<td>';
		if(is_array($item))
		{
			foreach($item as $exp=>$numOfyears)
			{
				if($numOfyears== 5 || $numOfyears>5){
					//echo 'in';
					$spancssclass='experience-valid';
					$string.='<span class='.$spancssclass.'>'.$exp.' : '.$numOfyears.'</span></br>';

				}
				else
				{
					$spancssclass='experience-invalid';
					$string.='<span class='.$spancssclass.'>'.$exp.' : '.$numOfyears.'</span></br>';
				}
				
			}
		}
		else
		{
			$string.=$item;
		}
		$string.='</td>';
	}
	$string.='</tr>';

}

//echo $sumOfAge.' - '.count(USERS);
$string.='<tr><td>Moyenner</td><td>'.$sumOfAge/count(USERS).'</td></tr>';	

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Exercise - Table</title>

<style>
table,
td,
th {
border: 1px solid black;
margin: auto;
}

ul {
list-style-type: none;
padding: 5px;
}

.age-reference {
background-color: black;
color: white;
}

.age-over {
background-color: green;
color: white;
}

.age-under {
background-color: blue;
color: white;
}

.experience-invalid {
background-color: white;
color: black;
}

.experience-valid {
background-color: yellow;
color: black;
font-weight: bold;
}
</style>
</head>

<body>

<table>
<thead>
<tr>
<th>Nom</th>
<th>Age</th>
<th>Adresse</th>
<th>Courriel</th>
<th>Emplois</th>
</tr>
</thead>

<tbody>
<?php

echo $string;

?>

</tbody>

<tfoot>

</tfoot>
</table>

</body>

</html>