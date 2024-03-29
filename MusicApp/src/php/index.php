<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HitTastic</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,400" rel="stylesheet">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">  
</head>
<body>

  <div class="container py-2">
      <div class="row">
          <div class="col-12 text-right">
             <a href="mapPlay.html" rel="noopener noreferrer"> <h3>Ajax-Map</h3> </a>
          </div>
      </div>
  </div>

    <div class="container py-2">
        <div class="row">
            <div class="col-12 text-center" >
                <h3>HitTastic look into our database below to look at our quotes and Songs</h3>
            </div>
        </div>
    </div>

    <div class="container py-2">
        <div class="row">
            <div class="col-12 text-center" >
                <h3>Using Ajax - Find quotes</h3>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <label for="">Search in Our Database</label>
            </div>
            <div class="col-12 text-center py-2">
                <input type="text" id="searchAjax">
            </div>
            <div class="col-12 text-center py-2">
                <button id="submitAjax" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12" id="resultsAjax">
            
            </div>
        </div>
    </div>


    <div class="container py-2">
            <div class="row">
                <div class="col-12 text-center" >
                    <h3>Using Fetch API - Find songs</h3>
                </div>
            </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <label for="">Search in Our Database</label>
            </div>
            <div class="col-12 text-center py-2">
                <input type="text" id="search">
            </div>
            <div class="col-12 text-center py-2">
                <button id="submit" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12" id="results">
            
            </div>
        </div>
    </div>


    <div class="container py-2">
            <div class="row">
                <div class="col-12 text-center" >
                    <h3>Using Fetch API - Find Artist Location</h3>
                </div>
            </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-12 text-center">
                <label for="">Search in Our Database</label>
            </div>
            <div class="col-12 text-center py-2">
                <input type="text" id="searchLocation">
            </div>
            <div class="col-12 text-center py-2">
                <button id="submitLocation" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12" id="locationResults">
            
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"> </script>
    <script src="../js/app.js"></script>
</body>
</html>