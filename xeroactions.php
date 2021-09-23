<div id="actionresults">
<?PHP
use XeroPHP\Application\PrivateApplication;
use XeroPHP\Models\Accounting\Contact;


switch ($_REQUEST['action'])
{	case 'archive':
		//print "<p>Archiving Account ".$_REQUEST['id'] . "</p>";
		try {
			$contact = new CIBillingAccount($_REQUEST['id']);
			$contact->archived = true;
			$contact->SaveDetails();	
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		break;

	case 'unarchive':
                //print "<p>Unrchiving Account ".$_REQUEST['id'] . "</p>";
                try {
                        $contact = new CIBillingAccount($_REQUEST['id']);
                        $contact->archived = false;
                        $contact->SaveDetails();
                } catch (Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                break;

	case 'update':
	case 'updateobg': 
	case 'updateobm': 
		try {
                        $contact = new CIBillingAccount($_REQUEST['id']);
			$allemail = explode(",",$contact->emailto,2);
			$primaryemail = $allemail[0];
			$name = explode(" ",$contact->contact,2);
			$first = $name[0];
			$last = $name[1];
			
			$contacts = array();
			if (($_REQUEST['action'] == 'updateobg') || ($_REQUEST['action'] == 'update'))
			{	$xerocontacts = $obg_xero->load(Contact::class)
       	                         ->where('AccountNumber',$_REQUEST['id'])
       	                         ->execute();
				$contacts[] = $xerocontacts[0];
			}
                        if (($_REQUEST['action'] == 'updateobm') || ($_REQUEST['action'] == 'update'))
                        {       $xerocontacts = $obm_xero->load(Contact::class)
                                 ->where('AccountNumber',$_REQUEST['id'])
                                 ->execute();
                                $contacts[] = $xerocontacts[0];
                        }



			foreach ($contacts as $xero)	
			{	$xero->setName($contact->billto)
					->setEmailAddress($primaryemail)
					->setFirstName($first)
					->setLastName($last);
				$xero->save();
			
				$postal = $xero->addresses[1];
				$postal->setAddressLine1($contact->address['address1'])
					->setAddressLine2($contact->address['address2'])
					->setCity($contact->address['town'])
					->setRegion($contact->address['county'])
					->setPostalCode($contact->address['postcode'])
					->setCountry($contact->address['country']);
				$xero->save();
			}
			
                } catch (Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                }


		break;

	case 'create':
        case 'createobg':
        case 'createobm':
                print "<p>Creating Account ".$_REQUEST['id'] . " in Xero</p>";


	try {
		$contact = new CIBillingAccount($_REQUEST['id']);
                $allemail = explode(",",$contact->emailto,2);
                $primaryemail = $allemail[0];
                $name = explode(" ",$contact->contact,2);
                $first = $name[0];
                $last = $name[1];

		$contacts = array();
		
		if (($_REQUEST['action'] == 'createobg') || ($_REQUEST['action'] == 'create'))
                {       $xerocontact = new Contact($obg_xero);
                        $contacts[] = $xerocontact;
                }
                if (($_REQUEST['action'] == 'createobm') || ($_REQUEST['action'] == 'create'))
                {       $xerocontact = new Contact($obm_xero);
                        $contacts[] = $xerocontact;
                }

                foreach ($contacts as $xero)
                {       $xero->setName($contact->billto)
				->setAccountNumber($_REQUEST['id'])
                                ->setEmailAddress($primaryemail)
                                ->setFirstName($first)
                                ->setLastName($last);
                        $xero->save();

                        $postal = $xero->addresses[1];
                        $postal->setAddressLine1($contact->address['address1'])
                                ->setAddressLine2($contact->address['address2'])
                                ->setCity($contact->address['town'])
                                ->setRegion($contact->address['county'])
                                ->setPostalCode($contact->address['postcode'])
                                ->setCountry($contact->address['country']);
                         $xero->save();
                }



	} catch (Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

                break;


	default:
		print "<p>Invalid action: ".$_REQUEST['action']."</p>";
}
?>
</div>
