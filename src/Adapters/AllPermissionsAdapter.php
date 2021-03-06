<?php


namespace Sourcefli\PermissionName\Adapters;

use Illuminate\Support\Str;
use Sourcefli\PermissionName\Factories\AllPermissions as AllPermissionsFactory;
use Sourcefli\PermissionName\PermissionManager;
use Sourcefli\PermissionName\PermissionGenerator;
use Sourcefli\PermissionName\Contracts\RetrievesPermissions;

class AllPermissionsAdapter extends PermissionManager implements RetrievesPermissions
{
    public function setScope(string $scopeType): PermissionManager
    {
        $scope = Str::of($scopeType);

        if (!$scope->startsWith('[')) {
            $scope = $scope->prepend('[');
        }

        if (!$scope->endsWith(']')) {
            $scope = $scope->append(']');
        }

        $this->validateScope((string) $scope);

        return AllPermissionsFactory::makeAdapter($scope);
    }

    public function forOwned()
    {
        return $this->setScope(PermissionGenerator::SCOPE_OWNED);
    }

    public function forOwnedSetting()
    {
        return $this->setScope(PermissionGenerator::SCOPE_OWNED_SETTING);
    }

    public function forTeam()
    {
        return $this->setScope(PermissionGenerator::SCOPE_TEAM);
    }

    public function forTeamSetting()
    {
        return $this->setScope(PermissionGenerator::SCOPE_TEAM_SETTING);
    }
}
