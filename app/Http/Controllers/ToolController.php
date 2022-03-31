<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ToolRequest;
use App\Models\Tool as Tool;
use App\Http\Resources\ToolResource;

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
        $tool = new Tool;
        $tool->sku = $request->input('sku');
        $tool->name_product = $request->input('name_product');
        $tool->quantity = $request->input('quantity');

        if ($tool->save()) {
            return new ToolResource($tool);
        }
    }

    public function update(ToolRequest $request)
    {
        $tool = Tool::findOrFail($request->id);
        $tool->sku = $request->input('sku');
        $tool->name_product = $request->input('name_product');
        $tool->quantity = $request->input('quantity');

        if ($tool->save()) {
            return new ToolResource($tool);
        }
    }

    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        if($tool->delete()) {
            return new ToolResource($tool);
        }
    }
}
