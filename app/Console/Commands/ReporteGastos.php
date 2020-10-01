<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Gasto;
use App\Models\GastosReport;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ReporteDiarioGastos;

class ReporteGastos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reporte:gastos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generación del reporte diario de tus gastos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usuarios = User::all();
        $jsonGastos = [];
        $total_gastos = 0;
        $total_necesario = 0;
        $total_innecesario = 0;
        $user_id;

        foreach($usuarios as $usuario) {
            $gastos = Gasto::where('user_id', $usuario->id)
                            ->whereDate('created_at', Carbon::now())
                            ->get();

            $total_gastos = $gastos->sum('cantidad');

            $total_necesario = Gasto::where('necesario', 'NECESARIO')
                                ->whereDate('created_at', Carbon::now())
                                ->sum('cantidad');

            $total_innecesario = Gasto::where('necesario','INNECESARIO')
                                ->whereDate('created_at', Carbon::now())
                                ->sum('cantidad');


            $user_id = $usuario->id;

            foreach( $gastos as $gasto ) {
                array_push($jsonGastos, ['id' => $gasto->id]);
            }

            $jsonGastos = json_encode($jsonGastos);

            GastosReport::create([
                'gastos_id' => $jsonGastos,
                'total_gastos'  => $total_gastos,
                'total_necesario'   => $total_necesario,
                'total_innecesario'   => $total_innecesario,
                'user_id'   => $user_id
            ]);

            Mail::to('vic.bravo4401@gmail.com')->send( new ReporteDiarioGastos($total_gastos, $total_innecesario, $total_necesario, $usuario->name) );
        }
    }
}
