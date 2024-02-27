<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    /**
     * Affiche les statistiques sur les inscriptions.
     *
     * Cette méthode récupère diverses statistiques à partir de la base de données
     * telles que le nombre total d'inscriptions, le nombre d'inscriptions de course,
     * le nombre d'inscriptions de marche, le nombre total d'étudiants, le nombre total
     * d'épreuves, le pourcentage d'abstention et les pourcentages de participation
     * à la course et à la marche.
     *
     * @return Factory|View
     */
    public function index()
    {
        $totalInscrs = DB::table('inscrs')->select(DB::raw('count(*) as total'))->first()->total;
        $totalRun = DB::table('inscrs')->select(DB::raw('count(*) as total'))->where('rw', 'R')->first()->total;
        $totalWalk = DB::table('inscrs')->select(DB::raw('count(*) as total'))->where('rw', 'W')->first()->total;
        $totalStudent = DB::table('etuds')->select(DB::raw('count(*) as total'))->first()->total;
        $totalEpreuve = DB::table('eprs')->select(DB::raw('count(*) as total'))->first()->total;
        $maxInscrs = $totalStudent * $totalEpreuve;

        try {
            $percentAbstention = round((($maxInscrs - $totalInscrs) / $maxInscrs) * 100,2);
        } catch (\DivisionByZeroError) {
            $percentAbstention = 0;
        }

        try {
            $percentRun = ($totalRun / $totalInscrs) * 100;
        } catch (\DivisionByZeroError) {
            $percentRun = 0;
        }

        try {
            $percentWalk = ($totalWalk / $totalInscrs) * 100;
        } catch (\DivisionByZeroError) {
            $percentWalk = 0;
        }

        return view('Welcome', [
            'totalInscrs' => $totalInscrs,
            'percentRun' => $percentRun,
            'percentWalk' => $percentWalk,
            'percentAbstention' => $percentAbstention
        ]);
    }
}
