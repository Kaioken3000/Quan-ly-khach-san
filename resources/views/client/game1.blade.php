<div class="container">
    <div>
        <h4 id="diemtichluy">Điểm tích luỹ: {{ Auth::user()->khachhangs[0]->diem }}</h4>
        <h4 id="luot"></h4>
        <select id="luotoption">
            <option value="1">1 lượt</option>
            <option value="5">5 lượt</option>
            <option value="10">10 lượt</option>
        </select>
        <button id="muabutton">Mua lượt chơi</button>
    </div>
    <header class="title">
        {{-- <h2>Rắn săn mồi</h2> --}}
        <h3 id="score">Điểm: </h3>
    </header>
</div>

<div class="container">
    <section class="overlay">
        <div class="gameOverGrid">
            <h3 id="gameOver">Bạn thua!</h3>
        </div>
        <button class="gameOverGrid btn">Chơi</button>
    </section>
    <section id="gameBoard"></section>
</div>
<style>
    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }

    /* HTML5 display-role reset for older browsers */
    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    body {
        line-height: 1;
        background: -webkit-linear-gradient(top, #7fc5c9, #deabbe);
    }

    ol,
    ul {
        list-style: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    /* Grid */

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .container {
        margin: 0 auto;
        padding: 0 25px;
        text-align: center;
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 25%;
        height: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 5%;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
    }

    .title {
        margin-bottom: 15px;
    }

    #gameBoard,
    .row {
        display: flex;
        flex-flow: row wrap;
    }

    #gameBoard {
        width: 600px;
        height: 600px;
        margin: 0 auto;
        /* border: 2px groove #000; */
        box-sizing: content-box;
        /* background: #a8c899; */
        background: white;
    }

    .gameOverGrid {
        margin: auto;
    }

    /* Game */

    .pixel {
        width: 15px;
        height: 15px;
        box-sizing: border-box;
        /* border: 1px solid #eaeef4; */
    }

    .snakePixel {
        background-color: blue;
        /* background-image: url({{ url('sankegameassets/body_vertical.png') }}) */
    }

    .foodPixel {
        background-color: red;
        /* background-image: url({{ url('sankegameassets/apple.png') }}); */
        /* background-size: 15px 15px; */
    }

    #gameOver {
        color: cornflowerblue;
        display: none;
    }

    .pixel:last-child {
        border-right: none;
    }

    .row:last-child .pixel {
        border-bottom: none;
    }

    /* Style */

    .btn {
        background: #3498db;
        background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
        background-image: -moz-linear-gradient(top, #3498db, #2980b9);
        background-image: -ms-linear-gradient(top, #3498db, #2980b9);
        background-image: -o-linear-gradient(top, #3498db, #2980b9);
        background-image: linear-gradient(to bottom, #3498db, #2980b9);
        -webkit-border-radius: 6;
        -moz-border-radius: 6;
        border-radius: 6px;
        font-family: Arial;
        color: #ffffff;
        font-size: 20px;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
        border: 0;
    }

    .btn:hover {
        background: #3cb0fd;
        background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
        background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
        background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
        text-decoration: none;
    }

    /* Typog */

    /*! Typebase.less v0.1.0 | MIT License */
    /* Setup */
    html {
        /* Change default typefaces here */
        font-family: serif;
        font-size: 137.5%;
        -webkit-font-smoothing: antialiased;
    }

    /* Copy & Lists */
    p {
        line-height: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 0;
    }

    ul,
    ol {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    ul li,
    ol li {
        line-height: 1.5rem;
    }

    ul ul,
    ol ul,
    ul ol,
    ol ol {
        margin-top: 0;
        margin-bottom: 0;
    }

    blockquote {
        line-height: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }

    /* Headings */
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        /* Change heading typefaces here */
        font-family: sans-serif;
        margin-top: 1.5rem;
        margin-bottom: 0;
        line-height: 1.5rem;
    }

    h1 {
        font-size: 4.242rem;
        line-height: 4.5rem;
        margin-top: 3rem;
    }

    h2 {
        font-size: 2.828rem;
        line-height: 3rem;
        /* margin-top: 3rem; */
        margin-top: 0rem;
    }

    h3 {
        font-size: 1.414rem;
    }

    h4 {
        font-size: 0.707rem;
        margin: 0
    }

    h5 {
        font-size: 0.4713333333333333rem;
    }

    h6 {
        font-size: 0.3535rem;
    }

    /* Tables */
    table {
        margin-top: 1.5rem;
        border-spacing: 0px;
        border-collapse: collapse;
    }

    table td,
    table th {
        padding: 0;
        line-height: 33px;
    }

    /* Code blocks */
    code {
        vertical-align: bottom;
    }

    /* Leading paragraph text */
    .lead {
        font-size: 1.414rem;
    }

    /* Hug the block above you */
    .hug {
        margin-top: 0;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var gameBoardSize = 40;
    var gamePoints = 0;
    var gameSpeed = 100;
    var luot = 0;
    var diemtichluy = {!! Auth::user()->khachhangs[0]->diem !!}
    diemtichluy = parseInt(diemtichluy)

    $(document).ready(function() {
        console.log("Ready Player One!");
        createBoard();
        $(".btn").click(function() {
            if(luot>0){
                startGame();
            } else {
                alert("Bạn cần mua thêm lượt để chơi!")
            }
        });

        var luotget = localStorage.getItem("luot");
        if (luotget == null || luotget < 0) {
            localStorage.setItem("luot", 0)
            luotget = 0;
        }
        luot = parseInt(luotget)
        $("#luot").text("Lượt: " + parseInt(luot));

        $("#muabutton").click(function(e) {
            e.preventDefault();
            
            var option = $("#luotoption").val();
            luot += parseInt(option);
            console.log(luot)
            if(option == "1"){
                trudiem(100)
                diemtichluy-=100
            } else if(option == "5"){
                diemtichluy-=500
                trudiem(500)
            } else if (option == "10"){
                diemtichluy-=1000
                trudiem(1000)
            }
            $("#diemtichluy").text("Điểm tích luỹ: " + (diemtichluy));
            localStorage.setItem("luot", parseInt(luot))
            $("#luot").text("Lượt: " + parseInt(luot));
        });
    });

    var Snake = {
        position: [
            [20, 20],
            [20, 19],
            [20, 18]
        ], // snake start position
        size: 3,
        direction: "r",
        alive: true
    }

    var Food = {
        position: [],
        present: false
    }

    function createBoard() {
        $("#gameBoard").empty();
        var size = gameBoardSize;

        for (i = 0; i < size; i++) {
            $("#gameBoard").append('<div class="row"></div>');
            for (j = 0; j < size; j++) {
                $(".row:last-child").append('<div class="pixel"></div>');
            }
        }
    }

    function moveSnake() {
        var head = Snake.position[0].slice();

        switch (Snake.direction) {
            case 'r':
                head[1] += 1;
                break;
            case 'l':
                head[1] -= 1;
                break;
            case 'u':
                head[0] -= 1;
                break;
            case 'd':
                head[0] += 1;
                break;
        }

        // check after head is moved
        if (alive(head)) {
            // draw head
            $(".row:nth-child(" + head[0] + ") > .pixel:nth-child(" + head[1] + ")").addClass("snakePixel");

            // draw rest of body loop
            for (var i = 0; i < Snake.size; i++) {
                $(".row:nth-child(" + Snake.position[i][0] + ") > .pixel:nth-child(" + Snake.position[i][1] + ")")
                    .addClass("snakePixel");
            }

            // if head touches food
            if (head.every(function(e, i) {
                    return e === Food.position[i];
                })) {
                Snake.size++;
                Food.present = false;
                gamePoints += 1;
                $(".row:nth-child(" + Food.position[0] + ") > .pixel:nth-child(" + Food.position[1] + ")").removeClass(
                    "foodPixel");
                $("#score").html("Score: " + gamePoints)
                if (gamePoints % 16 == 0 && gameSpeed > 10) {
                    gameSpeed -= 5;
                };
            } else {
                $(".row:nth-child(" + Snake.position[Snake.size - 1][0] + ") > .pixel:nth-child(" + Snake.position[Snake
                    .size - 1][1] + ")").removeClass("snakePixel");
                Snake.position.pop();
            }
            Snake.position.unshift(head);
        } else {
            gameOver();
        }
    }


    function generateFood() {
        if (Food.present === false) {
            Food.position = [Math.floor((Math.random() * 40) + 1), Math.floor((Math.random() * 40) + 1)]
            Food.present = true;
            console.log("Food at: " + Food.position);
            $(".row:nth-child(" + Food.position[0] + ") > .pixel:nth-child(" + Food.position[1] + ")").addClass(
                "foodPixel");
        }
    }

    function keyPress() {
        $(document).one("keydown", function(key) {
            switch (key.which) {
                case 37: // left arrow
                    if (Snake.direction != "r") {
                        Snake.direction = "l";
                    }
                    break;
                case 38: // up arrow
                    if (Snake.direction != "d") {
                        Snake.direction = "u";
                    }
                    break;
                case 39: // right arrow
                    if (Snake.direction != "l") {
                        Snake.direction = "r";
                    }
                    break;
                case 40: // down arrow
                    if (Snake.direction != "u") {
                        Snake.direction = "d";
                    }
                    break;
            }
        });
    }

    function gameLoop() {
        setTimeout(function() {
            keyPress();
            generateFood();
            moveSnake();
            if (Snake.alive) {
                gameLoop();
            }
        }, gameSpeed);
    }

    function alive(head) {
        // head check
        if (head[0] < 1 || head[0] > 40 || head[1] < 1 || head[1] > 40) {
            return false;
        }
        // wall collision
        if (Snake.position[0][0] < 1 || Snake.position[0][0] > 40 || Snake.position[0][1] < 1 || Snake.position[0][1] >
            40) {
            return false;
        }
        // self collision
        for (var i = 1; i < Snake.size; i++) {
            if ((Snake.position[0]).every(function(element, index) {
                    return element === Snake.position[i][index];
                })) {
                return false;
            }
        }
        return true;
    }

    function capnhatdiem() {
        data = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: gamePoints,
        })
        console.log(data);
        fetch("http://khachsan-b1910261.local/mobile/game/capnhatdiem", {
            method: "POST",
            body: data,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }
    function trudiem(diemtru) {
        data = JSON.stringify({
            khachhangid: {!! auth()->user()->khachhangs[0]->id !!},
            diem: diemtru,
        })
        console.log(data);
        fetch("http://khachsan-b1910261.local/mobile/game/trudiem", {
            method: "POST",
            body: data,
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        });
    }

    function gameOver() {
        Snake.alive = false;
        console.log("Game Over!");
        
        alert("Bạn {!! auth()->user()->username !!} được cộng " + gamePoints + " điểm vào điểm tích luỹ");
        luot--;
        localStorage.setItem("luot", luot);
        $("#luot").text("Lượt: " + luot);
        diemtichluy+=gamePoints
        $("#diemtichluy").text("Điểm tích luỹ: " + (diemtichluy));
        capnhatdiem();
        
        $(".overlay").show();
        $("#gameOver").show();
        var blink = function() {
            $(".row:nth-child(" + Snake.position[0][0] + ") > .pixel:nth-child(" + Snake.position[0][1] + ")")
                .toggleClass("snakePixel");
        }

        var i = 0;

        function blinkLoop() {
            blink();
            setTimeout(function() {
                i++;
                if (i < 10) {
                    blinkLoop();
                }
            }, 400);
        }
        blinkLoop();
    }

    function startGame() {
        // reset game settings
        Snake.size = 3;
        Snake.position = [
            [20, 20],
            [20, 19],
            [20, 18]
        ];
        Snake.direction = "r";
        Snake.alive = true;
        gameSpeed = 100;
        gamePoints = 0;
        Food.present = false;

        // start game
        createBoard();
        $(".overlay").hide();
        gameLoop();
    }
</script>