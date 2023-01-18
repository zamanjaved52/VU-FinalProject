<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Expense;
use Illuminate\Database\Eloquent\Model;
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

        return view('expense.index', compact('expense'))
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'category' => 'required',
//        ]);

        /*Expense::create($request->all());*/
        $expense = new Expense();
        $expense->category_id = $request->category_id;
        $expense->name = $request->name;
        $expense->price = $request->price;
        $expense->save();

        $budget = Budget::query()->select('budget')->first();
        $get_budget = $budget->budget;
        $expense = Expense::query()->select('price')->first();
        $get_expense = $expense->price;
        $current_budget = $get_budget - $get_expense;

        Budget::query()->updateOrCreate(
            [
                'user_id' => Auth::id()
            ],
            [
                'budget' => $current_budget
            ]);

        return redirect()->to('admin/expense')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        return view('expense.show', compact('expense'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense, $id)
    {
        $expense = Expense::findOrFail($id);
        return view('expense.edit', compact('expense'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
//        $request->validate([
//            'name' => 'required',
//        ]);


        Expense::create($request->all());

        return redirect()->to('admin/expense')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrfail($id);
        $expense->delete();

        return redirect()->to('admin/expense')
            ->with('success', 'Product deleted successfully');
    }

    public function expenseStatus()
    {
        $allExpenses = Expense::query();
         $expenses =   $allExpenses->get()->groupBy('category.category');

         $expenses =$expenses->map(function ( $cat){
             return array_sum($cat->pluck('price')->toArray());
         });
         $totalExpense = array_sum($expenses->toArray());


        return view('expense/expense_status',compact('expenses','totalExpense'));
    }
    public function savingStatus()
    {
       /* $allExpenses = Expense::query();
        $expenses =   $allExpenses->get()->groupBy('budget.saving');

        $expenses =$expenses->map(function ( $cat){
            return array_sum($cat->pluck('price')->toArray());
        });
        $totalExpense = array_sum($expenses->toArray());

        $saving = $allExpenses->select('saving')->first();
        $budget = $allExpenses->select('budget')->first();
        $desired_saving = $saving->toArray();
        $desiredSaving = (int)$desired_saving['saving'];

        $budgets = $budget->toArray();
        $oldBudget = (int)$budgets['budget'];

        $currentSaving =  - $oldBudget-$totalExpense;*/


        $allExpenses = Expense::query();
        $expenses =   $allExpenses->get()->groupBy('category.category');

        $expenses =$expenses->map(function ( $cat){
            return array_sum($cat->pluck('price')->toArray());
        });
        $totalExpense = array_sum($expenses->toArray());



        $saving_calculation = Budget::query();
        $saving = $saving_calculation->select('saving')->first();
        $budget = $saving_calculation->select('budget')->first();

        $desired_saving = $saving->toArray();
        $desiredSaving = (int)$desired_saving['saving'];

        $budgets = $budget->toArray();
        $oldBudget = (int)$budgets['budget'];

        $currentSaving =  $oldBudget-$totalExpense;

        $allSaving = [
            'Current Saving' => $currentSaving,
            'Desired Saving' => $desiredSaving
        ];


        return view('expense/saving_status',compact('allSaving','desiredSaving','currentSaving'));

//        return view('expense/saving_status');
    }
}

