
let div = document.createElement("div")
let text = document.createElement("p")
let agreeBtn = document.createElement("button")
let disagreeBtn = document.createElement("button")

text.textContent = "Wir verwenden Cookies und ähnliche Technologien auf unserer Website und verarbeiten personenbezogene Daten von dir (z.B. IP-Adresse), um z.B. Inhalte und Anzeigen zu personalisieren, Medien von Drittanbietern einzubinden oder Zugriffe auf unsere Website zu analysieren. Die Datenverarbeitung kann auch erst in Folge gesetzter Cookies stattfinden. Wir teilen diese Daten mit Dritten, die wir in den Privatsphäre-Einstellungen benennen."
agreeBtn.textContent = "einverstanden"
disagreeBtn.textContent = "nicht einverstanden"

div.appendChild(text)
div.appendChild(agreeBtn)
div.appendChild(disagreeBtn)

div.style.backgroundColor = "grey"
div.style.width = "400px"
div.style.position = "absolute"
div.style.bottom = "20px"


document.body.appendChild(div)

let cookie = document.cookie
let agreeCheck = cookie.split(";")


agreeCheck.forEach(function (value,index){
    if(value.includes("cookie=true")){
        div.style.display = "none"
    }else if(value.includes("cookie=false")){
        div.style.display = "block"
    }
})

agreeBtn.onclick = function (){
    var now = new Date()
    var time = now.getTime()
    var expireTime = time + 1000*36000
    now.setTime(expireTime)
    document.cookie = 'cookie=true;expires='+ expireTime
    div.style.display = "none"
}

disagreeBtn.onclick = function (){
    var now = new Date()
    var time = now.getTime()
    var expireTime = time + 1000*36000
    now.setTime(expireTime)
    document.cookie = 'cookie=false;expires='+ expireTime
    div.style.display = "none"
}



