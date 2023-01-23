<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use function request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return $this->success(data: NotificationResource::collection(request()->user()->notifications()->latest()->get()));
    }

    public function read(): JsonResponse
    {
        return $this->success(data: NotificationResource::collection(request()->user()->readNotifications()->latest()->get()));
    }

    public function unread(): JsonResponse
    {
        return $this->success(data: NotificationResource::collection(request()->user()->unreadNotifications()->latest()->get()));
    }

    public function show($id): JsonResponse
    {
        $notification = request()->user()->notifications()->where('id', $id)->first();
        if (!$notification) throw new ModelNotFoundException;
        $notification->markAsRead();
        return $this->success(data: new NotificationResource($notification));
    }

    public function markAsRead($id): JsonResponse
    {
        $notification = request()->user()->notifications()->where('id', $id)->first();
        if (!$notification) throw new ModelNotFoundException;
        $notification->markAsRead();
        return $this->success('Notification marked as read.');
    }

    public function markAllAsRead(): JsonResponse
    {
        foreach (request()->user()->unreadNotifications()->get() as $notification) $notification->markAsRead();
        return $this->success('Notifications marked as read.');
    }
}
