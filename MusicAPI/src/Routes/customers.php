<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);


// Get all songs
$app->get('/api/songs/{limit}', function(Request $request, Response $response) {

    $limit = $request->getAttribute("limit");
    
    $sql = "SELECT * FROM wadsongs LIMIT $limit ";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $songs = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        header('Content-Type: application/json');
        echo json_encode($songs);

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});


// Get all songs
$app->get('/api/all', function(Request $request, Response $response) {
    
    $sql = "SELECT * FROM wadsongs";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $songs = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        header('Content-Type: application/json');
        echo json_encode($songs);

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});

// Get single song
// $app->get('/api/song/{name}', function(Request $request, Response $response) {

//     $name = $request->getAttribute("name");
    
//     $sql = "SELECT * FROM wadsongs WHERE artist='$name' ";
//     try {
//         // Get databse object
//         $db = new db();
//         $db = $db->connect();
//         $stmt = $db->query($sql);
//         $song = $stmt->fetchAll(PDO::FETCH_OBJ);
//         $db = null;
//         header('Content-Type: application/json');
//         echo json_encode($song);

//     }catch(PDOException $e) {
//         echo '{"error":{"text": ' .$e->getMessage(). '}}';
//     }
    
// });

// Get single song
$app->get('/api/song/{name}', function(Request $request, Response $response) {

    $name = $request->getAttribute("name");
    $nameLike = $name."%";
    
    $sql = "SELECT * FROM wadsongs WHERE artist LIKE :names ";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':names', $nameLike );
        $stmt->execute();
        $song = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        header('Content-Type: application/json');
        echo json_encode($song);

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});



// Add a single song
$app->post('/api/song/add', function(Request $request, Response $response) {

    
    $title = $request->getParam("title");
    $artist = $request->getParam("artist");
    $day= $request->getParam("day");
    $month = $request->getParam("month");
    $year = $request->getParam("year");
    $chart = $request->getParam("chart");
    $likes = $request->getParam("likes");
    $downloads = $request->getParam("downloads");
    $genre = $request->getParam("genre");
    $price= $request->getParam("price");
    $quantity = $request->getParam("quantity");


    $sql = "INSERT INTO wadsongs (title, artist, day, month, year, chart, likes, downloads, genre, price, quantity) VALUES ( :title, :artist, :day, :month, :year, :chart, :likes, :downloads, :genre, :price, :quantity )";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':artist',$artist);
        $stmt->bindParam(':day',$day);
        $stmt->bindParam(':month',$month);
        $stmt->bindParam(':year',$year);
        $stmt->bindParam(':chart',$chart);
        $stmt->bindParam(':likes',$likes);
        $stmt->bindParam(':downloads',$downloads);
        $stmt->bindParam(':genre',$genre);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();

        header('Content-Type: application/json');
        echo '{"notice": {"text":"Customer Added"}}';

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});

// update a single song
$app->put('/api/song/update/{id}', function(Request $request, Response $response) {

    $id = $request->getAttribute("id");
    
    $title = $request->getParam("title");
    $artist = $request->getParam("artist");
    $day= $request->getParam("day");
    $month = $request->getParam("month");
    $year = $request->getParam("year");
    $chart = $request->getParam("chart");
    $likes = $request->getParam("likes");
    $downloads = $request->getParam("downloads");
    $genre = $request->getParam("genre");
    $price= $request->getParam("price");
    $quantity = $request->getParam("quantity");


    $sql = "UPDATE wadsongs SET title=:title, artist=:artist, day=:day, month=:month, year=:year, chart=:chart, likes=:likes, downloads=:downloads, genre=:genre, price=:price, quantity=:quantity WHERE ID = :id ";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':artist',$artist);
        $stmt->bindParam(':day',$day);
        $stmt->bindParam(':month',$month);
        $stmt->bindParam(':year',$year);
        $stmt->bindParam(':chart',$chart);
        $stmt->bindParam(':likes',$likes);
        $stmt->bindParam(':downloads',$downloads);
        $stmt->bindParam(':genre',$genre);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':quantity',$quantity);
        $stmt->execute();

        header('Content-Type: application/json');
        echo '{"notice": {"text":"Customer Updated"}}';

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});

// update a single song
$app->put('/api/song/updateLikes/{id}', function(Request $request, Response $response) {

    $id = $request->getAttribute("id");

    $put = $request->getBody()->getContents();
    $likes = intval($put["likes"]);


    $sql = "UPDATE wadsongs SET likes=$likes WHERE ID = :id ";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        header('Content-Type: application/json');
        echo '{"notice": {"text":"Likes Updated"}}';

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});

// update a single song
$app->delete('/api/song/delete/{id}', function(Request $request, Response $response) {

    $id = $request->getAttribute("id");
    
   
    $sql = "DELETE FROM wadsongs WHERE ID = :id ";
    try {
        // Get databse object
        $db = new db();
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        header('Content-Type: application/json');
        echo '{"notice": {"text":"Customer Deleted"}}';

    }catch(PDOException $e) {
        echo '{"error":{"text": ' .$e->getMessage(). '}}';
    }
    
});




