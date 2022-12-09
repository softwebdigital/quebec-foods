<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use App\Repositories\PackageRepository;
use Illuminate\Http\JsonResponse;

class PackageController extends Controller
{
    public function __construct(protected PackageRepository $packageRepository)
    {
    }

    public function index(): JsonResponse
    {
        return $this->success(data: PackageResource::collection($this->packageRepository->getAll()));
    }

    public function show(Package $package): JsonResponse
    {
        return $this->success(data: new PackageResource($package));
    }
}
