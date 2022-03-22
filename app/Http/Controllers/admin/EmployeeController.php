<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeePayment;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{

    $employee = User::leftJoin('employees','users.id','employees.customer_id')->where('employees.is_active',0)->get();
    return view('admin.employee',compact('employee'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    $users = User::all();
    return view('admin.employee_create',compact('users'));
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
        'customer_id' =>'required|unique:employees',
        'designation' => 'required|max:200',
        'phone' => 'required',
        'salary' =>'required',
        'address' =>'required',
        ]);

            $addpack = Employee::insert([
            'customer_id'=>$request->input('customer_id'),
            'designation'=>$request->input('designation'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'salary'=>$request->input('salary'),

        ]);

        if ($addpack) {

            return redirect('/admin/employee')->with('success','inserted');
                    }

        else{
        return back()->with('fail','Something Went wrong Try Again!');
        }

}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\Employee  $employee
 * @return \Illuminate\Http\Response
 */
public function show(Employee $employee)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Employee  $employee
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $employee = User::leftJoin('employees','users.id','employees.customer_id')->where('employees.id',$id)->first();

    return view('admin.employee_edit',compact('employee'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Employee  $employee
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $updateproduct = Employee::where('id', $id)->update([
            'designation'=>$request->input('designation'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'salary'=>$request->input('salary'),
        ]);

            if ($updateproduct) {

            return redirect('/admin/employee')->with('success','inserted');
                }
            else{
            return back()->with('fail','Something Went wrong Try Again!');
            }
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Employee  $employee
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
    {
        $updateproduct = Employee::where('id', $id)->update([
            'is_active'=>1
            ]);
                if ($updateproduct) {
                return redirect('/admin/employee')->with('success','inserted');
                }
                else{
                return back()->with('fail','Something Went wrong Try Again!');
                }
    }
    public function pay($id){
        $employee = User::leftJoin('employees','users.id','employees.customer_id')->where('employees.id',$id)->first();
        return view('admin.payment',compact('employee'));
    }
    public function payment(Request $request)
    {
                $addpack = EmployeePayment::insert([
                'employee_id'=>$request->input('employee_id'),
                'paid_balance'=>$request->input('paid_balance'),
                'month'=>$request->input('month'),
                'year'=>$request->input('year')

            ]);

            if ($addpack) {

                return redirect('/admin/employee')->with('success','inserted');
                        }

            else{
            return back()->with('fail','Something Went wrong Try Again!');
            }
    }

    public function salaryList(Request $request)
    {
        if (empty($request->query('month'))&& empty($request->query('year'))) {
           $salary_sheet = Employee::leftJoin('employee_payments','employees.id','employee_payments.employee_id')->leftJoin('users','employees.customer_id','users.id')->get();

        }else {

            $month = $request->query('month');
            $year  =$request->query('year');
            $salary_sheet = Employee::leftJoin('employee_payments','employees.id','employee_payments.employee_id')->leftJoin('users','employees.customer_id','users.id')->where('employee_payments.month',$month)->where('employee_payments.year',$year)->get();

        }
        return view('admin.salary',compact('salary_sheet'));
    }




}
