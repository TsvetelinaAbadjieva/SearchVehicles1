<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidation;
use App\Brand;
use App\VehicleModel;
use App\Vehicle;
use App\Engine;
use App\Color;
use Input;



class Specifications extends Controller
{
    public function index(){

        $brands =   \DB::table('brands')->orderBy('name','asc')->get();
        $models =   \DB::table('models')->orderBy('model','asc')->get();
        $engines =  \DB::table('engines')->orderBy('engine_type','asc')->get();
        $colors  =  \DB::table('colors')->orderBy('color_name','asc')->get();
        $data=[
            'brands'    =>$brands,
            'engines'   =>$engines,
            'models'    =>$models,
            'colors'    =>$colors
        ];
        return view('admin',$data);
    }
    public function getModels(Request $request){
        $id=$request->get('id');

        if($id != 0)
            $models = \DB::table('models')->where('brand_id','=',$id)->orderBy('model','asc')->get();
       else
           $models =   \DB::table('models')->orderBy('model','asc')->get();

         //dd(response()->json($models));
        return response()->json($models);
    }
    public function storeBrand(Request $request, $id = null ){
            $id = $request->get('allBrands');
            $data['brand']=$request->get('brand');

            $data['brand']=htmlspecialchars(trim($data['brand']),3,'UTF-8');
            $data['brand']=str_replace('  ',' ',$data['brand']);
            $rules=[
                'brand'=>'required|unique:brands,name|max:255|regex:/^[A-Za-z_\s*]+[A-Za-z_]*$/i'
            ];
            $messages=[
                'brand.required'=>'Полето е задължително',
                'brand.unique'=>'Този запис вече съществува',
                'brand.alpha'=>'Очаква се символно име',
                'brand.max'=>'Полето е до 255 символа',
                'brand.regex'=>'Очаква се символно име'

            ];

            $validation=Validator::make($data,$rules,$messages);
            if($validation->fails())
                return redirect('/admin')->withErrors($validation)->withInput();
               // return Response::json(['errors'=>$validation->getMessageBag()->toArray()]);
            else {

                if($id == 0){
                    $brand=new Brand();
                    $brand->name=$data['brand'];
                    $brand->save();

                     return back()->with('Success',"Добавена марка");
                }
                else{

                    $oldBrand=Brand::findOrfail($id);
                    $oldBrand->name=$data['brand'];
                    $response=$oldBrand->save();
                    if($response)
                        echo "Success";
                   // Brand::where('id', $id)->update(array('name' => $data['brand']));
                    //$oldBrand = \DB::table('brands')->where('id',$id)->first();
                   // return response()->json($request);
                }


            }


            return redirect('/admin');
    }


    public function storeModel(Request $request){


        $id = $request->get('allModels');
        $data['model']=htmlspecialchars(trim($request->get('model')),3,'UTF-8');
        $data['model']=str_replace('  ',' ',$data['model']);
        $brand=$request->get('brand1');
        $data['brand1']=$brand;
       // dd($brand);




        $rules=[
            'model'=>"required|unique:models,model|max:255|regex:/^[A-Za-z_\s*]+[A-Za-z0-9_\s*]*/",
            'brand1'=>"not_in:0"
        ];
        $messages=[
            'model.required'=>'Полето е задължително',
            'model.unique'=>'Този запис вече съществува',
           // 'model.alpha_num'=>'Очаква се символно име',
            'model.max'=>'Полето е до 255 символа',
            'model.regex'=>'Очаква се име, започващо с буква',
            'brand1.not_in'=>'Изберете марка'


        ];
        $validation=Validator::make($data,$rules,$messages);
        if($validation->fails()){
            return redirect('/admin')->withErrors($validation)->withInput();
        }

        else{
            if($id==0){
                $model= new VehicleModel();
                $model->model=$data['model'];
                $model->brand_id=$brand;
                $model->save();
            }
            else{
                $model=VehicleModel::findOrFail($id);
                $model->model=$data['model'];
                $response=$model->save();
                if($response)
                    return back()->with('Success',"Редактиран модел");
            }
        }
        return redirect('/admin');

        //$this->validate($request,$request->rulesModel(),$request->messagesModel());

    }
    public function storeEngine(Request $request){
        $id = $request->get('allEngines');
        $data['engine']=htmlspecialchars(trim($request->get('engine')),3,'UTF-8');

        $rules=[
            'engine'=>"required|unique:engines,engine_type|max:255|regex:/^[A-Za-z0-9\s*]+[A-Za-z0-9\s*]*/"

        ];
        $messages=[
            'engine.required'=>'Полето е задължително',
            'engine.unique'=>'Този запис вече съществува',
          //  'engine.alpha_num'=>'Очаква се символно име',
            'engine.max'=>'Полето е до 255 символа',
            'engine.regex'=>'Невалиден формат'



        ];
        $validation=Validator::make($data,$rules,$messages);
        if($validation->fails()){

            return redirect('/admin')->withErrors($validation)->withInput();
        }

        else{
            if($id == 0){
                $engine= new Engine();
                $engine->engine_type=$data['engine'];
                $engine->save();
            }
            else{
                $engine=Engine::findOrFail($id);
                $engine->engine_type=$data['engine'];
                $engine->save();

            }
        }

        return redirect('/admin');


    }
    public function storeColor(Request $request){
        $id=$request->get('allColorNames');
        $data['color']=$request->get('color');
        $data['color_name']=htmlspecialchars(trim($request->get('color_name')),3,'UTF-8');
        $data['color_name']=str_replace('  ',' ',$data['color_name']);

        $rules=[
            'color_name'=>"required|unique:colors,color_name|max:255|regex:/^[A-Za-z\s*]+[A-Za-z0-9\s*]*/"

        ];
        $messages=[
            'color_name.required'=>'Полето е задължително',
            'color_name.unique'=>'Този запис вече съществува',
            'color_name.max'=>'Полето е до 255 символа',
            'color_name.regex'=>'Очаква се име, започващо с буква'



        ];
        $validation=Validator::make($data,$rules,$messages);
        if($validation->fails()){

            return redirect('/admin')->withErrors($validation)->withInput();
        }

        else{
            if($id == 0){
                $color = new Color();
                $color->color=$data['color'];
                $color->color_name=$data['color_name'];
                $color->save();

            }
            else{
                $color=Color::findOrFail($id);
                $color->color_name=$data['color_name'];
                $color->color=$data['color'];
                $color->save();
            }
        }
        $data=[
            'color_name'=>$data['color_name'],
            'color'=>$data['color']
        ];
        return redirect('/admin');
        //return redirect('/admin',$data);



    }
    public function storePrice(RequestValidation $request){

        $this->validate($request,$request->rulesPrice(),$request->messagesPrice());

    }
}
