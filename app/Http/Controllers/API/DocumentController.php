<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return $this->success(data: DocumentResource::collection(request()->user()->documents()->latest()->get()));
    }

    public function store(DocumentRequest $request): JsonResponse
    {
        $data = self::getDocumentData($request);
        $document = $request->user()->documents()->create($data);
        return $this->success('ID submitted successfully!', new DocumentResource($document));
    }

    public function show(Document $document): JsonResponse
    {
        Gate::authorize('view', $document);
        return $this->success(data: new DocumentResource($document));
    }

    public function update(DocumentRequest $request, Document $document): JsonResponse
    {
        Gate::authorize('update', $document);
        $data = self::getDocumentData($request);
        $old = null;
        if ($request->file('file')) $old = $document['photo'];
        $document->update($data);
        if ($old) {
            try { unlink($old); } catch (Exception $e) {}
        }
        return $this->success('ID updated successfully!', new DocumentResource($document));
    }

    public function delete(Document $document): JsonResponse
    {
        Gate::authorize('delete', $document);
        $old = $document['photo'];
        if ($document->delete()) {
            try { unlink($old); } catch (Exception $e) {}
        }
        return $this->success('Document deleted successfully!');
    }

    private static function getDocumentData($request)
    {
        $data = $request->only(['method', 'number']);
        $destinationPath = 'assets/documents'; // upload path
        HomeController::createDirectoryIfNotExists($destinationPath);
        $transferImage = $request->user()['id'].'-id-'. time() . '.' . $request->file('file')->getClientOriginalExtension();
        $image = Image::make($request->file('file'));
        $image->save($destinationPath . '/' . $transferImage, 40);
        $data['photo'] = $destinationPath ."/".$transferImage;
        return $data;
    }
}
