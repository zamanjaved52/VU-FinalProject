<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = Expense::latest()->paginate(5);

        return view('expense.index',compact('expense'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'category' => 'required',
//        ]);

        $budget = Budget::query()->select('budget')->first();
        $get_budget = $budget->budget;
        $expense = Expense::query()->select('price')->first();
        $get_expense = $expense->price;
        $current_budget = $get_budget - $get_expense;

        Expense::create($request->all());

        Budget::update([
        'budget' =>   $current_budget
        ]);
        return redirect()->to('admin/expense')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expense.show',compact('expense'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense, $id)
    {
        $expense=Expense::findOrFail($id);
        return view('expense.edit',compact('expense'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
//        $request->validate([
//            'name' => 'required',
//        ]);


        Expense::create($request->all());

        return redirect()->to('admin/expense')
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
        $expense=Expense::findOrfail($id);
        $expense->delete();

        return redirect()->to('admin/expense')
            ->with('success','Product deleted successfully');
    }
}
