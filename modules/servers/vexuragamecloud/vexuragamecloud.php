<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Gamecloud\Module;
use Vexura\Whmcs\Gamecloud\Registrar;
use Vexura\Whmcs\Gamecloud\Automation;

/** Gamecloud: WHMCS MetaData callback. */
function vexuragamecloud_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Gamecloud', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Gamecloud: WHMCS ConfigOptions callback. */
function vexuragamecloud_ConfigOptions(): array
{
    return Module::config('gamecloud');
}

/** Gamecloud: WHMCS TestConnection callback. */
function vexuragamecloud_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Gamecloud: WHMCS ClientArea callback. */
function vexuragamecloud_ClientArea(array $params): array
{
    return Module::clientArea('gamecloud', $params);
}

/** Gamecloud: WHMCS AdminCustomButtonArray callback. */
function vexuragamecloud_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Gamecloud: WHMCS CreateAccount callback. */
function vexuragamecloud_CreateAccount(array $params): string
{
    return Module::run('gamecloud', 'create', $params);
}

/** Gamecloud: WHMCS RefreshStatus callback. */
function vexuragamecloud_RefreshStatus(array $params): string
{
    return Module::run('gamecloud', 'create', $params);
}

/** Gamecloud: WHMCS SyncPaidInvoices callback. */
function vexuragamecloud_SyncPaidInvoices(array $params): string
{
    return Module::run('gamecloud', 'sync', $params);
}

/** Gamecloud: WHMCS TerminateAccount callback. */
function vexuragamecloud_TerminateAccount(array $params): string
{
    return Module::run('gamecloud', 'terminate', $params);
}

/** Gamecloud: WHMCS SuspendAccount callback. */
function vexuragamecloud_SuspendAccount(array $params): string
{
    return Module::run('gamecloud', 'suspend', $params);
}

/** Gamecloud: WHMCS UnsuspendAccount callback. */
function vexuragamecloud_UnsuspendAccount(array $params): string
{
    return Module::run('gamecloud', 'unsuspend', $params);
}
