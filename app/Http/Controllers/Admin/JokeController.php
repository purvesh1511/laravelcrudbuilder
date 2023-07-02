<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Joke;
use App\Models\Jokecategory;
use App\Traits\LaravelCurl;



class JokeController extends Controller
{

    use LaravelCurl;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->getDummyData());
        if(Auth::user()->can('Joke access')){
            $joke = Joke::latest()->get();

            return view('setting.joke.index',['jokes'=>$joke]);
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.joke.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name'=>'required',
        ]);
        $frequent = Joke::create(['name'=>$request->name]);
        return redirect()->back()->withSuccess('Joke created !!!');
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
    public function edit($id)
    {
       $joke = Joke::find($id);
       return view('setting.joke.edit',['jokes' => $joke]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jokecategory = Joke::find($id);
        $jokecategory->update(['name'=>$request->name]);
        return redirect()->back()->withSuccess('Joke updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jokecategory = Joke::find($id);
        $jokecategory->delete();
        return redirect()->back()->withSuccess('Joke deleted !!!');
    }

    public function getDummyData()
    {
        $allCategory = Jokecategory::get();
        foreach($allCategory as $c){
            // dd($c->name);
            $name = $c->name;
            $data = $this->request_curl("https://api.chucknorris.io/jokes/search?query=".$name,[],'GET');
            if($data->total){
                $joke = [];
                foreach($data->result as $d){
                    $joke['name'] = $d->value;
                    if(!empty($d->categories)){
                        foreach($d->categories as $cat){
                            $jobcategory = Jokecategory::where('name',$cat)->first();
                            if($jobcategory){
                                $joke['joke_category_id'] = $jobcategory->id;
                                Joke::create($joke);
                            }
                        }
                    }else{
                        Joke::create($joke);
                    }
                }
            }
        }
    }

}
