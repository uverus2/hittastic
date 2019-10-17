(function() {

    const songAPIurl = "http://localhost/QuotesAPI/public/index.php/api/quote/";


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


    const fatchSearch = () => {
        const search = document.getElementById("search").value;
        // document.getElementById("results").innerHTML = search;

        fetch(songAPIurl + search)
            .then(response => response.json())
            .then(response => {
                response.map(i => {
                    const values = {
                        id: i["ID"],
                        quote: i["Quote"],
                        author: i["Author"],
                        year: i["Year"]
                    }

                    const resultsArea = document.getElementById("results");
                    const idEl = createElement("h4", values.id, "Quote ID: ");
                    idEl.classList.add("text-center", "py-2");
                    const quoteEl = createElement("p", values.quote, "Quote: ");
                    quoteEl.classList.add("text-center", "py-2");
                    const authorEl = createElement("p", values.author, "Aythor: ");
                    authorEl.classList.add("text-center", "py-2");
                    const yearEl = createElement("p", values.year, "Year: ");
                    yearEl.classList.add("text-center", "py-2");
                    const elemntsArray = [idEl, quoteEl, authorEl, yearEl];
                    appendMultiple(resultsArea, elemntsArray);
                });



            })
            .catch(error => console.log(error));
    }


    document.getElementById("submit").addEventListener("click", fatchSearch);

})();


(function() {

    const songAPIurl = "http://localhost/QuotesAPI/public/index.php/api/quote/";

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