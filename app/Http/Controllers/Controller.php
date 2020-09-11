<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use App\Services\ChangeService;
use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, MetApi;
    /**
     * Display our routes
     *
     * @return string
     */
    public function routes()
    {
        Artisan::call('route:list');
        $routes = explode("\n", Artisan::output());
        foreach ($routes as $index=>$route) {
            if (strpos($route, 'debugbar') !== false) {
                unset($routes[$index]);
            }
        }
        return '<pre>'.implode("\n", $routes).'</pre>';
    }

    public function change(Request $request)
    {
        $this
            ->option('price', 'required|integer')
            ->option('wallet', 'required|integer')
            ->verify();

        if ((int) $this->request->wallet < (int) $this->request->price) {
            return $this->error('change.insufficient');
        }

        $change = (new ChangeService((int) $request->price))
            ->change((int) $request->wallet);

        return $this->render(['change' => $change]);
    }

}
