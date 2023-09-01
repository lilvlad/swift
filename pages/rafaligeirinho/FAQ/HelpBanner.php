<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
     .Container {
    display: flex;
    justify-content: center;
    text-align: center;
    padding-top: 50px;
    background-color:rgb(243, 244, 245);    
    background-image: url("mapa.png");
    background-repeat: no-repeat;
    background-size: cover;
}

.container-main {
    width: 1300px;
    background-color: rgb(243, 244, 245);
    padding: 10px;
    margin: 0 auto;
}



.help h2 {
    margin-bottom: 0.5em;
    padding: 0px;
}

.help h1 {
    margin-bottom: 1em;
    padding: 0%;
    color: #2FB383;
}

.search-container {
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
}

.search-container .search-input {
    height: 50px;
    width: 500px;
    padding: 10px 10px 10px 40px;
    border: none;
    border-radius: 20px;
    background-color: #ffffff;
    font-size: 16px;
    font-weight: 400;
    color: #232323;
}

.search-container i {
    position: absolute;
    left: 0.7rem;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: #aaa;
}

.search-container .search-input:focus + i {
    color: #000;
}   
    </style>
        <div class="Container">
        <div class="help">
            <h2>Ajuda</h2>
            <h1>Como podemos ajudar?</h1>
                <div class="search-container">
                    <input class="search-input" type="text" placeholder="Pesquise nos artigos de ajuda">
                    <i class="fas fa-search"></i>
                </div>          
        </div>
        </div>
</body>
</html>