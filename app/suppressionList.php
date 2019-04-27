<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
class suppressionList extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
 
    public static function getAll()
    {
      return suppressionList::get();
    }

    public static function getByPhone($phone)
    {
      return suppressionList::where('phone',  $phone)->first();
    }
    
	  public static function create($request)
    {       
      $suppressionList = new suppressionList;   
      $suppressionList->phone = $request->phone ?: null; 
      $suppressionList->type = $request->type ?: 'both';
      $suppressionList->save();
      return $suppressionList->id;
    }

    public static function read($id)
    {
      return suppressionList::where('id',  $id)->first();
    }

    public static function updatethis($request)
    {       
      $suppressionList = suppressionList::find($request->id);  
      $suppressionList->phone = $request->phone ?: null; 
      $suppressionList->type = $request->type ?: 'both';
      $suppressionList->save();
      return $suppressionList->id;
    }


    public static function deletethis($id)
    {
      $suppressionList = suppressionList::find($id);
      $suppressionList->delete();
      return true;
    }
 
}
