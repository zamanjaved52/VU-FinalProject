<?php

namespace App\Http\Controllers\Admin;

use App\Budget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budget = Budget::latest()->paginate(5);

        return view('budget.index',compact('budget'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budget.create');

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
            'budget' => 'required',
            'saving' => 'required',
        ]);

        $old_budget = Budget::query()->select('budget')->first();
        $old_saving = Budget::query()->select('saving')->first();
        $new_budget = $request->budget;
        $new_saving = $request->saving;
        $current_budget =  $old_budget->budget + $new_budget;
        $current_saving = $old_saving->saving + $new_saving;

        Budget::query()->updateOrCreate(
            [
                'user_id' => \auth()->id()
            ],
            [
                'budget' => $current_budget,
                'saving' => $current_saving,
            ]);

        return redirect()->to('admin/budget')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        return view('budget.show',compact('budget'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget, $id)
    {
        $budget=Budget::findOrFail($id);
        return view('budget.edit',compact('budget'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budget $budget)
    {
        $request->validate([
            'budget' => 'required',
            'saving' => 'required',
        ]);


        $budget->update([

            'user_id'=> Auth::id(),
            'budget'=> $request->budget,
            'saving'=> $request->saving,
        ]);
        return redirect()->to('admin/budget')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $budget=Budget::findOrfail($id);
        $budget->delete();

        return redirect()->to('admin/budget')
            ->with('success','Product deleted successfully');
    }
}
