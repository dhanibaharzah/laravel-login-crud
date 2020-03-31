<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::latest()->paginate(5);
        return view('item.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string',
            'stok'  => 'required|integer',
            'harga' => 'required|integer',
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama'             =>   $request->nama,
            'stok'             =>   $request->stok,
            'harga'            =>   $request->harga,
            'image'            =>   $new_name
        );

        Item::create($form_data);

        return redirect('item')->with('success', 'Data Added successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Item::findOrFail($id);
        return view('item.edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'nama'  => 'required|string',
                'stok'  => 'required|integer',
                'harga' => 'required|integer',
                'image' => 'required|image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'nama'  => 'required|string',
                'stok'  => 'required|integer',
                'harga' => 'required|integer',
            ]);
        }

        $form_data = array(
            
            'nama'             =>   $request->nama,
            'stok'             =>   $request->stok,
            'harga'            =>   $request->harga,
            'image'            =>   $image_name
        );
  
        Item::whereId($id)->update($form_data);

        return redirect('item')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Item::findOrFail($id);
        $data->delete();

        return redirect('item')->with('success', 'Data is successfully deleted');
    }
}