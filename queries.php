<?php
use Illuminate\Support\Facades\DB;
DB::table('example')->select()->get();
DB::table('example')->insert(['key' => 'value','key' => 'value','key' => 'value']);
DB::table('example')->update('id','5')->where('id',5)->get();
DB::table('example')->update('id','5')->get();
DB::table('example')->count();
DB::table('example')->sum('amount');
DB::table('example')->where('address','karachi')->get();
DB::table('example')->where('address','karachi')->delete();
DB::table('example')->join('table2','table1.foreignkey','=','table2.primarykey')->select('table1.*','table2.*')->get();
DB::table('example')->join('table2','table1.foreignkey','=','table2.primarykey')->where('','')->select('table1.column','table2.column')->get();
?>
