<?php

/* 
*  php artisan make:observer --model=Model\Plan
*  Vamos deixar automatico o processo de criar a url tanto no editar quanto no criar
*  Ele fica observando todas as movimentações do eloquent e conseguimos aplicar ações a partir daquilo
*  Conseguimos fazer isso antes de criar um plano, antes de cadastrar e fazer qualquer operação depois 
*  Passamos a opção --model e expecificamos qual model esse observer está relacionado
*  É necessário importar a model dentro de Providers/AppServiceProvider.php
*/

namespace App\Observers;

use App\Models\Plan;
use illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Model\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Model\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
}
