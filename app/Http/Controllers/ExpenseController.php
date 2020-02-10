<?php

namespace App\Http\Controllers;

use App\Account;
use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request)){
            DB::table('expenses')
                ->where('id', $request->id)
                ->update(
                    ['status' => $request->status]
                );
        }
        $expenses = Expense::with('expenseCategory')->with('Account')->paginate(10);

        return view('expenses.index')->with([
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseCategories = ExpenseCategory::all();
        $accounts = Account::all();

        return view('expenses.create')->with([
            'expenseCategories' => $expenseCategories,
            'accounts' => $accounts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Expense $expense)
    {
        $expense->create($request->all());

        return redirect()->route('expenses.index')->withStatus(__('Expense successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $expenseCategories = ExpenseCategory::all();
        $accounts = Account::all();

        return view('expenses.edit')->with([
            'expense' => $expense,
            'expenseCategories' => $expenseCategories,
            'accounts' => $accounts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update($request->all());

        return redirect()->route('expenses.index')->withStatus(__('Expense successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->withStatus(__('Expense successfully deleted.'));
    }
}
