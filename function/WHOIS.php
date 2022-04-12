<?php
require __DIR__ . '/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
include __DIR__.'/../vendor/autoload.php';
use Iodev\Whois\Factory;
use Iodev\Whois\Exceptions\ConnectionException;
use Iodev\Whois\Exceptions\ServerMismatchException;
use Iodev\Whois\Exceptions\WhoisException;
$whois = Factory::get()->createWhois();
$info = $whois->loadDomainInfo(strtolower($_POST['domain']));
    if ($info !== false) {
        $creationdate = date("Y-m-d", $info->creationDate);
        $expirydate   = date("Y-m-d", $info->expirationDate);
        $renewaldate  = date("Y-m-d", $info->updatedDate);
        $_SESSION['return'] = '<div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title" id="out">WHOIS Results</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="page-body">
                            <div class="container-xl">
                                <div class="row row-cards">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Domain Name</strong><br>'.$info->domainName.'</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>WHOIS Server</strong><br>'.$info->whoisServer.'</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Creation Date</strong><br><code>'.$creationdate.'</code></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Expiry Date</strong><br><code>'.$expirydate.'</code>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Last Updated</strong><br><code>'.$renewaldate.'</code>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Owner</strong><br>'.$info->owner.'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <div class="font-weight-medium">
                                                    <strong>Registrar</strong><br>'.$info->registrar.'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            $_SESSION['message'] = '<div class="alert alert-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;<span class="alert-title">Success!</span>&nbsp;<span class="text-muted">We were able to fetch the latest WHOIS records from the respective registrar servers.</span></div>';
            header('location: ../whois');
    } else{
        $_SESSION['message'] = '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;<span class="alert-title">Error!</span>&nbsp;<span class="text-muted">We could not find any information for the domain. Are you sure this domain is registered? You can buy it for cheap rates at <a href="https://www.namesilo.com/register.php?rid=06f3020up" class="alert-link">NameSilo</a>!</span></div>';
        header('location: ../whois');
    }
?>