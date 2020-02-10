<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'datetime_added', 'expense_category_id', 'account_id', 'details', 'amount', 'added_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    public function expenseCategory(){
        return $this->hasOne('App\ExpenseCategory', 'id', 'expense_category_id');
    }

    public function Account(){
        return $this->hasOne('App\Account', 'id', 'account_id');
    }

}
