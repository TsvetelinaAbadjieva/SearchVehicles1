<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Color;
use App\Engine;
use App\Vehicle;
use App\VehicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestValidation;

use Input;

class VehicleController extends Controller
{
    public function index(Request $request){

        $data=[
            'brands'    =>\DB::table('brands')->get(),
            'models'    =>\DB::table('models')->get(),
            'engines'   =>\DB::table('engines')->get(),
            'colors'    =>\DB::table('colors')->get(),
            'cars'      =>VehicleController::loadCars($request)
        ];


        return View('vehicleform',$data);
    }
    public function dashboard(Request $request){

        $data=[
            'brands'    =>\DB::table('brands')->get(),
            'models'    =>\DB::table('models')->get(),
            'engines'   =>\DB::table('engines')->get(),
            'colors'    =>\DB::table('colors')->get(),
            'cars'      =>$this->searchCars($request),
           // 'count'     =>$this->searchCars($request)['count']

        ];

        return View('carList',$data);
    }
    public function searchCars(Request $request){

        $brand=($request->get('brand')!=0)?$request->get('brand'):0;
        $model=($request->get('model')!= 0)?$request->get('model'):0;
        $engine=($request->get('engine')!= 0)?$request->get('engine'):0;
        $color=($request->get('color')!= 0)?$request->get('color'):0;
        $minPrice=$request->get('minPrice');
        $maxPrice=$request->get('maxPrice');
        $price=[$minPrice,$maxPrice];
       // dd($price);
/*
        if($price==0){
            $minPrice=0;
            $maxPrice=100000000;
        }
        elseif($price==7){
            $minPrice=30000;
            $maxPrice=100000000;
        }else{
            $minPrice=($price-1)*5000;
            $maxPrice=$price*5000;
        }
*/
        $conditions=[
            'brands_colors_engines_models.brand_id'=>$brand,
            'brands_colors_engines_models.model_id'=>$model,
            'brands_colors_engines_models.engine_id'=>$engine,
            'brands_colors_engines_models.color_id'=>$color,
            'price'=>[$minPrice,$maxPrice]
        ];
 /*       $conditions=[

            'brands_colors_engines_models.model_id'=>39,
            'brands_colors_engines_models.brand_id'=>7,
            'brands_colors_engines_models.engine_id'=>1,
            'brands_colors_engines_models.color_id'=>21,
            'price'=>[0,$maxPrice]
        ];

*/
        $cars=\DB::table('brands_colors_engines_models')
            ->join('brands','brands_colors_engines_models.brand_id','brands.id')
            ->join('models','brands_colors_engines_models.model_id','models.id')
            ->join('engines','brands_colors_engines_models.engine_id','engines.id')
            ->join('colors','brands_colors_engines_models.color_id','colors.id')
            ->where(function($f) use($conditions){
              $brand=$conditions['brands_colors_engines_models.brand_id'];
                  if($brand !=0 && $brand!=null)
                     return $f->where('brands_colors_engines_models.brand_id','=',$brand);
                         else return true;
              })
            ->where(function($f) use($conditions){
                $model=$conditions['brands_colors_engines_models.model_id'];
                if($model !=0 && $model!=null)
                    return $f->where('brands_colors_engines_models.model_id','=',$model);
                else return true;
            })
            ->where(function($f) use($conditions){
                $engine=$conditions['brands_colors_engines_models.engine_id'];
                if($engine !=0 && $engine!=null)
                    return $f->where('brands_colors_engines_models.engine_id','=',$engine);
                else return true;
            })
            ->where(function($f) use($conditions){
                $color=$conditions['brands_colors_engines_models.color_id'];
                if($color !=0 && $color!=null)
                    return $f->where('brands_colors_engines_models.color_id','=',$color);
                else return true;
            })

            ->where(function($f) use ($conditions){
                foreach($conditions as $key =>$value){
                    if($key=='price'){
                        return $f->whereBetween($key,[$value[0],$value[1]]);
                        //$f-where($key,'<',$value[1]);
                    }

                }
            })
            ->orderBy('brands.name','asc')
            ->select('brands_colors_engines_models.id',
                'brands_colors_engines_models.price',
                'brands_colors_engines_models.photo',
                'brands.name',
                'models.model',
                'engines.engine_type',
                'colors.color_name',
                'colors.color')
            //->paginate(10)
            ->get();
            $count=count($cars);
           // $data=[
              //  'count'=>$count,
                //'cars'=>$cars
            //];
        //return response()->json($data);
        //return View::make('carList',$data);
       // dd($cars);
        return $cars;

    }
    public function loadCars(Request $request){


        $cars=\DB::table('brands_colors_engines_models')
            ->join('brands','brands_colors_engines_models.brand_id','brands.id')
            ->join('models','brands_colors_engines_models.model_id','models.id')
            ->join('engines','brands_colors_engines_models.engine_id','engines.id')
            ->join('colors','brands_colors_engines_models.color_id','colors.id')
            ->orderBy('brands.name','asc')
            ->select('brands_colors_engines_models.id',
                    'brands_colors_engines_models.price',
                    'brands_colors_engines_models.photo',
                    'brands.name',
                    'models.model',
                    'engines.engine_type',
                    'colors.color_name',
                    'colors.color')
           // ->paginate(10)
            //->all();
        ->get();

        return $cars;
    }

