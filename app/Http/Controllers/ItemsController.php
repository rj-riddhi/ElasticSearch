<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elastic\Elasticsearch\ClientBuilder;
use App\Models\Item;

class ItemsController extends Controller
{
    protected $client;
    public function  __construct()
    {
        $this->client = ClientBuilder::create()
    ->setHosts(['https://localhost:9200'])
    ->setBasicAuthentication('elastic', 'NYfa2TYy-AJ7otD5GPyO')
    ->setCABundle('C:\Users\Hello\Downloads\elasticsearch-8.2.1\config\certs\http_ca.crt')
    ->build();

    }

    public function home()
    {
        return view('welcome');
    }

    public function index(Request $req)
    {

        if($req->has('search'))
        {
            if($req->input('search') != '')
            {
            $params = [
                'index' =>'my_index',
                'type' => 'items',
                'body' => [
                    'query' => [
                        "query_string"=>[
                            'fields' => [
                                'title',
                                'description',
                            ],
                            'query' => "*{$req->input('search')}*",
                            
                        ],
                    ],
                ]
                ];
            $results = $this->client->search($params);
            // dd($results['hits']['hits']);
            if(count($results['hits']['hits']) > 0)
            {
                for($i =0; $i< count($results['hits']['hits']) ; $i++)
                {
            $items[$i] = $results['hits']['hits'][$i]['_source'];
                }
            return view('ItemSearch',['items'=>$items]);
            }
            else
            {
                $match = ['msg'=>"No Data Matches"];
                return view('ItemSearch',compact('match'));
            }
        }
    
        else
        {
            $error = "Please write something in search box";
            return view('ItemSearch',compact('error'));
        }
            
        }
        else
        {

            $table = Item::paginate(2);
            return view('ItemSearch',compact('table'));
        }
    }
    public function create(Request $req)
    {
        $this->validate($req, [
	    	'title' => 'required',
            'description' => 'required',
        ]);


        $item = Item::create($req->all());
        $params = [
            'index' => 'my_index',
            'type' => 'items',
            'body'  => [ 
                'title' => $req['title'],
                'description'=>$req['description']
                ]
        ];
        $this->client->index($params);
        return redirect()->back();

    }
}
