<?php

use Calcinai\OAuth2\Client\Provider\Xero;

include __DIR__ . '/../vendor/autoload.php';

session_start();

$provider = new Xero([
    'clientId' => '',
    'clientSecret' => '',
    'redirectUri' => 'http://localhost:1234/demo.php',
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => 'openid email profile accounting.settings accounting.transactions'
    ]);

    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);


    //If you added the openid/profile scopes you can access the authorizing user's identity.
    $identity = $provider->getResourceOwner($token);
    print_r($identity);

    //Get the tenants that this user is authorized to access
    $tenants = $provider->getTenants($token);
    print_r($tenants);
}

//The above is only required for the authorization process
//At this  point, you can be using your stored token and desired tenant-id to
//construct the XeroPHP application and make authenticated requests

//For the purposes of the demo, both of these parameters are used from above, but they should be stored.
$application = new \XeroPHP\Application(
    $token->getToken(),
    $tenants[0]->tenantId
);

$org = $application->load(\XeroPHP\Models\Accounting\Organisation::class)->execute();
print_r($org);


//$provider->disconnect($token, $tenants[0]->id);
