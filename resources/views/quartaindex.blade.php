<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   
  


    

  <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    
                    

                    
<a class="btn btn-warning" target="_blank" href="/quarta/create">Загрузить данные из фида в БД</a>

<a class="btn btn-success" target="_blank" href="/quarta/download">
                            Скачать данные из БД в формате Excel</a>
                                                                
                                        
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container mt-4 ">
    <div class="overflow-auto">
<table class="table table-striped">
    <tr>
        <td>id
        <td>available
        <td>url
        <td>price
        <td>oldprice
        <td>currencyid
        <td>category
        <td>sub_category
        <td>sub_sub_category
        <td>picture
        <td>name
        <td>vendor
        
    </tr>
    @forelse ($quarta as $offer)
    <tr>
        <td> {{ $offer->quarta_id }}
        <td>{{ $offer->available }}
        <td>{{ $offer->url }}
        <td>{{ $offer->price }}
        <td>{{ $offer->oldprice }}
        <td>{{ $offer->currencyid }}
        <td>{{ $offer->category }}
        <td>{{ $offer->sub_category }}
        <td>{{ $offer->sub_sub_category }}
        <td>{{ $offer->picture }}
        <td>{{ $offer->name }}
        <td>{{ $offer->vendor }}
    </tr>
    @empty
    <tr>
        <td colspan="12">Список товаров пуст
    </tr>
    @endforelse
    
</table>
</div>
 
<div class="mt-4 mb-5">
{!! $quarta->links('pagination::bootstrap-5') !!}   
</div>
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>