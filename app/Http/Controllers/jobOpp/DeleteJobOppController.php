<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Services\DeleteJobOppService;
use App\Http\Responses\ResponseService;
use Illuminate\Http\Request;
use Throwable;

class DeleteJobOppControllers extends Controller
{
    private DeleteJobOppService $delete;
    public function __construct(DeleteJobOppService $delete)
    {
        $this->delete = $delete;
    }

    public function delete(Request $request, $id)
    {
        try {
            $data = $this->delete->delete($request, $id);
            return ResponseService::success($data['massage'], $data['data']);
        } catch (Throwable $error) {
            return ResponseService::error('An error occurred', $error->getMessage());
        }
    }
}


// return response()->json(['message'=> ' ' , 'data' =>[ ] ],status);