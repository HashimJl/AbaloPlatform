const data = {
    'produkte': [
        { name: 'Ritterburg', preis: 59.99, kategorie: 1, anzahl: 3 },
        { name: 'Gartenschlau 10m', preis: 6.50, kategorie: 2, anzahl: 5 },
        { name: 'Robomaster' ,preis: 199.99, kategorie: 1, anzahl: 2 },
        { name: 'Pool 250x400', preis: 250, kategorie: 2, anzahl: 8 },
        { name: 'Rasenmähroboter', preis: 380.95, kategorie: 2, anzahl: 4 },
        { name: 'Prinzessinnenschloss', preis: 59.99, kategorie: 1, anzahl: 5 }
    ],
    'kategorien': [
        { id: 1, name: 'Spielzeug' },
        { id: 2, name: 'Garten' }
    ]
};
//zugriff = myData.produkte[0].preis;

function getMaxPreis(myData) {
    let max = 0;
    let name = "";
    for (let i=0;i<myData.produkte.length;i++) {
        if (myData.produkte[i]["preis"] > max) {
            max = myData.produkte[i]["preis"];
            name = myData.produkte[i]["name"];
        }
    }
    return name;
}
function getMinPreisProdukt(data) {
    let min = 1000;
    let resultObj;
    for (let i=0;i<data.produkte.length;i++) {
        if (data.produkte[i]["preis"] < min) {
            min = data.produkte[i]["preis"];
            resultObj = data.produkte[i];
        }
    }
    return resultObj;
}
function getPreisSum(data) {
    let result = 0;
    for(let i=0;i<data.produkte.length;i++) {
        result += data.produkte[i]["preis"];
    }
    return result;
}
function getGeamtWert(data) {
    let result = 0;
    for(let i=0;i<data.produkte.length;i++) {
        result += data.produkte[i]["preis"] * data.produkte[i]["anzahl"];
    }
    return result;
}
function getAnzahlProdukteOfKategorie(data,catName) {
    let catID = 0;
    let result = 0;
    if(catName == "Spielzeug") {
        catID = data.kategorien[0].id;
    }
    if(catName == "Garten") {
        catID = data.kategorien[1].id;
    }

    for (let i=0; i<data.produkte.length; i++) {
        if (data.produkte[i].kategorie == catID) {
            result += data.produkte[i].anzahl;
        }
    }
    return result;
}

console.log(getAnzahlProdukteOfKategorie(data,"Garten"))
