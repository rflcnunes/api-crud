<?php

namespace App\Observers;

use App\Models\Tool;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ToolObserver
{
    /**
     * Handle the Tool "created" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function created(Tool $tool)
    {
        Log::info('Observer: created');
        DB::table('historics')->updateOrInsert([
            'sku' => $tool->sku,
            'name_product' => $tool->name_product,
            'quantity' => $tool->quantity,
            'created_at' => $tool->created_at,
        ]);
    }

    /**
     * Handle the Tool "updated" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function saved(Tool $tool)
    {
        Log::info('Observer: saved');
        DB::table('historics')->updateOrInsert([
            'sku' => $tool->sku,
            'name_product' => $tool->name_product,
            'quantity' => $tool->quantity,
            'updated_at' => $tool->updated_at,
        ]);
    }

    /**
     * Handle the Tool "deleted" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function deleted(Tool $tool)
    {
        Log::info('Observer: deleted');
        DB::table('historics')->updateOrInsert([
            'sku' => $tool->sku,
            'name_product' => $tool->name_product,
            'quantity' => $tool->quantity,
            'deleted_at' => $tool->deleted_at,
        ]);
    }

    /**
     * Handle the Tool "restored" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function restored(Tool $tool)
    {
        //
    }

    /**
     * Handle the Tool "force deleted" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function forceDeleted(Tool $tool)
    {
        //
    }
}
