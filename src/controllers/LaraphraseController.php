<?php

class LaraphraseController extends BaseController {

    /**
     * Remote phrase update
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postRemoteUpdate()
    {
        $class     = Input::get('class');
        $attribute = Input::get('attribute');

        if ( Laraphrase::isInWhiteList($class, $attribute) )
        {
            $id       = Input::get('id');
            $newValue = Input::get('newValue');
            
            $record = $class::where('aprove','1')->find($id);
            
            if ( is_null($record) ) return Response::json(['status' => 'error', 'message' => 'Phrase is not exists!'], 403);
            
            $record->create(['locale'=>'en','key'=>$record['key'],'value'=>$newValue]);

            return Response::json($record->toJson());
        }
        return Response::json(['status' => 'error', 'message' => 'Attribute is not in white list!'], 403);
    }
    
    public function approve()
    {
        
        $id       = Input::get('id');
        $key      = Input::get('key');
        
        Phrase::where('aprove', 1)->where('key', $key)->update(array('aprove' => 0));
        Phrase::where('id', $id)->update(array('aprove' => 1));
        
        return 'true';
    }
    
    public function delete()
    {
        
        $id       = Input::get('id');        
        Phrase::find($id)->delete();
        
        return 'true';
    }

}