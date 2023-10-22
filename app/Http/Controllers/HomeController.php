<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Jenssegers\Date\Date;
use Carbon\Carbon;
use PDF;
use App\Models\User;
use App\Models\Empleado;

use App\Models\EncabezadoPlanilla;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        $empleados = Empleado::count();

        $EncabezadoPlanilla = EncabezadoPlanilla::count();
        $users = User::count();
        $empresas = User::count();
        $user_ultimos = User::latest()
                        ->take(2)
                         ->get();

            $empleadosregistrados = Empleado::latest()
            ->take(2)
            ->get();
        //Fecha aqui se declara la fecha del sistema
        $dt        = Carbon::now();
        $todayDate = $dt->formatLocalized("%A %d %B %Y");
        return view('dashboard.dashboard',compact('todayDate', 'empleados','users','user_ultimos','EncabezadoPlanilla','empresas','empleadosregistrados'));
    }


    // Vista del empleado
    public function emDashboard()
    {
        //Fecha aqui se declara la fecha del sistema
        $dt        = Carbon::now();
        $todayDate = $dt->formatLocalized("%A %d %B %Y");
        return view('dashboard.emdashboard',compact('todayDate'));
    }

    public function generatePDF(Request $request)
    {
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        // $pdf = PDF::loadView('payroll.salaryview', $data);
        // return $pdf->download('text.pdf');
        // selecting PDF view
        $pdf = PDF::loadView('payroll.salaryview');
        // download pdf file
        return $pdf->download('pdfview.pdf');
    }
}
