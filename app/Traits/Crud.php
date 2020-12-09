<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Crud
{
    /**
     * Display a listing of the resource.
     *
     * @param  array  $relationships
     * @return array
     */
    public static function index_default($relationships = [])
    {
        $resources = self::with($relationships)->orderBy('id', 'desc')->paginate(10);
        return $resources;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  {any}  $fields
     * @return array
     */
    public static function store_default($fields_to_store)
    {
        DB::beginTransaction();
        $resource = null;
        $message_type = 'success';
        $message_text = 'Created successfully';
        $code = 200;

        try {
            $resource = self::create($fields_to_store);
            DB::commit();
        } catch (\Exception $e) {
            $resource = $e;
            $message_type = 'error';
            $message_text = 'Can not be created';
            $code = 404;
            DB::rollback();
        }

        return [
            'data' => $resource,
            'message_type' => $message_type,
            'message_text' => $message_text,
            'code' => $code
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public static function show_default($id, $relationships = [])
    {
        $message_type = 'success';
        $message_text = 'Found it.';
        $code = 200;

        try {
            $resource = self::with($relationships)->findOrFail($id);
        } catch (\Exception $e) {
            $resource = $e;
            $message_type = 'error';
            $message_text = 'Can not be found';
            $code = 404;
        }

        return [
            'data' => $resource,
            'message_type' => $message_type,
            'message_text' => $message_text,
            'code' => $code
        ];
    }

    /**
     * Update the specified resource in storage.
     * it can be one field or more. This is controlled by the rules implemented in each case
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  int  $id
     * @return array
     */
    public static function update_default($fields_to_update, $id)
    {
        DB::beginTransaction();
        $resource = null;
        $message_type = 'success';
        $message_text = 'Updated';
        $code = 200;

        try {
            $resource = self::findOrFail($id)->update($fields_to_update);
            DB::commit();
        } catch (\Exception $e) {
            $resource = $e;
            $message_type = 'error';
            $message_text = 'Can not be updated';
            $code = 404;
            DB::rollback();
        }

        return [
            'data' => $resource,
            'message_type' => $message_type,
            'message_text' => $message_text,
            'code' => $code
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public static function destroy($id)
    {
        DB::beginTransaction();
        $resource = null;
        $message_type = 'success';
        $message_text = 'Deleted';
        $code = 200;

        try {
            $resource = self::findOrFail($id);
            $resource->delete();
            DB::commit();
        } catch (\Exception $e) {
            $resource = $e;
            $message_type = 'error';
            $message_text = 'Can not be deleted';
            $code = 404;
            DB::rollback();
        }

        return [
            'data' => $resource,
            'message_type' => $message_type,
            'message_text' => $message_text,
            'code' => $code
        ];
    }
}
