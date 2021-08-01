<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $userinfo = Userinfo::latest()->get();
        //return response()->json($userinfo);
  
        return view('auth.index',compact('userinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required',
            
        ]);

     //   return response()->json($request); //for check requested input

     

         //for insert input
         $userinfo= new Userinfo();
          $userinfo->name =$request->name;
         
          $userinfo->image ="userImage/no_image.png";
          $userinfo->save();

        //for image uploading

        if( $picInfo=$request->file('picture')){

           // return response()->json($picInfo);
             $lastID=$userinfo->id;
              $picInfo=$request->file('picture');     
              $picName=$lastID.$picInfo->getClientOriginalName();
            //  $picName=$picInfo->getClientOriginalName();
              $folder="userImage/";
              $picInfo->move($folder,$picName);


          
              
              $savefolder="userImage/";
              $picUrl=$savefolder.$picName;      
              $userinfopic= Userinfo::find($lastID);
              $userinfopic->image=$picUrl;
              $userinfopic->save();

        }


      
        return redirect()->route('userinfo.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(userinfo $userinfo)
    {
        //
         return view('auth.useredit',compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userinfo $userinfo)
    {
        //
         $userinfo->update($request->all());    

        

         //request updating for new image 
         $picInfo=$request->file('newimage');   
         
         if($picInfo){

            $updatedID=$request->userinfo->id;
            $UserImageInfo=userinfo::where('id',$updatedID)->first();
            $exist_pic=$UserImageInfo->image;

            //checking existing image 
            if(file_exists($exist_pic)){           
             unlink($exist_pic);
            }           


          $picName=$updatedID.$picInfo->getClientOriginalName();

            $path="userImage/";
            $picUrl=$path.$picName;
            $picInfo->move($path,$picName);   

            $savepicUrl=$path.$picName;
            $updateuserimage=userinfo::find($updatedID);
            $updateuserimage->image=$savepicUrl;
            $updateuserimage->save();      


           }        



          return redirect()->route('userinfo.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(userinfo $userinfo)
    {
        //

           //request  for checking existing image 
            $deletedID=$userinfo->id;
            $UserdeleteInfo=userinfo::where('id',$deletedID)->first();
            $exist_pic=$UserdeleteInfo->image;

            if(file_exists($exist_pic)){           
             unlink($exist_pic);
            }      
        //user deleted
        $userinfo->delete();
        return redirect()->route('userinfo.index')
                        ->with('success','User deleted successfully');
    }
}
