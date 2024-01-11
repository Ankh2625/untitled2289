<?php

namespace App\Http\Controllers;

use App\Models\Quarta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use YMLParser\Driver\XMLReader;
use YMLParser\YMLParser;

use Excel;
use App\Models\ArrayToCollection;
use App\Exports\YMLExport;
use App\Http\Controllers\Redirect;



class QuartaController extends Controller
{
    private function getYMLCatToArr(&$parser){

        $categories = [];
        foreach($parser->getCategories() as $cat){

            $categories[$cat['id']] = [
                'parentid' => $cat['parentid'] ?? '',
                'value' => $cat['value']
            ];
        }

        return $categories;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('quartaindex',['quarta' => Quarta::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getCats($cats, $cat_id){

        $r = [];
        $r[] = $cats[$cat_id]['value'];
        while ($cats[$cat_id]['parentid']) {

            $cat_id = $cats[$cat_id]['parentid'];
            $r[] = $cats[$cat_id]['value'];
        }


        return array_reverse($r);
    }


    public function create()
    {
        //
        #загружаем xml
        $url = 'https://quarta-hunt.ru/bitrix/catalog_export/export_Ngq.xml';
        $parser = new YMLParser(new XMLReader);
        $parser->open($url);


        #получаем категории
        $cats = $this->getYMLCatToArr($parser);

        Quarta::truncate();

        foreach($parser->getOffers() as $offer) {

            $offer_cats = ($this->getCats($cats,$offer['categoryid']));
            Quarta::create([
                'quarta_id' => $offer['id'],
                'available'=>$offer['available'],
                'url' => $offer['url'],
                'price' => $offer['price'],
                'oldprice' => $offer['oldprice'] ?? '',
                'currencyid' => $offer['currencyid'],
                'category' => $offer_cats[0] ?? '',
                'sub_category' => $offer_cats[1] ?? '',
                'sub_sub_category' => $offer_cats[2] ?? '',
                'picture' => $offer['picture'] ?? '',
                'name' => $offer['name'],
                'vendor' => $offer['vendor'],

            ]);


        }



        return redirect('/quarta');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return Excel::download(new YMLExport, 'quarta.xlsx');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quarta $quarta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quarta $quarta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quarta $quarta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quarta $quarta)
    {
        Quarta::truncate();
        return redirect('/quarta');
    }
}
