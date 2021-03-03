<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\ResposeBase\ResponseBase;
use App\Http\Services\LogService;

class AppServiceController extends Controller
{
    private $enpoint;

    public function __construct(){
        $this->enpoint = env('API_ENDPOINT');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = $this->client();

        $response =  $this->statusResposeCliet($client,);

        return view('dashboard',$response->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AddTodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = $this->client("POST","/",[
            "userId"=> $request->userid,
            "title"=> $request->title,
            "completed"=> $request->compled == "on" ? true:false
        ]);
        $response =  $this->statusResposeCliet($client,"POST");

        if($this->isValidStatus($response->status()) ){
            return redirect('/');
        }

        if(!$this->isValidStatus($response->status()) ){
            return redirect('/create')
                ->withErrors([
                    "Error in the trasacion exit"
                ])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = $this->client("GET","/{$id}");
        $response =  $this->statusResposeCliet($client);

        return view('showTodo',$response->get());
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
        $client = $this->client("PUT","/{$id}",[
            "id" => $request->id,
            "userId"=> $request->userid,
            "title"=> $request->title,
            "completed"=> $request->compled == "on" ? true:false
        ]);
        $response =  $this->statusResposeCliet($client, "PUT");

        if($this->isValidStatus($response->status()) ){
            return redirect('/');
        }

        if(!$this->isValidStatus($response->status()) ){
            return redirect('/create')
                ->withErrors([
                    "Error in the trasacion exit"
                ])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client("DELETE","/{$id}");
        $response =  $this->statusResposeCliet($client,"DELETE");

        if($this->isValidStatus($response->status()) ){
            return redirect('/');
        }

        if(!$this->isValidStatus($response->status()) ){
            return redirect('/create')
                ->withErrors([
                    "register destroy"
                ])
                ->withInput();
        }

    }


    public function listLog (){
        $list = LogService::get();
      //  dd($list);
        return view('logs',["datas"=>$list]);
    }


    /**
     * client generamos la solicitud del cliente atraves de HTTP y retornamos la respuesta .
     *
     * @param  string $verbo = "GET"
     * @param  string $url="/"
     * @param  string $data = "" parametro opcional
     * @return Illuminate\Support\Facades\Http ArrayAccess
     */

    private function client($verbo="GET", $url="/",$data="" ){
        $url = "/todos{$url}";
        if($verbo == "GET"){
            return  Http::get("{$this->enpoint}{$url}");
        }
        if($verbo == "POST"){
            return  Http::post("{$this->enpoint}{$url}",$data);
        }
        if($verbo == "PUT"){
            return  Http::put("{$this->enpoint}{$url}");
        }
        if($verbo == "DELETE"){
            return  Http::delete("{$this->enpoint}{$url}");
        }
    }


    private function statusResposeCliet( \ArrayAccess    $response,$action="GET" ){

        LogService::set($response->status(),$response->body(),$response->headers(),$action);
        if($response->successful()) {
            return new ResponseBase($response->status(),"Solicitud Ok", $response->json());
        }

        if($response->failed()){
            return new ResponseBase($response->status(),"Error de solicituid");
        }
    }


    private function isValidStatus(int $code):bool{
        $accet =  [200,202,201,206,204];
        return in_array($code,$accet);
    }
}
