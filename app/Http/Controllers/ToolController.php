<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Events\DeleteTool;
use App\Events\NewTool;
use App\Events\UpdatedTool;
use App\Http\Requests\ToolRequest;
use App\Models\Tool as Tool;
use App\Http\Resources\ToolResource;
use Illuminate\Support\Facades\Log;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::paginate(15);
        return ToolResource::collection($tools);
    }

    public function show($id)
    {
        $tool = Tool::findOrFail($id);
        return new ToolResource($tool);
    }

    public function store(ToolRequest $request)
    {
        try {
            $tool = new Tool;
            $tool->sku = $request->input('sku');
            $tool->name_product = $request->input('name_product');
            $tool->quantity = $request->input('quantity');

            if ($tool->save()) {
                // event(new NewTool($tool));
                return new ToolResource($tool);
            }

        } catch (\Exception $e) {
            return response()->json([
                '(STORE) Não foi possivel criar a ferramenta: ' . $request->id
            ]);
        }

    }

    public function update(ToolRequest $request)
    {
        try {
            $tool = Tool::findOrFail($request->id);
            $tool->name_product = $request->input('name_product');
            $tool->quantity = $request->input('quantity');

            if ($tool->save()) {
                // event(new UpdatedTool($tool));
                Log::info('Sucesso ao atualizar a ferramenta');
                return new ToolResource($tool);
            }
        } catch (\Exception $e) {
            Log::info('Erro ao atualizar a ferramenta com ID: ' . $request->id . ' no ToolController@update');
            return response()->json([
                '(UPDATE) Não foi encontrada a ferramenta: ' . $request->id
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $tool = Tool::findOrFail($id);

            if ($tool->delete()) {
                // event(new DeleteTool($tool));
                return response()->json([
                    '(DESTROY - Success) Ferramenta com ID: ' . $id . ' deletada'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                '(DESTROY - Error) Não foi encontrada a ferramenta: ' . $id
            ], 404);
        }

    }
}
