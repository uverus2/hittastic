const createElement = (el, value, optional) => {
    let createdEl = document.createElement(el);
    if (optional != undefined) {
        createdEl.innerHTML = optional + value;
    } else {
        createdEl.innerHTML = value;
    }
    return createdEl
}

const appendMultiple = (el, array) => {
    array.map(i => {
        el.append(i);
    })
}

(function() {

    const songAPIurl = "http://localhost/slimFramework/MusicAPI/public/index.php/api/song/";
    const songLikeUpdateUrl = "http://localhost/slimFramework/MusicAPI/public/index.php/api/song/updateLikes/";

    const resultsArea = document.getElementById("results");
    const fatchSearch = () => {
        const search = document.getElementById("search").value;
        // document.getElementById("results").innerHTML = search;

        fetch(songAPIurl + search)
            .then(response => response.json())
            .then(response => {
                response.map(i => {
                    const values = {
                        id: i["ID"],
                        quote: i["title"],
                        author: i["artist"],
                        year: i["year"],
                        genre: i["genre"],
                        downloads: i["downloads"],
                        likes: i["likes"]
                    }

                    const idEl = createElement("h4", values.id, "Song ID: ");
                    const quoteEl = createElement("p", values.quote, "Song Title: ");
                    const authorEl = createElement("p", values.author, "Artist: ");
                    const yearEl = createElement("p", values.year, "Year: ");
                    const genreEl = createElement("p", values.genre, "Genre: ");
                    const downloadsEl = createElement("button", values.downloads, "Download ");
                    downloadsEl.classList.add("py-2", "downloadThis", "mx-2");
                    const likesEl = createElement("button", values.likes, "Like ");
                    likesEl.classList.add("py-2", "likeThis", "mx-2");
                    const containingDiv = document.createElement("div");
                    containingDiv.classList.add("result", "text-center", "py-3");
                    const elemntsArray = [idEl, quoteEl, authorEl, yearEl, genreEl, downloadsEl, likesEl];
                    appendMultiple(containingDiv, elemntsArray);
                    resultsArea.append(containingDiv);
                });



            })
            .catch(error => console.log(error));

        Array.from(resultsArea.querySelectorAll(".result")).map(i => {
            i.remove();
        });

    };


    document.getElementById("search").addEventListener("keyup", fatchSearch);

    document.addEventListener("click", event => {
        if (!event.target.matches('.likeThis')) return;
        const clickedOn = event.target;
        const likeValue = event.target.innerText.split(" ")[1];
        const elementID = clickedOn.parentElement.querySelector("h4").innerText.split(":")[1].trim();
        console.log(Number(likeValue) + 1);
        console.log(typeof Number(likeValue));
        fetch(songLikeUpdateUrl + elementID, {
                method: 'PUT',
                body: Number(likeValue) + 1,
                headers: { 'Content-Type': 'application/json' }
            })
            .then(() => {
                event.target.innerText = "Liked " + (Number(likeValue) + 1);
                event.target.disabled = true;
            });
    }, false);

})();


(function() {

    const songAPIurl = "http://localhost/QuotesAPI/public/index.php/api/quote/";

    const ajaxSearch = () => {
        const search = document.getElementById("searchAjax").value;

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = (e) => {

            if (e.target.readyState == 4 && e.target.status == 200) {

                const obj = JSON.parse(e.target.responseText);

                //document.getElementById("resultsAjax").innerHTML = 
                obj.map(i => {
                    const values = {
                        id: i["ID"],
                        quote: i["Quote"],
                        author: i["Author"],
                        year: i["Year"]
                    }

                    const resultsArea = document.getElementById("resultsAjax");
                    const idEl = createElement("h4", values.id, "Quote ID: ");
                    idEl.classList.add("text-center", "py-2");
                    const quoteEl = createElement("p", values.quote, "Quote: ");
                    quoteEl.classList.add("text-center", "py-2");
                    const authorEl = createElement("p", values.author, "Aythor: ");
                    authorEl.classList.add("text-center", "py-2");
                    const yearEl = createElement("p", values.year, "Year: ");
                    yearEl.classList.add("text-center", "py-2");
                    const elemntsArray = [idEl, quoteEl, authorEl, yearEl];
                    console.log(elemntsArray);
                    appendMultiple(resultsArea, elemntsArray);
                });



            } else if (e.target.status == 404) {
                document.getElementById("resultsAjax").innerHTML = "Quote does not exist or there is a error with the server";
            }
        }


        xhr.open("GET", songAPIurl + search, true);
        xhr.send();


    }


    document.getElementById("submitAjax").addEventListener("click", ajaxSearch);

})();