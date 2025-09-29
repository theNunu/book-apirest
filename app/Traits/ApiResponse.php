<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse($data, $message = 'Operación exitosa', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function createdResponse($data, $message = 'Recurso creado correctamente')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], 201); // 👈 Código 201
    }

    protected function updatedResponse($data, $message = 'Recurso actualizado correctamente')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], 200); // 👈 Código 200
    }

    protected function deletedResponse($message = 'Recurso eliminado correctamente')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ], 200); // 👈 Podría ser 204 si no quieres data
    }

    protected function notFoundResponse($message = 'Recurso no encontrado')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], 404);
    }

    protected function alreadyDeletedResponse($message = 'El recurso ya fue eliminado')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], 409); // 👈 Conflict
    }

    protected function errorResponse($message = 'Error interno del servidor', $code = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], $code);
    }
}