    public function findCarById(Request $request){
        $id=$request->get('id');

        $car= Vehicle::findOrFail($id);
        $data=[
            'brand_id'  => $car->brand->id,
            'model_id'  => $car->model->id,
            'engine_id' => $car->engine->id,
            'color_id'  => $car->color->id,
            'price'     => $car->price,
           // 'photo'     => $car->photo
        ];
       // dd($data);
        return response()->json($data);
    }

    public function insert(Request $request){
        $id = $request->get('id');
        $photo=null;
        if($request->file('photo')!=null){
            if($request->file('photo')->isValid()){

                $photo=$request->file('photo');
            }

            else {

                echo '<h3><span class="alert-danger">Невалиден файл!</span></h3>';
            }
        }

        else {
            $photo=null;

        }
        $data['price']=htmlspecialchars(trim($request->get('price')),3,'UTF-8');
        $data['brand_id']=$request->get('brand');
        $data['model_id']=$request->get('model');
        $data['engine_id']=$request->get('engine');
        $data['color_id']=$request->get('color');
        $data['photo']= $photo;

        $rules=[
            'brand'=>"min:'1'",
            'model'=>"not_in:0",
            'color'=>"not_in:0",
            'engine'=>"not_in:0",
            'price'=>"required|numeric|between:0,1000000000000000|min:0",
            'photo'=>'nullable|sometimes|required|image|mimes:jpeg,bmp,png,gif,jpg|min:1Kb|max:400Kb|dimensions:min_width=200,min_height=200'

        ];
        $messages=[
            'price.required'=>'Полето е задължително',
            'price.numeric'=>'Очаква се числова стойност без интервали',
            'price.between'=>'Невалидна стойност',
            'price.min'=>'Допустими са положителни стойности',
            'brand.min'=>'Не е избрана марка',
           // 'brand.required'=>'Не е избрана марка',
            'model.not_in'=>'Не е избран модел',
            //'model.required'=>'Не е избран модел',
            'color.not_in'=>'Не е избран цвят',
            //'color.required'=>'Не е избран цвят',
            'engine.not_in'=>'Не е избран двигател',
            //'engine.required'=>'Не е избран двигател',
            'photo.required'=>'Невалиден или липсващ прикачен файл',
            'photo.mime'=>'Допустими разширения jpeg,bmp,png,gif',
            'photo.image'=>'Допустими Файлове - тип изображение',
            'photo.max'=>'Допустим размер на файла до 300Kb',
            'photo.min'=>'Файлът е празен',
            'photo.dimensions'=>'Размерите на изображението са под минималните'

        ];
        if($id!=0 && $photo==null){
            unset($rules['photo']);
            unset($messages['photo.required']);
            unset($messages['photo.mime']);
            unset($messages['photo.min']);
            unset($messages['photo.max']);
            unset($messages['photo.dimensions']);
        }
        $validation=Validator::make($data,$rules,$messages);
      //  dd($validation->errors('brand'));
        if($validation->fails()){

            return redirect('/car')->withErrors($validation)->withInput();
        }

        else{
            if($id == 0){
                if($photo!=null){
                    //$data['photo']=\Hash::make(time()).'.'.$photo->getClientOriginalExtension();
                    $data['photo']=$photo->getClientOriginalName().'.'.$photo->getClientOriginalExtension();

                    $destination=public_path('/uploads');
                    $photo->move($destination, $data['photo']);
                }

                $vehicle= new Vehicle();
                $vehicle->brand_id=$data['brand_id'];
                $vehicle->model_id=$data['model_id'];
                $vehicle->color_id=$data['color_id'];
                $vehicle->engine_id=$data['engine_id'];
                $vehicle->price=$data['price'];
                $vehicle->photo=$data['photo'];
                $vehicle->save();
            }
            else{
                $car = Vehicle::findOrFail($id);
                $oldFilename = $car->photo;
                $car->brand_id=$data['brand_id'];
                $car->model_id=$data['model_id'];
                $car->engine_id=$data['engine_id'];
                $car->color_id=$data['color_id'];
                $car->price=$data['price'];
                if($photo!=null){
                    $data['photo']=$photo->getClientOriginalName().'.'.$photo->getClientOriginalExtension();
                    //$data['photo']=\Hash::make(time()).'.'.$photo->getClientOriginalExtension();
                    $destination=public_path('/uploads');
                    $photo->move($destination, $data['photo']);
                    $filename = public_path().'/uploads/'.$oldFilename;
                    $car->photo = $data['photo'];

                    if (file_exists($filename)) {
                        unlink($filename);
                       // Storage::delete($filename);
                    }
                }else
                    $car->photo=$oldFilename;
                $car->save();
            }
        }
        //$this->postImage->add($data['photo']);
        return back()->with('success','Image Upload successful');
        //return redirect('/admin');
    }
}
