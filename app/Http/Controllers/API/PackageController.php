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
        $status = request()->input('status');
        $type = request()->input('type');
        return $this->success(
            data: PackageResource::collection($this->packageRepository->getAll(type: $type, status: $status)),
            meta: $this->packageRepository->getMeta()
        );
    }

    public function show(Package $package): JsonResponse
    {
        return $this->success(data: new PackageResource($package));
    }
}
