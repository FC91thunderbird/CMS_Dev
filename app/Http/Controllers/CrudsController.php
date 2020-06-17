<?php

namespace App\Http\Controllers;
use App\Crud;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use Validator;

class CrudsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $side = DB::table('menus')->get();
         // $data = DB::table('cruds')->get();
         // return view('Page.user', ['data'=>$data, 'side'=>$side]);
        return view('layouts.sidebar',['side'=>$side]);
    }

    public function store(Request $request){
        $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $new_name
        );

        Crud::create($form_data);
        return redirect('crud')->with('success', 'Data Added successfully.');
    
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required'
            ]);
        }

        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $image_name
        );
  
        Crud::whereId($id)->update($form_data);

        return redirect('crud')->with('success', 'Data is successfully updated');
    }

    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();

        return redirect('crud')->with('success', 'Data is successfully deleted');
    }


    function cat(){
        $crud = DB::table('cruds')->get();
        $data = DB::table('cruds')
        ->join('products', 'products.product_cat', '=', 'cruds.id')->orderBy('product_id','desc')->get();
        return view('Page.about', ['data' => $data, 'crud'=>$crud]);
    }

    function add_product(Request $request)
    {
        $request->validate([
            'product_name'    =>  'required',
            'product_cat'     =>  'required'            
        ]);

        $image = $request->file('product_image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
       
        $post = DB::table('products')->insert([
                   'product_name'       =>   $request->product_name,
            'product_cat'        =>   $request->product_cat,
            'product_description' => $request->product_description,
            'product_price'       => $request->product_price,
            'product_image'       =>   $new_name
                 ]);

        return redirect('/cat')->with('success', 'Data is successfully Added');
    }

    public function product_update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('product_image');
        if($image != '')
        {
            $request->validate([
                'product_name'    =>  'required',
                'product_description'     =>  'required',
                'product_image'   =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'product_name'    =>  'required',
                'product_description'     =>  'required'
            ]);
        }
        $form_data = array(
            'product_name'       =>   $request->product_name,
            'product_cat'        =>   $request->product_cat,
            'product_description' => $request->product_description,
            'product_price'       => $request->product_price,
            'product_image'       =>   $image_name
        );
        product::whereproduct_id($id)->update($form_data);
        return redirect('/cat')->with('success', 'Data is successfully updated');
    }
    public function delete_prod($id)
    {
        product::where('product_id','=',$id)->delete();
        return redirect('cat')->with('success', 'Data is successfully deleted');
    }


    // Menu section
    function menu(){
        $side = DB::table('menus')->get();
         $menu = DB::table('menus')->get();         
         $crud = DB::table('cruds')->get();
         
         $article = DB::table('cruds')
         ->join('articles', 'articles.article_category', '=', 'cruds.id')->orderBy('article_id','desc')->get();
        return view('Page.menu', ['menu'=>$menu,'side'=>$side, 'article'=>$article, 'crud'=>$crud]);
    }
   
    function add_menu(Request $request){
        $request->validate([
            'menu_name'    =>  'required'           
        ]);

       
        $post = DB::table('menus')->insert([
                   'menu_name'       =>   $request->menu_name,
            'parent'        =>   $request->parent,
            'link' => $request->link,
            'icon'       => $request->icon,
            'sort'       => $request->sort
                 ]);

        return redirect('menu')->with('success', 'Menu Added..');
    }
    public function menu_update(Request $request, $id){      
            $request->validate([
                'menu_name'    =>  'required',
                'link'     =>  'required'
            ]);
      
     DB::table('menus')->where('menu_id', $id)->update([
            'menu_name'     =>   $request->menu_name,
            'parent'        =>   $request->parent,
            'link'          => $request->link,
            'icon'          => $request->icon,
            'sort'          => $request->sort
        ]);

        return redirect('menu')->with('success', 'Menu updated...');
    }
    public function menu_delete($id)
    {
        DB::table('menus')->where('menu_id', $id)->delete();
        return redirect('menu')->with('success', 'Menu deleted...');
    }


// Articles
    function add_article(Request $request){
        $request->validate([
            'article_title'    =>  'required',
            'article_content'     =>  'required',
            'article_image'    => 'required',
            'article_category'  =>'required',
            'article_status'    =>'required'           
        ]);

        $image = $request->file('article_image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
       
        $post = DB::table('articles')->insert([
                   'article_title'       =>   $request->article_title,
            'article_content'        =>   $request->article_content,
            'article_image' => $new_name,
            'article_category'       => $request->article_category,
            'article_status'       =>   $request->article_status,
            'article_featured'  => $request->article_featured
                 ]);

        // return redirect('menu')->with('success', 'Articles Added successfully...');
        // Session::flash('success', 'This is a message!'); 
    }

    function article_update(Request $request,$id){
        $image_name = $request->hidden_image;
        $image = $request->file('article_image');
        if($image != '')
        {
            $request->validate([
            'article_title'    =>  'required',
            'article_content'     =>  'required',
            'article_image'    => 'required',
            'article_category'  =>'required',
            'article_status'    =>'required'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'article_title'    =>  'required',
            'article_content'     =>  'required'
            ]);
        }
        DB::table('articles')->where('article_id', $id)->update([
            'article_title'          =>   $request->article_title,
            'article_content'        =>   $request->article_content,
            'article_image'          => $image_name,
            'article_category'       => $request->article_category,
            'article_status'         =>   $request->article_status,
            'article_featured'       => $request->article_featured
        ]);
        return redirect('menu')->with('success', 'Data is successfully updated');
    }

    function article_delete($id){
        DB::table('articles')->where('article_id', $id)->delete();
        return redirect('menu')->with('success', 'Menu deleted...');
    }


 // Test Panel  
    function test(){
        
        $data = DB::table('cruds')->get();
       
        return view('Page.test', ['data'=>$data]);   
    } 

    function add_test(Request $request){
         $request->validate([
             'first_name'    =>  'required',
            'last_name'     =>  'required',
            'image'         =>  'required|image|max:2048'         
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
       
        $post = DB::table('cruds')->insert([
            'first_name'        =>  $request->first_name,
            'last_name'         =>  $request->last_name,
            'image'             =>  $new_name
                 ]);
        
        return response()->json(['success' => 'Data Added successfully.']);

        // return redirect('/cat')->with('success', 'Data is successfully Added');
    }
    public function edit_test(Request $request,$id)
    {
        if(request()->ajax())
        {
            $data = Crud::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    
    }

    function update_test(Request $request){
       $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'image'         =>  'image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
                'first_name'    =>  'required',
                'last_name'     =>  'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $image_name
        );
        Crud::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

       
    }

    function delete_test($id){
         DB::table('cruds')->where('id', $id)->delete();
        return response()->json(['success' => 'deleted...']);
    }

}
