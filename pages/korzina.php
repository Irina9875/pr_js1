<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/glavnaii/лого.svg" type="image/x-icon">
    <title>NUDE</title>
</head>

<body>
    <!-- НАЧАЛО КОРЗИНЫ  -->
    <div class="korzina content">
        <h2 class="rp">Корзина</h2>
        <div class="korzina_glav">
            <div class="img_kart_korz">
                <div class="tovar_korzina">
                    <div class="img_korzina">
                        <img src="assets/img/katalog/kat.png" alt="">
                    </div>
                    <div class="info_div_korz">
                        <h3>Крем для лица</h3>
                       
                        <p>1 899 ₽</p>
                        <div class="counter">
                            <button id="decrement-btn">-</button>
                            <div id="counter-value">0</div>
                            <button id="increment-btn">+</button>
                        </div>
                    </div>
                </div>
                <div class="tovar_korzina">
                    <div class="img_korzina">
                        <img src="assets/img/katalog/kat.png" alt="">
                    </div>
                    <div class="info_div_korz">
                        <h3>Крем для лица</h3>
                        <p>1 899 ₽</p>
                        <div class="counter">
                            <button id="decrement-btn">-</button>
                            <div id="counter-value">0</div>
                            <button id="increment-btn">+</button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="zakaz_korzina">
                <p class="itog">Итог заказа</p>
                <div class="dostavka_korz">
                    <h4>Доставка курьером</h4>
                    <p>БЕСПЛАТНО</p>
                </div>

                <div class="promokod_korzina">
                    <input class="promokod" type="text" placeholder="ПРОМОКОД">
                    <div class="tova_prise">
                        <h4>Товар на сумму</h4>
                        <p>3 499 ₽</p>
                    </div>
                </div>
                <div class="btn_button_korzina">
                    <a href="">ЗАКАЗАТЬ</a>
                </div>
            </div>
        </div>
    </div>
    <!-- КОНЕЦ КОРЗИНЫ  -->


    <script> 
        let counter = 0; 
 
        const counterValue = document.getElementById('counter-value'); 
        const incrementBtn = document.getElementById('increment-btn'); 
        const decrementBtn = document.getElementById('decrement-btn'); 
 
        // To increment the value of counter 
        incrementBtn.addEventListener('click', () => { 
            counter++; 
            counterValue.innerHTML = counter; 
        }); 
 
        // To decrement the value of counter 
        decrementBtn.addEventListener('click', () => { 
            if(counter == 0){ 
 
            } 
            else { 
                counter--; 
                counterValue.innerHTML = counter; 
            } 
        }); 
         
    </script>
</body>

</html>