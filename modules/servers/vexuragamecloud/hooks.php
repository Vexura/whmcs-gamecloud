<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Gamecloud\Module;
use Vexura\Whmcs\Gamecloud\Registrar;
use Vexura\Whmcs\Gamecloud\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('gamecloud', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('gamecloud', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('gamecloud'); });
