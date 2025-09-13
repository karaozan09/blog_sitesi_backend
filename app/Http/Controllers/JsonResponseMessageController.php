<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class JsonResponseMessageController extends Controller
{
    protected function success(string $message = 'İşlem başarılı.', mixed $data = null, int $code = 200): JsonResponse
    {
        return response()->json(
            array_filter([
                'message' => $message,
                'data' => $data
            ]),
            $code
        );
    }

    protected function created(string $message = 'Başarıyla oluşturuldu.', mixed $data = null): JsonResponse
    {
        return $this->success($message, $data, 201);
    }

    protected function updated(string $message = 'Başarıyla güncellendi.', mixed $data = null): JsonResponse
    {
        return $this->success($message, $data);
    }

    protected function deleted(string $message = 'Başarıyla silindi.'): JsonResponse
    {
        return $this->success($message);
    }

    protected function error(string $message = 'Beklenmeyen bir sorun oluştu.', int $code = 400, mixed $errors = null): JsonResponse
    {
        return response()->json(
            array_filter([
                'error' => $message,
                'details' => $errors
            ]),
            $code
        );
    }

    protected function notFound(string $message = 'Kayıt bulunamadı.'): JsonResponse
    {
        return $this->error($message, 404);
    }

    protected function unauthorized(string $message = 'Yetkisiz işlem.'): JsonResponse
    {
        return $this->error($message, 401);
    }

    protected function forbidden(string $message = 'Bu işlemi yapamazsınız.'): JsonResponse
    {
        return $this->error($message, 403);
    }

    protected function validationError(array $errors, string $message = 'Doğrulama hatası oluştu.'): JsonResponse
    {
        return $this->error($message, 422, $errors);
    }

}
