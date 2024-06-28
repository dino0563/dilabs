<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.home', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
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
            'nama' => 'required|max:250',
            'gambar' => 'required|max:250',
            'lokasi' => 'required|max:250',
            'tanggalProyek' => 'required|date',
            'client' => 'nullable|max:250',
            'deskripsi' => 'required|max:250',
        ]);

        Portfolio::create($request->all());

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($portfolio_id)
    {
        return view('portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'nama' => 'required|max:250',
            'gambar' => 'required|max:250',
            'lokasi' => 'required|max:250',
            'tanggalProyek' => 'required|date',
            'client' => 'nullable|max:250',
            'deskripsi' => 'required|max:250',
        ]);

        $portfolio->update($request->all());

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($portfolio_id){

        $portfolios=Student::findOrFail($portfolio_id);

        if($portfolios){
            $destination ='uploads/students/'.$portfolios->stu_image;
            if(File::exists($destination)){
                 File::delete($destination);
            }
            $portfolios->delete();
            return redirect(route('student.index'))->with('status','Student Deleted Successfully');
        }
        else{
            return redirect(route('student.index'))->with('status','Student ID Not Found');
        }
      }
}
