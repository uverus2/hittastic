(() => {
    // Song API
    //const artistLocationApi = "http://localhost/hittastic/MusicAPI/public/index.php/api/song/location/";
    const artistLocationApi = "http://localhost/slimFramework/MusicAPI/public/index.php/api/location/all";
    let artistLocationPost = "http://localhost/slimFramework/MusicAPI/public/index.php/api/location/add";


    let data = {
        lat: "",
        long: "",
        typeOfPlace: "",
        description: ""
    };

    const map = L.map("mapPlay");
    const attrib = "Map data copyright OpenStreetMap contributors, Open Database Licence";
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", { attribution: attrib }).addTo(map);
    map.setView([50.90395, -1.40428], 16);
    document.getElementById("mapPlay").style.height = "500px";

    const marker = L.marker([50.90395, -1.40428]).addTo(map);
    marker.bindPopup("Your Locations");

    const postMarketData = (data) => {

        artistLocationPost += `?lat=${data.lat.toString()}&lng=${data.long.toString()}&PlaceType=${data.typeOfPlace}&PlaceDesc=${data.description}`;

        try {
            fetch(artistLocationPost, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(() => {
                document.querySelector(".showMessage").style.display = "show";
                setTimeout(() => {
                    document.querySelector(".showMessage").style.display = "none";
                }, 2000);
            });
        } catch (error) {
            console.error('Error is:', error);
        }
    };

    map.on("click", e => {
        data.lat = e.latlng.lat;
        data.long = e.latlng.lng;
        data.typeOfPlace = prompt("Type of the place(no more than 25 characters)");
        data.description = prompt("Describe the place(no more than 255 characters)");
        postMarketData(data);

    });

    fetch(artistLocationApi).then(response => response.json()).then(response => {
        response.map(i => {
            console.log(i);
            const place = L.marker([i.lat, i.lng]).addTo(map);
            place.bindPopup(`This is ${i.PlaceType}. More Details: ${i.PlaceDesc}`);
        });

    }).catch(err => console.log(err));



    // document.getElementById("submitLocation").addEventListener("click", () => {
    //     const search = document.getElementById("searchLocation").value;
    //     fetch(artistLocationApi + search)
    //         .then(response => response.json())
    //         .then(response => {
    //             let lat = response[0].lat;
    //             let lon = response[0].lon;
    //             createMap("locationResults", Number(lat), Number(lon))
    //         }).catch(e => console.log(e));

    // });
})();