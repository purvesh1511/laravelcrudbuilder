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
        if(Auth::user()->can('Joke access')){
            $joke = Joke::paginate(10);
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
        // $allCategory = Jokecategory::get();
        // foreach($allCategory as $c){
        //     // dd($c->name);
        //     $name = $c->name;
        //     $data = $this->request_curl("https://api.chucknorris.io/jokes/search?query=".$name,[],'GET');
        //     if($data->total){
        //         $joke = [];
        //         foreach($data->result as $d){
        //             $joke['name'] = $d->value;
        //             if(!empty($d->categories)){
        //                 foreach($d->categories as $cat){
        //                     $jobcategory = Jokecategory::where('name',$cat)->first();
        //                     if($jobcategory){
        //                         $joke['joke_category_id'] = $jobcategory->id;
        //                         Joke::create($joke);
        //                     }
        //                 }
        //             }else{
        //                 Joke::create($joke);
        //             }
        //         }
        //     }
        // }

        // get json read data local

        // $datadd = file_get_contents("data.json");
        // $datadddd = json_decode($datadd);
        // $joke = [];
        // foreach($datadddd as $d){
        //     $joke['name'] = $d;
        //     $joke['type'] = 1;
        //     Joke::create($joke);
        // }

        // $datadd = file_get_contents("quotes.json");
        // $datadddd = json_decode($datadd);
        // $joke = [];
        // foreach($datadddd as $d){
        //     $joke['name'] = $d;
        //     $joke['type'] = 1;
        //     Joke::create($joke);
        // }

        // $datadd = file_get_contents("quotes1.json");
        // $datadddd = json_decode($datadd);
        
        // $joke = [];
        // foreach($datadddd as $d){
        //     $joke['name'] = $d->en;
        //     $joke['author'] = $d->author;
        //     $joke['type'] = 1;
        //     Joke::create($joke);
        // }
        
        // $dataArray = $this->request_curl("https://api.quotable.io/quotes?limit=100",[],'GET');
        // $totalPage = $dataArray->totalPages;
        // for ($i=1; $i < $totalPage+1; $i++) { 
        //     $data = $this->request_curl("https://api.quotable.io/quotes?page=$i&limit=100",[],'GET');
        //     foreach($data->results as $d){
        //         $joke['name'] = $d->content;
        //         $joke['type'] = 1;
        //         $joke['tag'] = implode(",", $d->tags);
        //         $joke['author'] = $d->author;
        //         Joke::create($joke);
        //     }
        // }

        // $dataArray = $this->request_curl("https://zenquotes.io/api/quotes",[],'GET');
        // foreach($dataArray as $d){
        //     $joke['name'] = $d->q;
        //     $joke['type'] = 1;
        //     $joke['author'] = $d->a;
        //     Joke::create($joke);
        // }
        // ini_set('max_execution_time', -1);
            // phpinfo();

        // $dataArray = $this->request_curl("https://quote-garden.onrender.com/api/v3/quotes?limit=100",[],'GET');
        // $totalPage = $dataArray->pagination->totalPages;
        
        // for ($i=1; $i < $totalPage+1; $i++) { 
        //     $data = $this->request_curl("https://quote-garden.onrender.com/api/v3/quotes?page=$i&limit=100",[],'GET');
        //     // dd($data);
        //     foreach($data->data as $d){
        //         $joke['name'] = $d->quoteText;
        //         $joke['type'] = 1;
        //         $joke['tag'] =  $d->quoteGenre;
        //         $joke['author'] = $d->quoteAuthor;
        //         Joke::create($joke);
        //     }
        // }


        // $datadd = file_get_contents("quotes2.json");
        // $datadddd = json_decode($datadd,false);
        // $joke = [];
        // foreach($datadddd as $d){
        //     // dd($d);
        //     $joke['name'] = $d->quote;
        //     $joke['author'] = $d->author;
        //     $joke['type'] = 1;
        //     Joke::create($joke);
        // }
    }

}
