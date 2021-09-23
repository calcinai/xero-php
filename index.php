<?PHP
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
require('config.php');
require('../includes.php');

use XeroPHP\Application\PrivateApplication;
use XeroPHP\Models\Accounting\Contact;

$obg_xero = new \XeroPHP\Application\PrivateApplication($obg_config);
$obm_xero = new \XeroPHP\Application\PrivateApplication($obm_config);


?>


<html>
<head><title>CI Admin to XERO</title>
<style>
table, th, td {
  border: 1px solid #ccc; text-align: left; font-size: 10px;
}
tr:hover { background-color: #ffff99; }
table {
  border-collapse: collapse;
}

.accnum {font-weight: bold; }

.none { background-color: Pink; }
.both { background-color: PaleGreen; }
.nogroup { background-color: PowderBlue; }
.nomusic { background-color: Moccasin; }
.archived { color: gray; }

.good {color: forestgreen; }
</style>
</head>
<body>


<?PHP


if(isset($_REQUEST['action']))
{	require("xeroactions.php");
}


// FIRST WE NEED TO LOAD THE CIADMIN ACCOUNTS INTO OUR ARRAY

$ciaccounts = CIBillingAccount::getAll();
$allaccounts = array(); $archived = array();
foreach ($ciaccounts as $contact) {
	if (! $contact->archived) 
	{	$id = $contact->sageacct;
		$allaccounts[$id]['cianame'] = $contact->billto;
		$allaccounts[$id]['accnum'] = $id;
	} else
	{	$id = $contact->sageacct;
		$archived[$id]['cianame'] = $contact->billto;
                $archived[$id]['accnum'] = $id;		
	}
}


// THEN WE ADD IN XERO FROM OGB


$xerocontacts = $obg_xero->load(Contact::class)
//	->where('IsCustomer',true)
	->execute();


foreach ($xerocontacts as $contact) {
	$id = $contact->getAccountNumber(); 
	$allaccounts[$id]['obgxeroid']  = $contact->getContactID();
	$allaccounts[$id]['obgname'] = $contact->getName();
	$allaccounts[$id]['accnum'] = $id;
}


// THEN WE ADD IN XERO FROM OBM


$xerocontacts = $obm_xero->load(Contact::class)
 //       ->where('IsCustomer',true)
        ->execute();

foreach ($xerocontacts as $contact) {
        $id = $contact->getAccountNumber();
        $allaccounts[$id]['obmxeroid']  = $contact->getContactID();
        $allaccounts[$id]['obmname'] = $contact->getName();
        $allaccounts[$id]['accnum'] = $id;
}



// DELETE ACCOUNTS THAT ARE NOT IN CIADMIN ADD CLASSES FOR OTHERS

$temp = $allaccounts;
$allaccounts = array();
foreach ($temp as $id=>$contact)
{	if ($contact['cianame']) {
		$allaccounts[$id] = $contact;
		if (($contact['obgxeroid'] == "") && ($contact['obmxeroid'] == ""))
		{	$allaccounts[$id]['class'] = "none";
		} elseif ($contact['obmxeroid'] == "")
		{	$allaccounts[$id]['class'] = "nomusic";
			if ($contact['cianame'] == $contact['obgname']) { $allaccounts[$id]['class'] .= " good"; }
		} elseif ($contact['obgxeroid'] == "")
		{	$allaccounts[$id]['class'] = "nogroup";
			if ($contact['cianame'] == $contact['obmname']) { $allaccounts[$id]['class'] .= " good"; }
		} else {
			$allaccounts[$id]['class'] = "both";
			if (($contact['cianame'] == $contact['obgname']) && ($contact['cianame']  == $contact['obmname'])) { $allaccounts[$id]['class'] .= " good"; }
		}
	}
}

// SORT ARRAY BY CLASS

$class = array_column($allaccounts, 'class');
array_multisort($class, SORT_ASC, $allaccounts);


// NOW OUTPUT

$cols = array('accnum','obgxeroid','obmxeroid','cianame','obgname','obmname');

print "<table>";
print "<tr><th>" . implode("</th><th>", $cols ) . "</th><th>Actions</th></tr>";
foreach ($allaccounts as $key=>$row) {
print "<tr class='". $row['class'] ."'>";
	foreach ($cols as $col) { print "<td class='".$col."'>".$row[$col]."</td>"; }
	print "<td>";
	switch(explode(" ",$row['class'])[0] ) {
		case 'both':
			print "<a href='?action=update&id=$key'>Update Xero</a> | <a href='?action=archive&id=$key'>Archive</a>";
			break;
		case 'none':
			print "<a href='?action=create&id=$key'>Create in Xero</a> | <a href='?action=archive&id=$key'>Archive</a>";
			break;
		case 'nogroup':
			print "<a href='?action=createobg&id=$key'>Create in OBG</a> | <a href='?action=updateobm&id=$key'>Update OBM</a> | <a href='?action=archive&id=$key'>Archive</a>";
			break;
		case 'nomusic':
                        print "<a href='?action=updateobg&id=$key'>CI &rarr; OBG</a> | <a href='?action=createobm&id=$key'>Create in OBM</a> | <a href='?action=archive&id=$key'>Archive</a>";
                        break;
	

	}
	print "</td>";
print "</tr>";
}
print "</table>";


// ALSO SHOW ARCHIVED

print "<h2>Archived Accounts</h2><table><tr><th>accnum</th><th>cianame</th><th>Actions</th></tr>";
foreach ($archived as $key=>$row)
{	print "<tr class='archived'><td class='accnum'>".$row['accnum']."</td><td class='cianame'>".$row['cianame']."</td>";
	print "<td><a href='?action=unarchive&id=$key'>Unarchive</a></td></tr>";
}
print "</table>";

exit();



