<?php

namespace App\Http\Controllers\Adm;

use App\DTO\Suporte\CreateSuporteDTO;
use App\DTO\Suporte\UpdateSuporteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEditSuporte;
use App\Models\Suporte;
use App\Services\SuporteService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SuporteController extends Controller
{
    public function __construct(
        protected SuporteService $service
    ){}

    public function index(Suporte $suporte)
    {
        $suportes = $this->service->getAll($suporte->filter);

        $xss = '<script>alert("Sou um hacker >:)");</script>';

        return view('adm/suportes/index',compact('suportes','xss'));
    }

    public function show(string|int $id)
    {
        //  Suporte::find($id);
        //  Suporte::where('id',$id)->first();
        //  Suporte::where('id',' = ',$id)->first();
        if(!$suporte = $this->service->findOne($id)){
            return redirect()->back();
        }
        
        return view('adm/suportes/show', compact('suporte'));
    }

    public function create()
    {
        return view('adm/suportes/create');
    }

    public function store(StoreEditSuporte $request, Suporte $suporte)
    {
        // return view('adm/suportes/store');
        
        // $data = $request->validated();
        // $data['status'] = 'a';
        // $suporte->create($data);
        
        $this->service->new(
            CreateSuporteDTO::makeFromRequest($request)
        );

        return redirect()->route('suporte.index');
    }

    public function edit(Suporte $suporte, string| int $id)
    {
        if(!$suporte = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('adm/suportes/edit', compact('suporte'));
    }

    public function update(StoreEditSuporte $request, Suporte $suporte, string| int $id)
    {
        $suporte = $this->service->update(
            UpdateSuporteDTO::makeFromRequest($request)
        );

        if(!$suporte){
            return redirect()->back();
        }

        //// $suporte->subject = $request->subject;
        //// $suporte->body = $request->body;
        //// $suporte->save();

        //// $suporte->update($request->only('subject','body')); 

        //$suporte->update($request->validated()); 

        return redirect()->route('suporte.index');
    }

    public function delete(Suporte $suporte, string| int $id)
    {
        // if(!$suporte = $suporte::find($id)->delete()){
        //     return redirect()->back();
        // }
        
        // if(!$suporte = $suporte::find($id)){
        //     return redirect()->back();
        // }

        $this->service->delete($id);

        return redirect()->route('suporte.index');
    }
}
