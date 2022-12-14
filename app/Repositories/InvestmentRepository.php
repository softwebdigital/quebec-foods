<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository extends AbstractRepository
{
    public function __construct(Package $package)
    {
        parent::__construct($package);
    }

    public function model()
    {
        return app(Package::class);
    }
}
