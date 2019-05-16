<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get single article api
    public function show($id){
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk0MWYzMmNlYjZlZGNiMDRkMjA2MzRlZTJlNTNiMWQ5NDEzZDdiYjA2OGFkM2Y4NTM4MjZhYzUzOTY1YmE3OTE3YWM4YWY1OThlZmEyOGEwIn0.eyJhdWQiOiIyIiwianRpIjoiOTQxZjMyY2ViNmVkY2IwNGQyMDYzNGVlMmU1M2IxZDk0MTNkN2JiMDY4YWQzZjg1MzgyNmFjNTM5NjViYTc5MTdhYzhhZjU5OGVmYTI4YTAiLCJpYXQiOjE1NTc5OTEzMTUsIm5iZiI6MTU1Nzk5MTMxNSwiZXhwIjoxNTg5NjEzNzE1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UceW4_y9Shpggoc1ulM6JBq53Sdk8nLLMt4jTNuPxOE3GjID_22nNQzGo5hdgLZLRVSMh-KVOHWsYsiLFSSNcAtFX1iDuHzNmnRJUlHy-M94g4yiafLXKIWCPLW5OJzrJ9x1YmT4bRD8vtyXvZMkCx4cn0NZHhsegi524UnnTp21yj8TI_ZT_Cous7h84cHg1dksLxvMelTh5a3_3NHQWF7M_RFbXBqqAeT335iLPsO7gKbeuvVcrErLx2Hcm4lYvf7C5PmGySZ-hVRSUP_mrpEWnS5NNPLrbkAzBHrc6E8ISLjuVUcpvWnpSpLJnYAkXx5_bIG3bHfqC59TtboHYR3qmSPqf6ADIZGcWVxP8W61mUCOk57xW2YlmgmX8bRyOV_dzBF0O-BnVn1rao57f8rFrvTaf2-8y0hIAUog1BgMpSI6znfgQsItQ_9rZ2hopZKwJUfRXKi7iabOBZE9MTontwCbCi_kpWqCGyv_84Gz1nG_8n3Nk9Aq6D7wMzEfji26XZP5uTBaG37--H816nqx5ABeUqxCA5_PbYbui6KhQLif_t6Dhoyp_q9PFx2bg2BUbtr1XTixRjuVnY4YXpIgzaePrGd2HIPcnfdvUGPKMVIZ8NQugCtdOL44DUTK41t-T7hAr3zU1XCcEyvD2xCml-JwIj8YtZZz22bLG9Q';
        $client = new Client();

        $Req = $client->get('http://myshop-vodworks.test/api/news/'.$id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        $response = $Req->getBody()->getContents();
        $page = json_decode($response);

        return view('BackEnd/pages/show', compact('page'));
    }

    //Get all news records api
    public function index(){
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk0MWYzMmNlYjZlZGNiMDRkMjA2MzRlZTJlNTNiMWQ5NDEzZDdiYjA2OGFkM2Y4NTM4MjZhYzUzOTY1YmE3OTE3YWM4YWY1OThlZmEyOGEwIn0.eyJhdWQiOiIyIiwianRpIjoiOTQxZjMyY2ViNmVkY2IwNGQyMDYzNGVlMmU1M2IxZDk0MTNkN2JiMDY4YWQzZjg1MzgyNmFjNTM5NjViYTc5MTdhYzhhZjU5OGVmYTI4YTAiLCJpYXQiOjE1NTc5OTEzMTUsIm5iZiI6MTU1Nzk5MTMxNSwiZXhwIjoxNTg5NjEzNzE1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UceW4_y9Shpggoc1ulM6JBq53Sdk8nLLMt4jTNuPxOE3GjID_22nNQzGo5hdgLZLRVSMh-KVOHWsYsiLFSSNcAtFX1iDuHzNmnRJUlHy-M94g4yiafLXKIWCPLW5OJzrJ9x1YmT4bRD8vtyXvZMkCx4cn0NZHhsegi524UnnTp21yj8TI_ZT_Cous7h84cHg1dksLxvMelTh5a3_3NHQWF7M_RFbXBqqAeT335iLPsO7gKbeuvVcrErLx2Hcm4lYvf7C5PmGySZ-hVRSUP_mrpEWnS5NNPLrbkAzBHrc6E8ISLjuVUcpvWnpSpLJnYAkXx5_bIG3bHfqC59TtboHYR3qmSPqf6ADIZGcWVxP8W61mUCOk57xW2YlmgmX8bRyOV_dzBF0O-BnVn1rao57f8rFrvTaf2-8y0hIAUog1BgMpSI6znfgQsItQ_9rZ2hopZKwJUfRXKi7iabOBZE9MTontwCbCi_kpWqCGyv_84Gz1nG_8n3Nk9Aq6D7wMzEfji26XZP5uTBaG37--H816nqx5ABeUqxCA5_PbYbui6KhQLif_t6Dhoyp_q9PFx2bg2BUbtr1XTixRjuVnY4YXpIgzaePrGd2HIPcnfdvUGPKMVIZ8NQugCtdOL44DUTK41t-T7hAr3zU1XCcEyvD2xCml-JwIj8YtZZz22bLG9Q';
        $client = new Client();

        $Req = $client->get('http://myshop-vodworks.test/api/news/', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        $response = $Req->getBody()->getContents();
        $pages = json_decode($response);

        return view('BackEnd/pages/index', compact('pages'));
    }


    //Create news
    public function create(){
        $pages = Page::with('subpage')->where('page_id', 0)->orderBy('order')->pluck('title', 'id');
        return view('BackEnd/pages/add', compact('pages'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);

        Page::create($request->all());
        return redirect('/admin/page');
    }

    public function edit(Page $page){
        $pages = Page::with('subpage')->where('page_id', 0)->where('id', '<>',$page->id)->orderBy('order')->pluck('title', 'id');
        return view('BackEnd/pages/edit', compact('page', 'pages'));
    }

    //Update news
    public function update(Request $request, Page $page){
        $this->validate($request, [
            'title' => 'required',
            'order' => 'numeric',
            'status' => 'required|numeric',
        ]);

        $page->fill($request->all())->save();
        return redirect('/admin/page');
    }

    //Delete news
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/admin/page');
    }

    public function restore($id){
        $page = Page::withTrashed()->find($id);
        $page->restore();
        return redirect('/admin/page');
    }
}
