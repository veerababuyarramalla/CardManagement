<?php

namespace App\Http\Controllers;

use App\CardDetails;
use Illuminate\Http\Request;

class CardDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CardDetails::latest()->paginate(5);
        return view('index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'person_name'    =>  'required',
            'designation'     =>  'required',
            'image'         =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'person_name'       =>   $request->person_name,
            'designation'        =>   $request->designation,
            'business_name'       =>   $request->business_name,
            'short_description'        =>   $request->short_description,
            'whatsapp_number'       =>   $request->whatsapp_number,
            'contacts'        =>   $request->contacts,
            'single_address'       =>   $request->single_address,
            'image'            =>   $new_name
        );

        CardDetails::create($form_data);

        return redirect('card')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CardDetails::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CardDetails::findOrFail($id);
        return view('edit', compact('data'));
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
        if ($image != '') {
            $request->validate([
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([]);
        }

        $form_data = array(
            'person_name'       =>   $request->person_name,
            'designation'        =>   $request->designation,
            'business_name'       =>   $request->business_name,
            'short_description'        =>   $request->short_description,
            'whatsapp_number'       =>   $request->whatsapp_number,
            'contacts'        =>   $request->contacts,
            'single_address'       =>   $request->single_address,
        );

        CardDetails::whereId($id)->update($form_data);

        return redirect('card')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CardDetails::findOrFail($id);
        $data->delete();

        return redirect('card')->with('success', 'Data is successfully deleted');
    }
}
