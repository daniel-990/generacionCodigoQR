<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div id="qrcode"></div>
        <!--codigoQR-->
        <!--minificado-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <!--codigoQR-->
        
        <div id="qrcode"></div>
        <hr>
        <div>
            <input type="text" id="valorQr">
            <br>
            <select name="" id="color">
                <option value="red">Rojito</option>
                <option value="black">Negrito</option>
                <option value="#ccc">Gris</option>
                <option value="green">Verdes</option>
            </select>
            <br>
            <button id="btn">Enviar</button>
        </div>

        <script type="text/javascript">
            const btn = document.getElementById("btn");
            const color = document.getElementById("color");
            const inputQr = document.getElementById("valorQr");
            const tamano = 50;

            const generarCodigo = () => {

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'https://randomuser.me/api/');
                xhr.responseType = 'json';
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const data = xhr;
                        //console.log(xhr);
                        console.log(data.response.results[0].email);

                        let options_object = {
                            text: inputQr.value = data.response.results[0].email,
                            width:  tamano,
                            height: tamano,
                            colorDark : color.value,
                            colorLight : "white",
                            correctLevel : QRCode.CorrectLevel.H, // L, M, Q, H
                        };
                        
                        //QR
                        const qrcode = new QRCode(document.getElementById("qrcode"), options_object);
                        console.log(options_object);
                    }
                    else {
                        console.log('Error');
                    }
                };
                xhr.send();
            }
            btn.addEventListener('click',generarCodigo);

        </script>
</body>
</html>